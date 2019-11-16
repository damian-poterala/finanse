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
    }

?>