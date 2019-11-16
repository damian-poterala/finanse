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

            $category['yourPayment'] = $this->FinanseModel->yourPayment();
            $category['categoryBill']    = $this->FinanseModel->categoryBill();
            $category['categoryPayment'] = $this->FinanseModel->categoryPayment();

            $this->load->view('sidemenuView');
            $this->load->view('addBillView', $category);

            if(!empty($_POST))
            {
                $dane = array(
                    'choosePayment'   => $this->input->post('choosePayment'),
                    'numberBill'      => $this->input->post('numberBill'),
                    'chooseCategory'  => $this->input->post('chooseCategory'),
                    'amountBill'      => $this->input->post('amountBill'),
                    'shoppingDate'    => $this->input->post('shoppingDate'),
                    'paymentCategory' => $this->input->post('paymentCategory'),
                    'description'     => $this->input->post('description'),
                );
                // dodać zapisywanie do bazy danych
                var_dump($dane);die;
            }
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

                $this->FinanseModel->addPayment($dane);
            }
        }
    }

?>