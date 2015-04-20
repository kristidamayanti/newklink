<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<script type="text/javascript">
$(function(){
 $('.auto-submit-star').rating({
  callback: function(value, link){
     $.ajax({
                type: "post",
                url: "<?php echo site_url('rating/rate'); ?>",
                dataType: "json",
                data: "&post_url=" + $('#post_url').val() + "&rate_val=" + value,

                success: function(e) {
                    $.jGrowl(e.code + "<br>" + e.msg);
                }
         });
  }
 });
});
</script>
