<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of general_manager
 *
 * @author sahid
 */
class apiController extends CI_Controller {

    //put your code here
    private $urlConfig = "html_config";
    private $urlReturn = "";
    private $manUser = 'sahid@k-link.co.id';
    private $manPassword = '5DUMdRwylH3ZXoahq67Ubg';
    private $smtpUrl = "smtp.mandrillapp.com";

    public function __construct() {
        parent::__construct();
        $this->urlReturn = get_class($this);
        $this->load->model('comment_model', 'comment');
        $this->load->model('testimonial_model', 'testi');
    }

    public function comment() {
        if ($this->input->post()):

            $bl_id = $this->input->post('bl_id');
            $name = $this->input->post('name');
            $bl_comment = $this->input->post('bl_comment');

            $this->comment->add($bl_id, $name, $bl_comment);
            $this->sendNotification($bl_comment);

            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('isTrue' => 'Berhasil')));
        endif;
    }

    public function postTesti() {
        if ($this->input->post()):

            $pid = $this->input->post('pid_id');
            $name = $this->input->post('name');
            $location = $this->input->post('location');
            $testimonial = $this->input->post('testimonial');

            $this->testi->add($pid, $name, $location, $testimonial);
            $this->sendNotifTestimony($testimonial);

            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('isTrue' => 'Berhasil')));
            
        endif;
    }

    public function sendNotification($bl_comment) {

        try {
            $transport = Swift_SmtpTransport::newInstance($this->smtpUrl, 587)
                    ->setUsername($this->manUser)
                    ->setPassword($this->manPassword);

            $mailer = Swift_Mailer::newInstance($transport);
            $message = Swift_Message::newInstance();
            $headers = $message->getHeaders();
            $headers->addTextHeader('X-MC-Track', 'opens, clicks_all');
            $headers->addTextHeader('X-MC-Tags', 'register');
            $headers->addTextHeader('X-MC-GoogleAnalytics', 'k-link.co.id');

            $message->setSubject('New Comment From K-Link');
            $message->setTo('abien.santoso@gmail.com ');
            $message->addCc('sahid@k-link.co.id', 'Sahid M Kusuma');
            $message->setFrom('info@k-link.co.id');

            $bl_id = $this->comment->getIDComment();
            $ids = $bl_id->id;

            $pesan = '';
            $pesan .= 'Hello Sir , I found this comment it might be need to be'
                    . ' approve by you ' . "\n";

            $pesan .= $bl_comment . "\n";
            $pesan .= "You can approve it by click this following link" . "\n";
            $pesan .= site_url() . 'approve/now/' . $ids . "\n";

            $message->setBody($pesan);
            $message->setPriority(2);

            $failures = array();
            if (!$mailer->send($message)):
                throw new Exception('Error Message : Cannot Send Email');
            endif;
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    public function sendNotifTestimony($bl_comment) {

        try {
            $transport = Swift_SmtpTransport::newInstance($this->smtpUrl, 587)
                    ->setUsername($this->manUser)
                    ->setPassword($this->manPassword);

            $mailer = Swift_Mailer::newInstance($transport);
            $message = Swift_Message::newInstance();
            $headers = $message->getHeaders();
            $headers->addTextHeader('X-MC-Track', 'opens, clicks_all');
            $headers->addTextHeader('X-MC-Tags', 'register');
            $headers->addTextHeader('X-MC-GoogleAnalytics', 'k-link.co.id');

            $message->setSubject('New Testimoni From K-Link Website' . date('Y-m-d H:i:s'));
            $message->setTo('abien.santoso@gmail.com ');
            $message->addCc('sahid@k-link.co.id', 'Sahid M Kusuma');
            $message->setFrom('info@k-link.co.id');

            $bl_id = $this->testi->getIDComment();
            $ids = $bl_id->id;

            $pesan = '';
            $pesan .= 'Hallo tolong diapprove komentar testimoni ini' . "\n";

            $pesan .= $bl_comment . "\n";
            $pesan .= "You can approve it by click this following link" . "\n";
            $pesan .= site_url() . 'approve/now/' . $ids . "\n";

            $message->setBody($pesan);
            $message->setPriority(2);

            $failures = array();
            if (!$mailer->send($message)):
                throw new Exception('Error Message : Cannot Send Email');
            endif;
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

}
