<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$fancybox = array(
          'href' => 'css/fancybox/jquery.fancybox-1.3.4.css',
          'rel' => 'stylesheet',
          'type' => 'text/css',
          'charset'=>'utf-8',
          'media' => 'screen',
);

echo link_tag($fancybox);
?>
<script type="text/javascript" src="<?php echo base_url();?>css/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript">
$(document).ready(function() {

$("a[rel=example_group]").fancybox({
        'transitionIn'		: 'none',
        'transitionOut'		: 'none',
        'titlePosition' 	: 'over',
        'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
                return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
        }
});

});
</script>
<script type="text/javascript" src="<?php echo base_url();?>css/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
