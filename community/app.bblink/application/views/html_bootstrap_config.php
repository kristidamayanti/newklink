<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
echo doctype('html5')."\n";
$bootstrap_css = array(
          'href' => 'bootstrap/css/bootstrap.css',
          'rel' => 'stylesheet',
          'type' => 'text/css',
          'charset'=>'utf-8',
);

echo link_tag($bootstrap_css)."\n";

?>
<script type="text/javascript" src="<?php echo base_url();?>scripts/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>bootstrap/js/bootstrap.js"></script>
