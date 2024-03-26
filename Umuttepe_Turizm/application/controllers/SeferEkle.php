<?php 
defined("BASEPATH") OR exit("Bir şeyler ters gitti!");

class SeferEkle extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('SeferModel');
    }
    public function index(){
        if(!isset($_SESSION["login"])){
            echo "Bu sayfayı görüntüleme yetkiniz yoktur.";
            header("Refresh: 2; url=anasayfa");
        }
        else{
            $data['active_page'] = 'admin/seferEkle';
            $this->load->view("admin/include/header",$data);
            $this->load->view("admin/seferEkle");
            $this->load->view("admin/include/footer");
        }
    }
    public function sefer_ekle() {

        if ($this->input->server("REQUEST_METHOD") == "POST") {
            $tarih2 = $this->input->post("tarih2");

            if ($tarih2 === null || $tarih2 === "") {
                $sefer_tipi = "Gidiş";
            } else {
                $sefer_tipi = "Gidiş-Dönüş";
            }
    
            $data = array(
                'kalkis_yeri' => $this->input->post("kalkis"),
                'varis_yeri' => $this->input->post("varis"),
                'gidis_tarihi' => $this->input->post("tarih1"),
                'donus_tarihi' => $tarih2,
                'sefer_tipi' => $sefer_tipi,
                'koltuk_tipi' => $this->input->post("koltukTip"),
                'ucret' => $this->input->post("ucret")
            );
    
            if ($this->SeferModel->sefer_ekle($data)) {
                
                redirect('seferEkle');
                echo "Sefer başarıyla eklendi.";
            } else {
                echo "Sefer eklenirken bir hata oluştu.";
            }
        }
    }
    
    
}
