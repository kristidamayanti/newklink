<?php
$sess = $this->nativesession->get('sessdata');
?>
<div class="mainForm">
  <form class="form-horizontal" method="POST" action="<?php echo base_url('admNews/uploadAudioAction') ?>" enctype="multipart/form-data" id="formUpload">
    <fieldset>      
      <div class="control-group">
       
          <label class="control-label" for="typeahead">File Audio</label>
            <div class="controls" >
              <input type="file" id="url_audio" name="url_audio" class="span7 typeahead" />
              <!--<input placeholder="required" type="text" class="span7 typeahead" id="url_audio"  name="url_audio" />-->
            </div>
            
         <label class="control-label" for="typeahead">&nbsp</label>                             
        <div class="controls"  id="inp_btn">
            <input type="submit" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Submit" />
            <input type="reset" class="btn btn-reset" value="Reset" />
            <input type="button" class="btn btn-success" value="View List" onclick="News.getListData('admNews/getListNews')" />
         </div>
         
        </div> <!-- end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->
<script>
$(document).ready(function()
{
   
   $("#url_audio").change(function () {
        var ext = this.value.match(/\.(.+)$/)[1];
        switch (ext) {
            case 'mp3':
            case 'wav':
                $('#uploadButton').attr('disabled', false);
                break;
            default:
                alert('This is not an allowed file type, only MP3 | WAV');
                this.value = '';
        }
   });
});
</script>
