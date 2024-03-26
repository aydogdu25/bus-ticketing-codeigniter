<?php

defined("BASEPATH") or exit ("No direct script access allowed");

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SeferModel');
        $this->load->library('session');

    }
    public function index()
    {
        $data['active_page'] = 'profil';
        $this->load->view("include/header", $data);
        $uye_id = $this->session->userdata('uye_id');
        $data2['biletler'] = $this->SeferModel->biletListele($uye_id);
        $data2['seferler'] = $this->SeferModel->seferListele();
        $data2['bakiye'] = $this->SeferModel->getBakiye($uye_id);
        $this->load->view("profil", $data2);

        $bilet_id = $this->input->post('bilet_id');
        $this->SeferModel->biletSil($bilet_id);

        $this->load->view("include/footer");
    }
    public function aciga_al()
    {
        $bilet_id = $this->input->post('bilet_id');
        $bilet = $this->SeferModel->biletBilgisi($bilet_id);
        $sefer_id = $bilet['sefer_id'];
        $bilet_ucreti = $this->SeferModel->biletUcretiBilgisi($sefer_id);

        if ($bilet_ucreti) {
            $uye_id = $this->session->userdata('uye_id');
            $bakiye = $this->SeferModel->getBakiye($uye_id);

            $yenibakiye = $bakiye + $bilet_ucreti;

            $this->SeferModel->bakiyemiGuncelle($uye_id, $yenibakiye);

            $this->SeferModel->biletSil($bilet_id);

            echo "success";
        } else {
            echo "error: Bilet ücreti alınamadı.";
        }
    }

    public function qr_kod_olustur($id)
    {
        $this->load->library('qr_codes/Ciqrcode');
        $this->load->library('qr_codes/qrcode');

        $qrCodePath = FCPATH . 'qr_codes/';

        if (!file_exists($qrCodePath)) {
            mkdir($qrCodePath, 0777, true);
        }

        $filename = $qrCodePath . 'qr_' . $id . '.png';
        QRcode::png($id, $filename);

        echo $filename;
    }

}
