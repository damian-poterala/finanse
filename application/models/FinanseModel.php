<?php

    class FinanseModel extends CI_Model 
    {
        public function __construct()
        {
            parent::__construct();
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

        public function addPayment($dane)
        {
            $currentData = date('Y-m-d');   
            $payment     = $dane['payment'];
            $month       = $dane['chooseMonth'];
            $year        = $dane['chooseYear'];

            $sql = $this->db->query("INSERT INTO FINANSE_wyplaty (kwota, id_miesiaca, id_roku, data_dodania, id_usera)
                                     VALUES ('$payment', '$month', '$year', '$currentData', '1')");
                                     
        }

        public function yourPayment()
        {
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
                                        WHERE payment.id_usera = 1");

            return $result = $sql->result_array();
        }

        public function addBill($dane)
        {
            $currentData     = date('Y-m-d H:i:s');
            $idPayment       = $dane['choosePayment'];
            $numberBill      = $dane['numberBill'];
            $idCategory      = $dane['chooseCategory'];
            $amountBill      = $dane['amountBill'];
            $shoppingDate    = $dane['shoppingDate'];
            $paymentCategory = $dane['paymentCategory'];
            $description     = $dane['description'];

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
                                                '1')");
        }

        public function billList()
        {
            $sql = $this->db->query("   SELECT 	bill.id_rachunku,
                                                bill.id_wyplaty,
                                                year.rok,
                                                CONCAT(year.rok, '-', payment.id_miesiaca) AS wyplata,
                                                category.kat_nazwa_pl,
                                                bill.kwota_rachunku,
                                                bill.data_rachunku,
                                                bill.data_dodania_rachunku,
                                                type.nazwa_platnosci,
                                                bill.dodatkowy_opis
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
                                        WHERE bill.id_user = 1
                                        ORDER BY bill.data_rachunku DESC");

            return $result = $sql->result_array();
        }

        public function numberOfBillsAdded()
        {
            $sql = $this->db->query("   SELECT 	YEAR(bill.data_rachunku) AS ROK, 
                                                MONTH(bill.data_rachunku) AS NR_MIESIACA,
                                                month.miesiac,
                                                COUNT(bill.id_rachunku) AS ILOSC 
                                        FROM FINANSE_rachunki AS bill
                                        LEFT JOIN finanse_miesiac AS month
                                            ON month.id_miesiaca = MONTH(data_rachunku)
                                        WHERE id_user = 1
                                            AND YEAR(bill.data_rachunku) = YEAR(NOW())
                                        GROUP BY YEAR(bill.data_rachunku), MONTH(bill.data_rachunku), month.miesiac
                                        ORDER BY YEAR(bill.data_rachunku) DESC");

            return $result = $sql->result_array();
        }
    }

?>