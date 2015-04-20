<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of aboutus
 *
 * @author sahid
 */
class rss_feeds extends CI_Controller {

    private $urlConfig = "html_config";
    private $urlReturn = "";

    public function __construct() {
        parent::__construct();
        $this->urlReturn = get_class($this);
        $this->load->model('news_model', 'news');
        $this->load->model('successblog_model', 'blog');
        $this->load->model('product_model', 'prodModel');
    }

    //put your code here
    public function index() {
        redirect('rss_feeds/news');
    }

    public function news() {
        $param = array(
            'order' => 'tanggal DESC',
            'limit' => 10
        );

        $data = $this->news->gets($param);

        $tags = array(
            "&#8230;", "&nbsp;"
        );

        $xml = "";
        $xml .= "<?xml version = '1.0' encoding = 'UTF-8'?>" . "\n";
        $xml .= "<rss version='2.0'>" . "\n";
        $xml .= "<channel>" . "\n";
        $xml .= "<title>K-Link.co.id RSS Feed</title>" . "\n";
        $xml .= "<link>www.k-link.co.id</link>" . "\n";
        $xml .= "<description>Menyajikan berita terbaru seputar K-link Indonesia berita terkini, promo, pengumuman dsbg</description>" . "\n";
        $xml .= '<language>id</language>' . "\n";

        foreach ($data as $value):
            $slug = url_title($value->title);
            $img = "<img src=http://www.k-link.co.id/upload/news/thumbnail/" . $value->image . "/>";
            $xml .= "<item>" . "\n";
            $xml .= "<title>$value->title</title>" . "\n";
            $xml .= "<description>" . str_replace($tags, "", strip_tags(word_limiter($value->news, 50))) . "</description>" . "\n";
            $xml .= "<link>http://www.k-link.co.id/index.php/news/det/$value->id/$slug</link>" . "\n";
            $xml .= "<pubDate>" . date('D, d M y H:i:s O', strtotime($value->tanggal)) . "</pubDate>" . "\n";

            $xml .= "<copyright>Copyright (C)" . date('Y') . " www.k-link.co.id</copyright>" . "\n";
            $xml .= "</item>" . "\n";
        endforeach;

        $xml .= "</channel>" . "\n";
        $xml .= "</rss>" . "\n";

        $this->output
                ->set_content_type('application/rss+xml')
                ->set_output($xml);
    }

    public function newsUpdate() {
        $param = array(
            'order' => 'tanggal DESC',
            'limit' => 1
        );

        $data = $this->news->gets($param);

        $tags = array(
            "&#8230;", "&nbsp;"
        );

        $xml = "";
        $xml .= "<?xml version = '1.0' encoding = 'UTF-8'?>" . "\n";
        $xml .= "<rss version='2.0'>" . "\n";
        $xml .= "<channel>" . "\n";
        $xml .= "<title>K-Link.co.id RSS Feed</title>" . "\n";
        $xml .= "<link>www.k-link.co.id</link>" . "\n";
        $xml .= "<description>Menyajikan berita terbaru seputar K-link Indonesia berita terkini, promo, pengumuman dsbg</description>" . "\n";
        $xml .= '<language>id</language>' . "\n";

        foreach ($data as $value):
            $slug = url_title($value->title);
            $img = "<img src=http://www.k-link.co.id/upload/news/thumbnail/" . $value->image . "/>";
            $imgFile = "http://www.k-link.co.id/upload/news/thumbnail/" . $value->image;
            $imgSize = getimagesize($imgFile);
            $xml .= "<item>" . "\n";
            $xml .= "<title>$value->title</title>" . "\n";
            $xml .= "<description>" . str_replace($tags, "", strip_tags(word_limiter($value->news, 50))) . "</description>" . "\n";
            $xml .= "<enclosure url='$imgFile' length='$imgSize[0]' type='image/jpeg'/>";
            $xml .= "<link>http://www.k-link.co.id/index.php/news/det/$value->id/$slug</link>" . "\n";
            $xml .= "<pubDate>" . date('D, d M y H:i:s O', strtotime($value->tanggal)) . "</pubDate>" . "\n";

            $xml .= "<copyright>Copyright (C)" . date('Y') . " www.k-link.co.id</copyright>" . "\n";
            $xml .= "</item>" . "\n";
        endforeach;

        $xml .= "</channel>" . "\n";
        $xml .= "</rss>" . "\n";

        $this->output
                ->set_content_type('application/rss+xml')
                ->set_output($xml);
    }

    public function lifeStyle($type) {
        $param = array(
            'order' => 'createdt DESC',
            'where' => 'bl_type =' . $type,
            'limit' => 1
        );

        $data = $this->blog->gets($param);

        $tags = array(
            "&#8230;", "&nbsp;"
        );

        $xml = "";
        $xml .= "<?xml version = '1.0' encoding = 'UTF-8'?>" . "\n";
        $xml .= "<rss version='2.0'>" . "\n";
        $xml .= "<channel>" . "\n";
        $xml .= "<title>K-Link.co.id RSS Feed</title>" . "\n";
        $xml .= "<link>www.k-link.co.id</link>" . "\n";
        $xml .= "<description>Menyajikan berita terbaru seputar K-link Indonesia berita terkini, promo, pengumuman dsbg</description>" . "\n";
        $xml .= '<language>id</language>' . "\n";

        foreach ($data as $value):
            $slug = url_title($value->bl_title);
            $img = "<img src=http://www.k-link.co.id/upload/blog/thumbnail/" . $value->bl_profilepict . "/>";
            $imgFile = "http://www.k-link.co.id/upload/blog/thumbnail/" . $value->bl_profilepict;
            $imgSize = getimagesize($imgFile);
            $xml .= "<item>" . "\n";
            $xml .= "<title>$value->bl_title</title>" . "\n";
            $xml .= "<description>" . str_replace($tags, "", strip_tags(word_limiter($value->bl_content, 50))) . "</description>" . "\n";
            $xml .= "<enclosure url='$imgFile' length='$imgSize[0]' type='image/jpeg'/>";
            $xml .= "<link>http://www.k-link.co.id/index.php/lifestyle/artno/$value->id/$slug</link>" . "\n";
            $xml .= "<pubDate>" . date('D, d M y H:i:s O', strtotime($value->createdt)) . "</pubDate>" . "\n";

            $xml .= "<copyright>Copyright (C)" . date('Y') . " www.k-link.co.id</copyright>" . "\n";
            $xml .= "</item>" . "\n";
        endforeach;

        $xml .= "</channel>" . "\n";
        $xml .= "</rss>" . "\n";

        $this->output
                ->set_content_type('application/rss+xml')
                ->set_output($xml);
    }
    
    public function getProduct(){
        $data = $this->prodModel->getsRandom5();                
        
        $tags = array(
            "&#8230;", "&nbsp;"
        );

        $xml = "";
        $xml .= "<?xml version = '1.0' encoding = 'UTF-8'?>" . "\n";
        $xml .= "<rss version='2.0'>" . "\n";
        $xml .= "<channel>" . "\n";
        $xml .= "<title>K-Link.co.id Product RSS Feed</title>" . "\n";
        $xml .= "<link>www.k-link.co.id</link>" . "\n";
        $xml .= "<description>Menampilkan Product K-Link</description>" . "\n";
        $xml .= '<language>id</language>' . "\n";

        foreach ($data as $value):
            $slug = url_title($value->title);
            $img = "<img src=http://www.k-link.co.id/upload/product/original/" . $value->image . "/>";
            $imgFile = "http://www.k-link.co.id/upload/product/original/" . $value->image;
            $imgSize = getimagesize($imgFile);
            $xml .= "<item>" . "\n";
            $xml .= "<title>$value->title</title>" . "\n";
            $xml .= "<description>" . str_replace($tags, "", strip_tags(word_limiter($value->description, 50))) . "</description>" . "\n";
            $xml .= "<enclosure url='$imgFile' length='$imgSize[0]' type='image/jpeg'/>";
            $xml .= "<link>http://www.k-link.co.id/index.php/product/det/$value->id/$slug</link>" . "\n";
            $xml .= "<pubDate>" . date('D, d M y H:i:s O', strtotime($value->tanggal)) . "</pubDate>" . "\n";

            $xml .= "<copyright>Copyright (C)" . date('Y') . " www.k-link.co.id</copyright>" . "\n";
            $xml .= "</item>" . "\n";
        endforeach;

        $xml .= "</channel>" . "\n";
        $xml .= "</rss>" . "\n";

        $this->output
                ->set_content_type('application/rss+xml')
                ->set_output($xml);
    }

}
