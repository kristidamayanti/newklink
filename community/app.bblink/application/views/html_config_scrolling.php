<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$css_tag = array(
          'href' => 'css/board.css',
          'rel' => 'stylesheet',
          'type' => 'text/css',
          'charset'=>'utf-8',
);

echo link_tag($css_tag)."\n";

?>
<script type="text/javascript" src="<?php echo base_url();?>scripts/jquery.li-scroller.1.0.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>scripts/jquery-scroller-v1.min.js"></script>