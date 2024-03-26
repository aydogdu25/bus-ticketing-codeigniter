<?php

defined("BASEPATH") or exit ("No direct script access allowed");

class Payment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SeferModel');
        $this->load->library('session');
        $this->load->helper('url');
    }
    public function index(){
        if(!$this->input->post()) {
            redirect('anasayfa'); 
        }
        $this->siparisTamamla();
        $this->load->view('payment');
    }
    
    public function siparisTamamla()
    {

        $sefer_id = $this->input->post("sefer_id");
        $gidis_tarihi = $this->input->post('gidis_tarihi');
        $secilen_koltuk = $this->input->post('secilen_koltuk');
        $uye_id = $this->input->post('uye_id');
        $plaka = $this->input->post('plaka');

        $plaka_kodu = strtoupper(substr($plaka, 0, 2));
        $saat_bilgisi = substr($gidis_tarihi, 11, 2);
        $zaman_bilgisi = ($saat_bilgisi < 12) ? "ÖÖ" : "ÖS";
        date_default_timezone_set('Europe/Istanbul');
        $işlem_saati = date("YmdHis");


        $peron = chr(rand(65, 90));

        $pnr_kodu = $plaka_kodu . $zaman_bilgisi . $işlem_saati . $peron . $plaka;

        $bilet_data = array(
            'sefer_id' => $sefer_id,
            'uye_id' => $uye_id,
            'pnr_kod' => $pnr_kodu,
            'koltuk_no' => $secilen_koltuk
        );
        $this->SeferModel->bilet_ekle($bilet_data);
       
    }
    public function stripePost()
    {
        require_once APPPATH.'third_party/stripe-php/init.php';

        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));

        $message = null;
        $success = false;
        $charge = null;
        $err = null;
        $data = [];

        try {

            $timestamp = date('YmdHis');
            $orderid = $timestamp.'-'.mt_rand(1, 999);


            $charge = \Stripe\Charge::create([
                'amount'      => $this->input->post('amount') * 1,
                'currency'    => 'gbp',
                'source'      => $this->input->post('stripeToken'),
                'description' => 'TEST PAYMENT',
                'metadata'    => [
                    'order_id' => $orderid,
                ],
            ]);
        } catch (\Stripe\Error\Card $e) {
            $body = $e->getJsonBody();
            $err = $body['error'];


            $message = $err['message'];
        } catch (\Stripe\Error\RateLimit $e) {
        } catch (\Stripe\Error\InvalidRequest $e) {
        } catch (\Stripe\Error\Authentication $e) {
        } catch (\Stripe\Error\ApiConnection $e) {
        } catch (\Stripe\Error\Base $e) {
        } catch (Exception $e) {

        }

        if ($charge) {

            $chargeJson = $charge->jsonSerialize();

            if ($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1) {

                $this->transaction->response = json_encode($chargeJson);
                $this->transaction->status = TRANS_SUCCESS;
                $this->transaction->insert_transaction();

                $data = [
                    'balance_transaction' => $chargeJson['balance_transaction'],
                    'receipt_url'         => $chargeJson['receipt_url'],
                    'order_id'            => $orderid,
                ];

                $success = true;
                $message = 'Payment made successfully.';
            } else {

                $this->transaction->response = json_encode($chargeJson);
                $this->transaction->status = TRANS_FAIL;
                $this->transaction->insert_transaction();

                $success = true;
                $message = 'Something went wrong.';
            }
        }

        if ($success) {
            echo json_encode(['success' => $success, 'message' => $message, 'data' => $data]);
        } else {

            $this->transaction->response = json_encode($err);
            $this->transaction->status = TRANS_FAIL;
            $this->transaction->insert_transaction();

            echo json_encode(['success' => $success, 'message' => $message, 'data' => $data]);
        }
    }
}