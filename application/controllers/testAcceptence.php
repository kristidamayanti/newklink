<?php

/**
 * Description of testAcceptence
 *
 * @author sahid
 */
class testAcceptence extends CI_Controller {

    public function __construct() {
        parent::__construct();
//        TODO: untuk live ganti mailist_model dengan mailistbank_model
        $this->load->model('mailist_model', 'mailist');
        $this->load->model('bank_model', 'bank');
        $this->load->model('bank_model_register', 'bankReg');
        $this->load->model('grp_mailist_model', 'grpMailist');
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

    public function testLoopMembers() {
        $users = $this->getUsersMailist();

        $articles = $this->bank->gets();
        $nextRunno = 0;
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

        var_dump($replacements);
    }

    /**
     * Perlu di test
     * 
     * * */
    public function testAcceptMembers() {
        $users = $this->getUsersMailist();
        $articles = $this->getArticles();

        foreach ($users as $user):
            $nextRunno = $user->runregno + 1;
            foreach ($articles as $article):
                if (($user->registered == $article->registered) && ($nextRunno == $article->ld_artno)):
                    echo $user->email;
                    echo $user->name;
                    echo $article->ld_title;
                    $this->addRunRegNo($user->id);
                endif;
            endforeach;
        endforeach;
    }

}
