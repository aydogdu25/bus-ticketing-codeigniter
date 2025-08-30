<?php
defined("BASEPATH") OR exit("Bir şeyler ters gitti!");

class SeferMesaj extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('SeferModel'); // Mesaj_model'i yükle
    }

    public function index(){
        $data['active_page'] = 'admin/seferMesaj';
        $this->load->view("admin/include/header",$data);
        $data['mesajlar'] = $this->SeferModel->get_mesajlar(); // Mesajları modelden al
        $this->load->view("admin/seferMesaj", $data);
        $this->load->view("admin/include/footer");
    }
}
?>
