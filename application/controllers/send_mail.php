<?php

/**
 * Description of send_mail
 *
 * @author sahid
 */
class send_mail extends CI_Controller {

    private $manUser = 'sahid@k-link.co.id';
    private $manPassword = '5DUMdRwylH3ZXoahq67Ubg';
    private $smtpUrl = "smtp.mandrillapp.com";

    public function __construct() {
        parent::__construct();
//        TODO: untuk live ganti mailist_model dengan mailistbank_model
        $this->load->model('mailistbank_model', 'mailist');
        $this->load->model('bank_model', 'bank');
        $this->load->model('bank_model_register', 'bankReg');
        $this->load->model('grp_mailist_model', 'grpMailist');
    }

    /*     * Initial Email, pada saat member bergabung dan dinyatakan aktif maka
     *  Cron job akan menjalankan tugasnya untuk mengirim email pertama 
     *  Proses Cron Job tiap 1 menit sekali
     * */

    public function index() {
        try {
            $users = $this->grpMailist->gets();
            $contentG = "";

            $replacements = array();
            foreach ($users as $user):
                $replacements[$user->email] = array(
                    "{name}" => $user->name,
                    "{title}" => $user->ld_title,
                    "{content}" => $user->ld_content
                );
            endforeach;

            $transport = Swift_SmtpTransport::newInstance($this->smtpUrl, 587)
                    ->setUsername($this->manUser)
                    ->setPassword($this->manPassword);

            $plugin = new Swift_Plugins_DecoratorPlugin($replacements);

            $mailer = Swift_Mailer::newInstance($transport);
            $mailer->registerPlugin($plugin);
            $mailer->registerPlugin(new Swift_Plugins_AntiFloodPlugin(150, 60));

            $mssg = Swift_Message::newInstance();
            $headers = $mssg->getHeaders();
            $headers->addTextHeader('X-MC-Track', 'opens, clicks_all');
            $headers->addTextHeader('X-MC-Tags', 'mailist');
            $headers->addTextHeader('X-MC-GoogleAnalytics', 'k-link.co.id');

            $mssg->setSubject("{title}");
            $contentG .="Hello {name}," . "\n";
            $contentG .="{content}" . "\n";
            $mssg->setBody($contentG, 'text/html');
            $mssg->setFrom("info@k-link.co.id", "Newsletters");
            $mssg->setPriority(2);

            $failures = array();
            foreach ($users as $user):
                $mssg->setTo($user->email, $user->name);
                $this->addRunNo($user->id);
                if (!$mailer->send($mssg, $failures)):
                    $this->failedReciept($failures);
                endif;
            endforeach;
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    /**
     * Continued Email, email yang di jalankan setelah email pertama
     * Proses Cron Job frekuensi harian
     * 
     * * */
    public function scheduled() {
        try {
            $param = array(
                'where' => 'act = 1'
            );

            $users = $this->mailist->gets($param);
            $articles = $this->bank->gets();
            $nextRunno = 0;
            $contentG = "";
            $replacements = array();

            foreach ($users as $user) {
                $nextRunno = $user->runno + 1;
                foreach ($articles as $article) {
                    if (($user->ld_type == $article->ld_type) && ($nextRunno == $article->ld_artno)):
                        $replacements[$user->email] = array(
                            "{name}" => $user->name,
                            "{title}" => $article->ld_title,
                            "{content}" => $article->ld_content
                        );
                    endif;
                }
            }

            $transport = Swift_SmtpTransport::newInstance($this->smtpUrl, 587)
                    ->setUsername($this->manUser)
                    ->setPassword($this->manPassword);

            $plugin = new Swift_Plugins_DecoratorPlugin($replacements);

            $mailer = Swift_Mailer::newInstance($transport);
            $mailer->registerPlugin($plugin);
            $mailer->registerPlugin(new Swift_Plugins_AntiFloodPlugin(250, 60));

            $mssg = Swift_Message::newInstance();
            $headers = $mssg->getHeaders();
            $headers->addTextHeader('X-MC-Track', 'opens, clicks_all');
            $headers->addTextHeader('X-MC-Tags', 'mailist');
            $headers->addTextHeader('X-MC-GoogleAnalytics', 'k-link.co.id');

            $mssg->setSubject("{title}");
            $contentG .="Hello {name}," . "\n";
            $contentG .="{content}" . "\n";
            $mssg->setBody($contentG, 'text/html');
            $mssg->setFrom("info@k-link.co.id", "Newsletters");
            $mssg->setPriority(2);

            $failures = array();
            foreach ($users as $user):
                $nextRunno = $user->runno + 1;
                foreach ($articles as $article):
                    if (($user->ld_type == $article->ld_type) && ($nextRunno == $article->ld_artno)):
                        $mssg->setTo($user->email, $user->name);
                        $this->addSelRunNo($user->id);
                        if (!$mailer->send($mssg, $failures)):
                            $this->failedReciept($failures);
                        endif;
                    endif;
                endforeach;
            endforeach;
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    /**
     * Email untuk member yang telah terdaftar sbg member K-Link
     * Proses Cron Job frekuensi harian
     * 
     * * */
    public function schedule_reg() {
        try {
            $users = $this->getUsersMailist();
            $articles = $this->getArticles();

            $nextRunno = 0;
            $contentG = "";
            $replacements = array();

            foreach ($users as $user) {
                $nextRunno = $user->runregno + 1;
                foreach ($articles as $article) {
                    if (($user->registered == $article->registered) && ($nextRunno == $article->ld_artno)):
                        $replacements[$user->email] = array(
                            "{name}" => $user->name,
                            "{title}" => $article->ld_title,
                            "{content}" => $article->ld_content
                        );
                    endif;
                }
            }

            $transport = Swift_SmtpTransport::newInstance($this->smtpUrl, 587)
                    ->setUsername($this->manUser)
                    ->setPassword($this->manPassword);

            $plugin = new Swift_Plugins_DecoratorPlugin($replacements);

            $mailer = Swift_Mailer::newInstance($transport);
            $mailer->registerPlugin($plugin);
            $mailer->registerPlugin(new Swift_Plugins_AntiFloodPlugin(250, 60));

            $mssg = Swift_Message::newInstance();
            $headers = $mssg->getHeaders();
            $headers->addTextHeader('X-MC-Track', 'opens, clicks_all');
            $headers->addTextHeader('X-MC-Tags', 'registered');
            $headers->addTextHeader('X-MC-GoogleAnalytics', 'k-link.co.id');

            $mssg->setSubject("{title}");
            $contentG .="Hello {name}," . "\n";
            $contentG .="{content}" . "\n";
            $mssg->setBody($contentG, 'text/html');
            $mssg->setFrom("info@k-link.co.id", "K-Link Newsletters");
            $mssg->setPriority(2);

            $failures = array();
            foreach ($users as $user):
                $nextRunno = $user->runregno + 1;
                foreach ($articles as $article):
                    if (($user->registered == $article->registered) && ($nextRunno == $article->ld_artno)):
                        $mssg->setTo($user->email, $user->name);
                        $this->addRunRegNo($user->id);
                        if (!$mailer->send($mssg, $failures)):
                            $this->failedReciept($failures);
                        endif;
                    endif;
                endforeach;
            endforeach;
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    /**
     * Membuat flag bahwa pengiriman gagal
     * 
     * Update
     * * */
    private function failedReciept($failures) {
        $failAddress = '';

        if (isset($failures)):
            $failAddress = $failures[0];
        else:
            $failAddress = $failures[1];
        endif;

        $this->mailist->updateFailures($failAddress);
    }

    private function addRunNo($id) {
        $this->mailist->insRunNo($id);
    }

    private function addSelRunNo($id) {
        $this->mailist->insSelRunNo($id);
    }

    /**
     * Menambahkan No urut setiap artikel yang telah dikirim untuk member
     * yang telah terdaftar
     * Insert
     * * */
    private function addRunRegNo($id) {
        $this->mailist->insRunRegNo($id);
    }

    /**
     * Mengambil User mailist berdasarkan param registered bagi member
     * yang telah terdaftar
     * 
     * Return Array
     * * */
    private function getUsersMailist() {
        $param = array(
            'where' => 'registered = 1'
        );

        $users = $this->mailist->gets($param);

        return $users;
    }

    /**
     * Mengambil Data Artikel berdasarkan param registered bagi member
     * yang telah terdaftar, karena artikel dibagi untuk member dan non member
     * 
     * Return Array
     * * */
    private function getArticles() {
        $param = array(
            'where' => 'registered = 1'
        );

        $articles = $this->bankReg->gets($param);

        return $articles;
    }

}
