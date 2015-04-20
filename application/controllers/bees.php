<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of bod
 *
 * @author sahid
 */
class bees extends CI_Controller {

    //put your code here
    private $urlConfig = "html_config";
    private $urlReturn = "";

    public function __construct() {
        parent::__construct();
        $this->urlReturn = get_class($this);
    }

    //put your code here
    public function index() {
       $browser = new Buzz\Browser();
       $response = $browser->get('http://www.k-link.co.id');
       
       echo $browser->getLastRequest()."\n";
       echo $response;
       
    }

}
