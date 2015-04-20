<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of storelogin
 *
 * @author sahid
 */
class storelogin extends CI_Controller {

    //put your code here
    private $url = 'www.k-linkmember.co.id/serverxml/index.php/xmlrpc_serverss/';
    private $urlConfig = "html_config";
    private $urlReturn = "storelogin";

    public function Storelogin() {
        parent::__construct();
        $this->xmlrpc->server(prep_url($this->url), 80);
    }

    private function extractCaptcha($param) {
        $data = array(
            1 => 'satu',
            2 => 'dua',
            3 => 'tiga',
            4 => 'empat',
            5 => 'lima',
            6 => 'enam',
            7 => 'tujuh',
            8 => 'delapan',
            9 => 'sembilan',
            0 => 'nol',
        );

        $valReturn = array_search($param, $data);

        if ($valReturn):
            return $valReturn;
        endif;
    }

    public function index() {
//        $this->output->enable_profiler(TRUE);
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
//        $captchVal = random_string('numeric', 1);
        $captchVal = 8;

        $data['mycaptcha'] = $captchVal;
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($this->input->post('submit')):
            if ($this->form_validation->run()):
                $captcha = $this->input->post('captcha');

                $userSession = array(
                    'username' => $username,
                    'isValid' => TRUE,
                );

                if (isset($captcha)):
                    $resCaptch = $this->extractCaptcha(strtolower($captcha));
                endif;

                $loginResult = $this->checkUsernamePassword($username, $password);
                $row = $loginResult["sukses"];

                if ((int) $row == 1 && (int) $resCaptch == (int) $captchVal):
                    $this->session->set_userdata($userSession);
                    redirect('choose');
                else:
                    echo "gatot";
                    echo $resCaptch;
                endif;
            endif;
        endif;


        $this->load->view($this->urlConfig);
        $this->load->view($this->urlReturn, $data);
		$this->load->view('footer_new');
    }

    private function checkUsernamePassword($username, $password) {
        $request = array();
        $valReturn = array();

        $this->xmlrpc->method('check.login');
        $request = array(array(array(
                    "distributor" => array("$username", 'string'),
                    "password" => array("$password", 'string'),
                    "signature" => array(md5("$username" . '12345'), 'string')
                ), 'struct'
        ));

        $this->xmlrpc->request($request);

        if (!$this->xmlrpc->send_request()) {
            echo $this->xmlrpc->display_error();
        } else {
            return $valReturn = $this->xmlrpc->display_response();
        }
    }

}
