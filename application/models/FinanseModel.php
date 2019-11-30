<?php

    class FinanseModel extends CI_Model 
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function canLogin($login, $password)
        {
            $sql = $this->db->query("SELECT * FROM konta WHERE login = '$login' AND password = '$password' ");

            $result = $sql->num_rows();

            if($result > 0)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function createAccount($dane)
        {
            $this->db->insert('konta', $dane);
        }

        public function categoryBill()
        {
            $sql = $this->db->query("SELECT * FROM FINANSE_kategorie_rachunkow");

            return $result = $sql->result_array();
        }

        public function categoryPayment()
        {
            $sql = $this->db->query("SELECT * FROM FINANSE_typ_platnosci");

            return $result = $sql->result_array();
        }

        public function listYear()
        {
            $sql = $this->db->query("SELECT * FROM FINANSE_rok ORDER BY rok DESC");

            return $result = $sql->result_array();
        }

        public function listMonth()
        {
            $sql = $this->db->query("SELECT * FROM FINANSE_miesiac");

            return $result = $sql->result_array();
        }

        public function addPayment($dane, $user)
        {

            $sql = $this->db->query("SELECT id_user FROM konta WHERE login = '$user' ");

            $userId = $sql->result_array();
            $id     = $userId[0]['id_user'];

            $currentData = date('Y-m-d');   
            $payment     = $dane['payment'];
            $month       = $dane['chooseMonth'];
            $year        = $dane['chooseYear'];

            $sql = $this->db->query("INSERT INTO FINANSE_wyplaty (kwota, id_miesiaca, id_roku, data_dodania, id_usera)
                                     VALUES ('$payment', '$month', '$year', '$currentData', '$id')");
                                     
        }

        public function yourPayment($user)
        {
            $sql = $this->db->query("SELECT id_user FROM konta WHERE login = '$user' ");

            $userId = $sql->result_array();
            $id     = $userId[0]['id_user'];

            $sql = $this->db->query("   SELECT 	payment.id_wyplaty,
                                                payment.id_usera, 
                                                payment.kwota,
                                                year.rok,
                                                CASE WHEN month.id_miesiaca <= 9 THEN '0'+month.id_miesiaca ELSE month.id_miesiaca END AS miesiac
                                        FROM FINANSE_wyplaty AS payment
                                        LEFT JOIN FINANSE_rok AS year 
                                            ON year.id_roku = payment.id_roku
                                        LEFT JOIN FINANSE_miesiac AS month 
                                            ON month.id_miesiaca = payment.id_miesiaca
                                        WHERE payment.id_usera = '$id' ");

            return $result = $sql->result_array();
        }

        public function addBill($dane, $user)
        {
            $currentData     = date('Y-m-d H:i:s');
            $idPayment       = $dane['choosePayment'];
            $numberBill      = $dane['numberBill'];
            $idCategory      = $dane['chooseCategory'];
            $amountBill      = $dane['amountBill'];
            $shoppingDate    = $dane['shoppingDate'];
            $paymentCategory = $dane['paymentCategory'];
            $description     = $dane['description'];

            $sql = $this->db->query("SELECT id_user FROM konta WHERE login = '$user' ");

            $userId = $sql->result_array();
            $id     = $userId[0]['id_user'];

            $sql = $this->db->query("   INSERT INTO FINANSE_rachunki (  id_wyplaty, 
                                                                        numer_rachunku, 
                                                                        id_kat_rachunku,
                                                                        kwota_rachunku,
                                                                        data_rachunku,
                                                                        data_dodania_rachunku,
                                                                        id_platnosci,
                                                                        dodatkowy_opis,
                                                                        id_user)
                                        VALUES ('$idPayment',
                                                '$numberBill',
                                                '$idCategory',
                                                '$amountBill',
                                                '$shoppingDate',
                                                '$currentData',
                                                '$paymentCategory',
                                                '$description',
                                                '$id' )");
        }

        public function billList($user)
        {
            $sql = $this->db->query("SELECT id_user FROM konta WHERE login = '$user' ");

            $userId = $sql->result_array();
            $id     = $userId[0]['id_user'];

            $sql = $this->db->query("   SELECT 	bill.id_rachunku,
                                                bill.id_wyplaty,
                                                year.rok,
                                                CONCAT(year.rok, '-', payment.id_miesiaca) AS wyplata,
                                                category.kat_nazwa_pl,
                                                bill.kwota_rachunku,
                                                bill.data_rachunku,
                                                bill.data_dodania_rachunku,
                                                type.nazwa_platnosci,
                                                bill.dodatkowy_opis,
                                                bill.numer_rachunku
                                        FROM FINANSE_rachunki AS bill
                                        LEFT JOIN finanse_wyplaty AS payment
                                            ON payment.id_wyplaty = bill.id_wyplaty
                                        LEFT JOIN FINANSE_rok AS year 
                                            ON payment.id_roku = year.id_roku
                                        LEFT JOIN FINANSE_kategorie_rachunkow AS category
                                            ON bill.id_kat_rachunku = category.id_kat_rachunkow
                                        LEFT JOIN FINANSE_typ_platnosci AS type 
                                            ON bill.id_platnosci = type.id_typ_platnosci
                                        LEFT JOIN konta AS user 
                                            ON bill.id_user = user.id_user
                                        WHERE bill.id_user = '$id'
                                        ORDER BY bill.data_rachunku DESC");

            return $result = $sql->result_array();
        }

        public function numberOfBillsAdded($user)
        {
            $sql = $this->db->query("SELECT id_user FROM konta WHERE login = '$user' ");

            $userId = $sql->result_array();
            $id     = $userId[0]['id_user'];

            $sql = $this->db->query("SELECT month.miesiac,
                                            (SELECT COUNT(id_rachunku) 
                                             FROM FINANSE_rachunki 
                                             WHERE month.id_miesiaca = MONTH(data_rachunku) 
                                                 AND YEAR(data_rachunku) = YEAR(NOW())
                                                 AND id_user = '$id' ) AS ILOSC
                                     FROM finanse_miesiac AS month");

            $result = $sql->result_array();

            return json_encode($result);
        }

        public function valueBillsAdded($user)
        {
            $sql = $this->db->query("SELECT id_user FROM konta WHERE login = '$user' ");

            $userId = $sql->result_array();
            $id     = $userId[0]['id_user'];

            $sql = $this->db->query("SELECT month.miesiac,
                                            (SELECT sum(kwota_rachunku) 
                                             FROM FINANSE_rachunki 
                                             WHERE month.id_miesiaca = MONTH(data_rachunku) 
                                                 AND YEAR(data_rachunku) = YEAR(NOW())
                                                 AND id_user = '$id' ) AS WARTOSC
                                     FROM finanse_miesiac AS month");

            $result = $sql->result_array();

            return json_encode($result);
        }

        public function addedPayment($user)
        {
            $sql = $this->db->query("SELECT id_user FROM konta WHERE login = '$user' ");

            $userId = $sql->result_array();
            $id     = $userId[0]['id_user'];

            $sql = $this->db->query("SELECT month.miesiac,
                                            (SELECT payment.kwota 
                                             FROM finanse_wyplaty AS payment
                                             LEFT JOIN FINANSE_rok AS year 
                                                 ON year.id_roku = payment.id_roku
                                             WHERE month.id_miesiaca = id_miesiaca 
                                                 AND year.rok = YEAR(NOW()) 
                                                 AND payment.id_usera = '$id'  
                                             LIMIT 1) AS WYPLATA
                                     FROM finanse_miesiac AS month");

            $result = $sql->result_array();

            return json_encode($result);
        }
    }

?>