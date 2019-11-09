<?php 

    class Finanse extends CI_Controller 
    {
        public function index() 
        {            
            $this->load->view('homeView');
        }

        public function registration()
        {
            $this->load->view('registrationView');
            // var_dump(base_url().'registration');die;

            if(!empty($_POST))
            {
                $dane = array
                (
                    'name'           => $this->input->post('name'),
                    'surname'        => $this->input->post('surname'),
                    'login'          => $this->input->post('login'),
                    'password'       => $this->input->post('password'),
                    'repeatPassword' => $this->input->post('repeatPassword'),
                    'email'          => $this->input->post('emailAddress'),
                    'numberPhone'    => $this->input->post('numberPhone'),
                    'monthlySalary'  => $this->input->post('monthlySalary'),
                );

                if($dane['password'] == $dane['repeatPassword'])
                {
                    $this->load->model('FinanseModel');
                    $this->FinanseModel->createAccount($dane);
                }
            }
        }

        public function mainView()
        {
            $this->load->view('sidemenuView');
            $this->load->view('mainView');
        }

        public function addBill()
        {
            $this->load->model('FinanseModel');

            $category['categoryBill']    = $this->FinanseModel->categoryBill();
            $category['categoryPayment'] = $this->FinanseModel->categoryPayment();

            $this->load->view('sidemenuView');
            $this->load->view('addBillView', $category);
        }

        public function addPayment()
        {
            $this->load->model('FinanseModel');
            
            $date['year']  = $this->FinanseModel->listYear();
            $date['month'] = $this->FinanseModel->listMonth();

            $this->load->view('sidemenuView');
            $this->load->view('addPaymentView', $date);

            if(!empty($_POST))
            {
                $dane = array
                (
                    'chooseYear'  => $this->input->post('chooseYear'),
                    'chooseMonth' => $this->input->post('chooseMonth'),
                    'payment'     => $this->input->post('payment'), 
                );
                // var_Dump($dane);die;
                $this->FinanseModel->addPayment($dane);
            }
        }
    }

?>