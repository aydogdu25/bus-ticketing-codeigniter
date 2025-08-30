<?php
defined('BASEPATH') or exit ('Bir şeyler ters gitti!');

class SeferModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function getSeferler($kalkis, $varis, $tarih, $yon)
    {

        if ($yon == 'tek') {
            $this->db->select('*');
            $this->db->where('kalkis_yeri', $kalkis);
            $this->db->where('varis_yeri', $varis);
            $this->db->where('DATE(gidis_tarihi)', $tarih);
            $this->db->where('sefer_tipi', 'Gidiş');
        } else {
            $this->db->select('*');
            $this->db->where('kalkis_yeri', $kalkis);
            $this->db->where('varis_yeri', $varis);
            $this->db->where('DATE(gidis_tarihi)', $tarih);
            $this->db->where('sefer_tipi', 'Gidiş-Dönüş');
        }

        $query = $this->db->get('umt_seferler');
        return $query->result_array();
    }
    public function seferListele()
    {
        $this->db->select('*');
        $this->db->from('umt_seferler');
        $query = $this->db->get();

        return $query->result_array();
    }
    public function seferSil($sefer_id)
    {
        $this->db->where('sefer_id', $sefer_id);
        $this->db->delete('umt_seferler');
    }

    public function uyeEkle($tc, $ad, $soyad, $nick, $sifre, $cins, $dogum, $email)
    {

        $data = array(
            'tc_pas' => $tc,
            'ad' => $ad,
            'soyad' => $soyad,
            'kullanici' => $nick,
            'sifre' => $sifre,
            'cins' => $cins,
            'dogum' => $dogum,
            'e_posta' => $email
        );

        $this->db->insert('umt_uyeler', $data);

        return $this->db->affected_rows() > 0;
    }
    public function checkLogin($nick, $sifre)
    {
        $this->db->select('uye_id, ad');
        $this->db->where('kullanici', $nick);
        $this->db->where('sifre', $sifre);
        $query = $this->db->get('umt_uyeler');

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_mesajlar()
    {
        $query = $this->db->get('umt_mesajlar');
        return $query->result();
    }
    public function iletisim_formunu_kaydet($data)
    {
        return $this->db->insert('umt_mesajlar', $data);
    }
    public function sefer_ekle($data)
    {
        return $this->db->insert('umt_seferler', $data);
    }
    public function bilet_ekle($data)
    {
        return $this->db->insert('umt_biletler', $data);
    }
    public function biletListele($uye_id)
    {
        $this->db->select('*');
        $this->db->from('umt_biletler');
        $this->db->where('uye_id', $uye_id);
        $query = $this->db->get();

        return $query->result_array();
    }
    public function biletSil($bilet_id)
    {
        $this->db->where('bilet_id', $bilet_id);
        $this->db->delete('umt_biletler');
    }
    public function biletBilgisi($bilet_id)
    {
        $this->db->select('*');
        $this->db->from('umt_biletler');
        $this->db->where('bilet_id', $bilet_id);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function getBakiye($uye_id)
    {
        $this->db->select('bakiye');
        $this->db->from('umt_uyeler');
        $this->db->where('uye_id', $uye_id);
        $query = $this->db->get();

        return $query->row()->bakiye;
    }
    public function bakiyemiGuncelle($uye_id, $yenibakiye)
    {
        // Bakiyeyi güncelle
        $this->db->set('bakiye', $yenibakiye);
        $this->db->where('uye_id', $uye_id);
        $this->db->update('umt_uyeler');
    }

    public function biletUcretiBilgisi($sefer_id)
    {
        $this->db->select("ucret");
        $this->db->from("umt_seferler");
        $this->db->where("sefer_id", $sefer_id);

        $query = $this->db->get();

        $result = $query->row();
        return $result ? $result->ucret : 0;
    }
    public function getKoltuklar($sefer_id)
    {
        $this->db->select('koltuk_no');
        $this->db->where('sefer_id', $sefer_id);
        $query = $this->db->get('umt_biletler');
        $result = $query->result_array();

        $koltuklar = array();
        foreach ($result as $row) {
            $koltuklar[] = $row['koltuk_no'];
        }

        return $koltuklar;
    }

}

