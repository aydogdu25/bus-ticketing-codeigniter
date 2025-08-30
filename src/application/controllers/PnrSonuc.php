<?php 

defined("BASEPATH") OR exit("Bir şeyler ters gitti!"); 

class PnrSonuc extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session'); // Session Kütüphanesini yükle
    }
    public function index(){
        $data['active_page'] = 'biletSor';
        $this->load->view('include/header', $data);
        $data2['PnrSonuc'] = $this->session->flashdata('PnrSonuc');
        $this->load->view("pnrSonuc", $data2);
        $this->load->view("include/footer");
    }
}