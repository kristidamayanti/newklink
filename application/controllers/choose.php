<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of choose
 *
 * @author sahid
 */
class choose extends CI_Controller {

    private $url = 'www.k-linkmember.co.id/langganan_rpc/index.php/xmlrpc_serverss/';
    private $urlConfig = "html_config";
    private $urlReturn = "";

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->urlReturn = get_class($this);
        $this->xmlrpc->server(prep_url($this->url), 80);
    }

    public function index() {
        $d['mHeader'] = $this->menu_model->getHeaderMenu();
        $d['mChild'] = $this->menu_model->getChildMenu();
        $validUser = $this->session->userdata('isValid');
        $d['username'] = $this->session->userdata('username');
        $d['message'] = $this->session->userdata('mssg');

        if ($validUser):
            if ($this->input->post('submit')):
                $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
                $vno = $this->input->post('voucherno');
                $vkey = $this->input->post('voucherkey');
                $kUser = $this->input->post('nonvoucher');
                $ip_address = $this->input->ip_address();
                $info = "<div class=\"alert alert-info\" role=\"alert\">Sorry our Server is Busy And your transaction is failed, Please Try Again in a Few Minute's</div>";
                $err = "<div class=\"alert alert-info\" role=\"alert\">Voucher " . $vno . " Already Used Or Please Check again The Voucher No and Voucher Key</div>";
                $sukses = "<div class=\"alert alert-success\" role=\"alert\">Voucher Reedem Success</div>";

                if ($kUser == "checked"):
//                    cek kwallet user TODO

                    redirect('store');
                else:
                    if ($this->form_validation->run()):
                        $keyVoucher = $this->cekVoucher($vno, $vkey);
                        $validKey = $keyVoucher["sukses"];

                        if ($validKey == 1):
                            $cekVoucher = $this->insVoucher($vno, $vkey, $ip_address, $d['username']);
                            $isSukses = $cekVoucher["sukses"];

                            if ($isSukses == 1):
                                redirect('store');
                            else:
                                $this->session->set_flashdata('mssg', $info);
                                redirect($this->urlReturn);
                            endif;
                        else:
                            $this->session->set_flashdata('mssg', $err);
                            redirect($this->urlReturn);
                        endif;
                    endif;
                endif;
            endif;
            $this->load->view($this->urlConfig);
            $this->load->view($this->urlReturn, $d);
        else:
            redirect('storelogin');
           
        endif;
    }

    private function cekVoucher($voucherno, $voucherkey) {
        $request = array();
        $valReturn = array();

        $this->xmlrpc->timeout(60);
        $this->xmlrpc->method('check.voucher');

        $request = array(array(array(
                    "voucherno" => array("$voucherno", 'string'),
                    "voucherkey" => array("$voucherkey", 'string'),
                    "signature" => array(md5("$voucherno" . '12345'), 'string')
                ), 'struct'
        ));

        $this->xmlrpc->request($request);

        if (!$this->xmlrpc->send_request()) {
            echo $this->xmlrpc->display_error();
        } else {
            return $valReturn = $this->xmlrpc->display_response();
//            var_dump($this->xmlrpc->display_response());
        }
    }

    private function insVoucher($vno, $vkey, $ip_address, $username) {
        $request = array();
        $valReturn = array();
        $this->xmlrpc->timeout(60);
        $this->xmlrpc->method('ins.voucher');

        $request = array(array(array(
                    "voucherno" => array("$vno", 'string'),
                    "voucherkey" => array("$vkey", 'string'),
                    "idmember" => array("$username", 'string'),
                    "ip" => array("$ip_address", 'string'),
                    "signature" => array(md5("$username" . '12345'), 'string')
                ), 'struct'
        ));

        $this->xmlrpc->request($request);

        if (!$this->xmlrpc->send_request()) {
            echo $this->xmlrpc->display_error();
            log_message('error', 'Insert voucher function got Error');
        } else {
            return $valReturn = $this->xmlrpc->display_response();
//            var_dump($this->xmlrpc->display_response());
        }
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect('storelogin');
    }

}
