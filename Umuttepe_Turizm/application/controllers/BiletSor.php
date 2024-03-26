<?php 

defined("BASEPATH") OR exit("Bir şeyler ters gitti!"); 

class BiletSor extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SeferModel');
        $this->load->library('session');
    }
    public function index(){
        $data['active_page'] = 'biletSor';
        $this->load->view('include/header', $data);
        $this->load->view("biletSor");
        $this->load->view("include/footer");
    }
    public function pnr_sor(){
        $pnr = $this->input->post('pnr');

        $this->db->select('umt_biletler.bilet_id, umt_seferler.kalkis_yeri, umt_seferler.varis_yeri, umt_uyeler.ad, umt_uyeler.soyad, umt_biletler.koltuk_no');
        $this->db->from('umt_biletler');
        $this->db->join('umt_seferler', 'umt_biletler.sefer_id = umt_seferler.sefer_id');
        $this->db->join('umt_uyeler', 'umt_biletler.uye_id = umt_uyeler.uye_id');
        $this->db->where('umt_biletler.pnr_kod', $pnr);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $pnr_sonuc[] = array(
                    'bilet_id' => $row->bilet_id,
                    'kalkis_yeri' => $row->kalkis_yeri,
                    'varis_yeri' => $row->varis_yeri,
                    'ad' => $row->ad,
                    'soyad' => $row->soyad,
                    'koltuk_no' => $row->koltuk_no
                );
            }
            
        }else {
            $this->session->set_flashdata('BiletBulunamadi', true);
            redirect('biletSor'); 
            return; 
        }
        $this->session->set_flashdata('PnrSonuc', $pnr_sonuc);
        redirect('PnrSonuc'); 
    }
}