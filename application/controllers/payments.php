<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of payments
 *
 * @author sahid
 */
class payments extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        Veritrans_Config::$serverKey = 'VT-server-QYsxcIOfTcJ2edHZUACJiwkv';
        Veritrans_Config::$isProduction = false;

        try {
            $params = array(
                "vtweb" => array(
                    "credit_card_3d_secure" => true,
                ),
                'transaction_details' => array(
                    'order_id' => 'IDX' . rand(),
                    'gross_amount' => 1300000,
                )
            );

            header('Location: ' . Veritrans_VtWeb::getRedirectionUrl($params));
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function nofication() {
        Veritrans_Config::$isProduction = false;

        $notif = new Veritrans_Notification();

        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;

        if ($transaction == 'capture') {
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    // TODO set payment status in merchant's database to 'Challenge by FDS'
                    // TODO merchant should decide whether this transaction is authorized or not in MAP
                    echo "Transaction order_id: " . $order_id . " is challenged by FDS";
                } else {
                    // TODO set payment status in merchant's database to 'Success'
                    echo "Transaction order_id: " . $order_id . " successfully captured using " . $type;
                }
            }
        } else if ($transaction == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            echo "Transaction order_id: " . $order_id . " successfully transfered using " . $type;
        } else if ($transaction == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
        } else if ($transaction == 'deny') {
            // TODO set payment status in merchant's database to 'Denied'
            echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
        }
        
        echo 'Transaksi anda notif';
    }

    public function error() {
        echo 'Transaksi anda tidak berhasil';
    }

    public function finish() {
        echo 'Transaksi anda berhasil';

        $status = $this->input->post('status_code');
        $mssg = $this->input->post('order_id');

        echo $status . br();
        echo $mssg;
    }

}
