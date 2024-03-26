<?php 

defined("BASEPATH") OR exit("Bir şeyler ters gitti!"); 

class BiletAra extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    public function index(){

        $data['active_page'] = 'biletAra';
        $this->load->view('include/header', $data);
        $this->load->view("biletAra");
        $this->load->view("include/footer");
    }
}