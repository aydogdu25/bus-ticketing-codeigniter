<?php

defined("BASEPATH") or exit ("Bir şeyler ters gitti!");

class Giris extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        $data['active_page'] = 'giris';
        $this->load->view('include/header', $data);

        if (isset ($_POST['nick']) && isset ($_POST['sifre'])) {
            $nick = $_POST['nick'];
            $sifre = $_POST['sifre'];
            $this->load->model('SeferModel');

            $giris_kontrol = $this->SeferModel->checkLogin($nick, $sifre);

            if ($giris_kontrol) {

                $this->session->set_userdata(array(
                    "login" => TRUE,
                    "nick" => $nick,
                    "sifre" => $sifre,
                    "uye_id" => $giris_kontrol->uye_id,
                    "ad" => $giris_kontrol->ad
                ));
                redirect('anasayfa');
                exit;


            } else {
                $data2['error_message'] = 'Kullanıcı adı veya şifre hatalı!';
                $this->load->view("giris", $data2);
            }
        } else {
            $this->load->view("giris");
        }
        $this->load->view("include/footer");
    }

}