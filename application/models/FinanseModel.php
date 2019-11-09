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
            var_dump($dane);die;
        }
    }

?>