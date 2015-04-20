<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<script type="text/javascript" src="<?php echo base_url();?>scripts/jquery.tweet.js"></script>
<script type='text/javascript'>
    jQuery(function($){
        $(".tweet").tweet({
            join_text: "auto",
            username:"KlinkGolf",
            count: 1,
            loading_text: "loading tweets..."
        });
    });
</script>
