<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
echo doctype('html5');
$meta = array(
        array('name' => 'robots', 'content' => 'no-cache'),
        array('name' => 'description', 'content' => 'K-Link Golf'),
        array('name' => 'keywords', 'content' => 'love, passion, golf, ball, hall of fame, hall in one, k-link, k-linkgolf'),
        array('name' => 'robots', 'content' => 'no-cache'),
        array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
    );

echo meta($meta);

$css_tag = array(
          'href' => 'web_fonts/sofiapro_light_macroman/stylesheet.css',
          'rel' => 'stylesheet',
          'type' => 'text/css',
          'charset'=>'utf-8',
);

echo link_tag($css_tag).br();

$css_specimen = array(
          'href' => 'web_fonts/sofiapro_light_macroman/specimen_files/specimen_stylesheet.css',
          'rel' => 'stylesheet',
          'type' => 'text/css',
          'charset'=>'utf-8',
);

echo link_tag($css_specimen).br();

$css_main = array(
          'href' => 'css/main.css',
          'rel' => 'stylesheet',
          'type' => 'text/css',
          'charset'=>'utf-8',
);

echo link_tag($css_main).br();

$css_menu = array(
          'href' => 'css/cssmenu/menu_assets/styles.css',
          'rel' => 'stylesheet',
          'type' => 'text/css',
          'charset'=>'utf-8',
);

echo link_tag($css_menu).br();

$css_nivo_themes = array(
          'href' => 'css/nivo-slider/themes/light/light.css',
          'rel' => 'stylesheet',
          'type' => 'text/css',
          'charset'=>'utf-8',
          'media' => 'screen',
);

echo link_tag($css_nivo_themes).br();

$css_nivo_slider = array(
          'href' => 'css/nivo-slider/nivo-slider.css',
          'rel' => 'stylesheet',
          'type' => 'text/css',
          'charset'=>'utf-8',
          'media' => 'screen',
);

echo link_tag($css_nivo_slider).br();

$css_tab = array(
          'href' => 'css/tabber/tabber.css',
          'rel' => 'stylesheet',
          'type' => 'text/css',
          'charset'=>'utf-8',
          'media' => 'screen',
);

echo link_tag($css_tab).br();

$css_star = array(
          'href' => 'css/rating/jquery.rating.css',
          'rel' => 'stylesheet',
          'type' => 'text/css',
          'charset'=>'utf-8',
          'media' => 'screen',
);

echo link_tag($css_star).br();

?>
<script type="text/javascript" src="<?php echo base_url();?>scripts/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>scripts/jquery.nivo.slider.js"></script>
<script type="text/javascript">
$(window).load(function() {
    $('#slider').nivoSlider({
        pauseTime: 10000,
        pauseOnHover: true,
        effect: 'random'
    });
});
</script>
<script type="text/javascript" src="<?php echo base_url();?>css/tabber/tabber.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>scripts/jquery.rating.pack.js"></script>
<script type="text/javascript">

/* Optional: Temporarily hide the "tabber" class so it does not "flash"
   on the page as plain HTML. After tabber runs, the class is changed
   to "tabberlive" and it will appear. */

document.write('<style type="text/css">.tabber{display:none;}<\/style>');
</script>


