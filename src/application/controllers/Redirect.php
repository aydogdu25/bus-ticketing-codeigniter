<?php

defined("BASEPATH") or exit ("No direct script access allowed");

class Redirect extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    public function index()
    {
        $data['active_page'] = 'kayit';
        $this->load->view('include/header', $data);
        $this->load->view("redirect");
        $this->load->view("include/footer");

        $tc = $_POST['tc'];
        $ad = $_POST['ad'];
        $soyad = $_POST['soyad'];
        $nick = $_POST['nick'];
        $sifre = $_POST['sifre'];
        $cins = $_POST['cinsiyet'];
        $a_dogum = $_POST['dogum'];
        $email = $_POST['email'];

        $tarih_parcala = explode('-', $a_dogum);
        $yil = $tarih_parcala[2];
        $ay  =  $tarih_parcala[1];
        $gun = $tarih_parcala[0];
        $tarih_datetime = new DateTime("$yil-$ay-$gun");
        $dogum = $tarih_datetime->format('Y-m-d');

        $this->load->model('SeferModel');
        $this->SeferModel->uyeEkle($tc, $ad, $soyad, $nick, $sifre, $cins, $dogum, $email);
        
    }
}
