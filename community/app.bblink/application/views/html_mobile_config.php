<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
echo doctype('html5'). "\n";
echo "<head>";
$meta = array(
        array('name' => 'robots', 'content' => 'no-cache'),
        array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0'),
        array('name' => 'description', 'content' => 'K-Link Golf'),
        array('name' => 'keywords', 'content' => 'love, passion, golf, ball, hall of fame, hall in one, k-link, k-linkgolf'),
        array('name' => 'robots', 'content' => 'no-cache'),
        array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv'),
    );

echo meta($meta). "\n";

$css_responsive = array(
          'href' => 'bootstrap/css/bootstrap-responsive.css',
          'rel' => 'stylesheet',
          'type' => 'text/css',
          'charset'=>'utf-8',
);

echo link_tag($css_responsive). "\n";

$css_responsive = array(
          'href' => 'bootstrap/css/bootstrap.css',
          'rel' => 'stylesheet',
          'type' => 'text/css',
          'charset'=>'utf-8',
);

echo link_tag($css_responsive). "\n";

$css_responsive = array(
          'href' => 'css/mobile.css',
          'rel' => 'stylesheet',
          'type' => 'text/css',
          'charset'=>'utf-8',
);

echo link_tag($css_responsive). "\n";

?>
<script type="text/javascript" src="<?php echo base_url();?>scripts/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>bootstrap/js/bootstrap.js"></script>
</head>