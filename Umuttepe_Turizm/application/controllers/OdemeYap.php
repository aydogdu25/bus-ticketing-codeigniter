<?php

defined("BASEPATH") or exit ("Bir şeyler ters gitti!");


class OdemeYap extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SeferModel');
        $this->load->library('session');
    }
    public function index()
    {
        $data['active_page'] = 'odemeyap';
        $this->load->view('include/header', $data);
        $this->load->view("odemeyap");
        $this->load->view("include/footer");

    }
    
}
