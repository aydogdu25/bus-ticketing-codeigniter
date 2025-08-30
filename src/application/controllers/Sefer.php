<?php
defined('BASEPATH') or exit ('Bir şeyler ters gitti!');

class Sefer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('SeferModel');
        $this->load->library('session');
    }

    public function index()
    {
        $data['active_page'] = 'biletAra';
        $this->load->view('include/header', $data);
        $kalkis = $_POST['nereden'];
        $varis = $_POST['nereye'];
        $a_tarih = $_POST['tarih'];
        $yon = $_POST['asal'];

        $tarih_parcala = explode('-', $a_tarih);
        $yil = $tarih_parcala[2];
        $ay = $tarih_parcala[1];
        $gun = $tarih_parcala[0];
        $tarih_datetime = new DateTime("$yil-$ay-$gun");
        $tarih = $tarih_datetime->format('Y-m-d');

        $seferler = $this->SeferModel->getSeferler($kalkis, $varis, $tarih, $yon);
        $data2['seferler'] = $seferler;
        $seferler2 = $this->SeferModel->getSeferler($kalkis, $varis, $tarih, $yon);
        foreach ($seferler2 as &$sefer1) {
            
            $sefer1['koltuklar'] = $this->SeferModel->getKoltuklar($sefer1['sefer_id']);
        }
        $data2['seferler'] = $seferler2;

        $this->load->view("sefer", $data2);
        $this->load->view("include/footer");

    }
}


