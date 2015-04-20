<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

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

?>
<script type="text/javascript" src="scripts/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery.nivo.slider.js"></script>
<script type="text/javascript">
$(window).load(function() {
    $('#slider').nivoSlider({
        pauseTime: 10000,
        pauseOnHover: true,
        effect: 'random'
    });
});
</script>
<script type="text/javascript" src="css/tabber/tabber.js"></script>
<script type="text/javascript">

/* Optional: Temporarily hide the "tabber" class so it does not "flash"
   on the page as plain HTML. After tabber runs, the class is changed
   to "tabberlive" and it will appear. */

document.write('<style type="text/css">.tabber{display:none;}<\/style>');
</script>

