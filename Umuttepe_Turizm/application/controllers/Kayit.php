<?php 

defined("BASEPATH") OR exit("Bir şeyler ters gitti!"); 

class Kayit extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    public function index(){
        $data['active_page'] = 'kayit';
        $this->load->view('include/header', $data);
        $this->load->view("kayit");
        $this->load->view("include/footer");
    }
}