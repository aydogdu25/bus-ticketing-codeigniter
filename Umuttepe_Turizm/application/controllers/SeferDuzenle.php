<?php 
defined("BASEPATH") OR exit("Bir şeyler ters gitti!");

class SeferDuzenle extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('SeferModel');
        $this->load->library('session');
    }
    public function index(){
        
        if(!isset($_SESSION["login"])){
            echo "Bu sayfayı görüntüleme yetkiniz yoktur.";
            header("Refresh: 2; url=anasayfa");
        }
        else{
        $data["active_page"] = "admin/seferDuzenle";
        $this->load->view("admin/include/header", $data);
        $data2['seferler'] = $this->SeferModel->seferListele();
        $this->load->view("admin/seferDuzenle", $data2);
        $this->load->view("admin/include/footer");
    }
    }
    public function silSefer($sefer_id) {
        $this->SeferModel->seferSil($sefer_id);
    }

}
