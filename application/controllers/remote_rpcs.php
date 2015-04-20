<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of remote_rpcs
 * Create as a rpc server receiving and insert untuk domain k-link
 * @author sahid
 */
class remote_rpcs extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->classUrl = get_class($this);
        $this->load->library('xmlrpc');
        $this->load->library('xmlrpcs');
        $this->load->model('mailistbank_model', 'mailistbank');
        $this->load->model('landing_model', 'landing');
        $this->load->model('landingbank_model', 'landingbank');
        $this->load->model('domain_model', 'domain');
    }

    public function index() {
        $config = array();
        $config['functions']['insert_mailist'] = array('function' => 'remote_rpcs.insertMailist');
        $config['functions']['activate_mailist'] = array('function' => 'remote_rpcs.activateMailist');
        $config['functions']['activateRegMailist'] = array('function' => 'remote_rpcs.activateRegMailist');
        $config['object'] = $this;

        $this->xmlrpcs->initialize($config);
        $this->xmlrpcs->serve();
    }

    public function insertMailist($request) {
        $parameters = $request->output_parameters();

        $data = array(
            'uid' => $parameters[0]['uid'],
            'name' => $parameters[0]['name'],
            'email' => $parameters[0]['email'],
            'ip_address' => $parameters[0]['ip_address'],
            'ld_type' => $parameters[0]['ld_type'],
            'subscribedt' => date('Y-m-d H:i:s'),
            'createdt' => date('Y-m-d H:i:s')
        );

        $respondcode = "1110";
        $this->mailistbank->insert($data);

        $response = array(array('respond' => $respondcode),
            'struct');

        return $this->xmlrpc->send_response($response);
    }

    public function activateMailist($request) {
        $parameters = $request->output_parameters();

        $uid = $parameters[0]['uid'];

        $respondcode = "1110";
        $this->mailistbank->update($uid);

        $response = array(array('respond' => $respondcode),
            'struct');

        return $this->xmlrpc->send_response($response);
    }

    public function syncLanding() {
        $domains = $this->domain->gets();

        foreach ($domains as $domain):
            $urlRpcs = 'http://' . $domain->name . '/index.php/server_rpcs';

            $this->xmlrpc->set_debug(FALSE);
            $this->xmlrpc->server($urlRpcs, 80);
            $this->xmlrpc->method('sync_landing');
            $param = array(
                'where' => 'ld_act = 1'
            );

            $dataLandings = $this->landingbank->gets($param);
            $request = array();

            foreach ($dataLandings as $row):
                $request[] = array(array(
                        'id' => array($row->id, 'int'),
                        'ld_title' => array($row->ld_title, 'string'),
                        'ld_content' => array($row->ld_content, 'string'),
                        'ld_type' => array($row->ld_type, 'int'),
                        'ld_image' => array($row->ld_image, 'string'),
                        'ld_theme' => array($row->ld_theme, 'string'),
                        'ip_address' => array($row->ip_address, 'string'),
                        'createdt' => array($row->createdt, 'string'),
                        'updatedt' => array($row->updatedt, 'string'),
                    ),
                    'struct');
            endforeach;

            $this->xmlrpc->request($request);

            if (!$this->xmlrpc->send_request()) {
                echo $this->xmlrpc->display_error();
            }
        endforeach;
    }

    /**
     * Aktifasi Member yang telah teregister
     * Untuk mendapatkan Cycle 2
     * 
     * **/
    public function activateRegMailist($request) {
        $parameters = $request->output_parameters();

        $uid = $parameters[0]['uid'];
        
        $this->mailistbank->updateFlagRegisteredMember($uid);

        $response = array(
            array('respond' => '1110',
                'message' => 'Activate Success'),
            'struct');

        return $this->xmlrpc->send_response($response);
    }        
    
}
