<?php

defined("BASEPATH") or exit("Bir şeyler ters gitti.");

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
    
            if ($username === 'admin' && $password === '1234') {
                $this->session->set_userdata(array(
                    "login" => TRUE,
                    "user" => $username,
                    "pass" => $password
                ));
                redirect('seferEkle');
                exit;
            } else {
                $data['error_message'] = "Kullanıcı adı veya şifre yanlış!";
                $this->load->view('login', $data);
            }
        } else {
            $this->load->view('login');
        }
    }
}
