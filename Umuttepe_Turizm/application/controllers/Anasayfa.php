<?php

defined("BASEPATH") or exit("Bir şeyler ters gitti!");

class Anasayfa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        $data['active_page'] = 'anasayfa';
        $this->load->view('include/header', $data);
        $this->load->view("anasayfa");
        $this->load->view("include/footer");
    }
    public function iletisim_formunu_kaydet()
    {
        $isim = $this->input->post('isim');
        $email = $this->input->post('email');
        $mesaj_tipi = $this->input->post('mesaj_tipi');
        $mesaj = $this->input->post('mesaj');

        $data = array(
            'kullanici_isim' => $isim,
            'kullanici_email' => $email,
            'mesaj_tip' => $mesaj_tipi,
            'kullanici_mesaj' => $mesaj
        );

        $this->load->model('SeferModel');

        $this->SeferModel->iletisim_formunu_kaydet($data);

        redirect('anasayfa');
    }
}