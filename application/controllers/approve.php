<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of approve
 *
 * @author sahid
 */
class approve extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('comment_model', 'comment');
        $this->load->model('testimonial_model', 'testi');
    }

    public function index() {
        redirect('approve/now');
    }

    public function now($bl_id) {
        if ($bl_id == NULL):
            echo 'The Comment you type was not correct';
        else:
            $this->comment->update($bl_id);
            echo 'Approve Success';
        endif;
    }
    
     public function testi($bl_id) {
        if ($bl_id == NULL):
            echo 'The Comment you type was not correct';
        else:
            $this->testi->update($bl_id);
            echo 'Approve Success';
        endif;
    }

}
