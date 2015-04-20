<?php
$sess = $this->nativesession->get('sessdata');
?>
<div class="mainForm">
  <form class="form-horizontal" enctype="multipart/form-data" id="formUploadsKaset">
    <fieldset>      
      <div class="control-group">
       
         <label class="control-label" for="typeahead">File CSV to upload</label>
            <div class="controls" >
              <input type="file" id="fileCSV" name="myfile" class="span7 typeahead" />
              <span id="spanfileCover" class="fileExistingInfo"></span>
              <input id="filenameCover" class="fileHiddenExistingInfo" type="hidden" name="filenameCSV"/>
              <!--<input placeholder="required" type="text" class="span7 typeahead" id="url_filedownload"  name="url_filedownload"  />-->
            </div>
          
          
         <label class="control-label" for="typeahead">&nbsp</label>                             
        <div class="controls"  id="inp_btn">
            <input tabindex="5" type="button" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Submit" onclick="Admks.saveImportSchedule()" />
            <input tabindex="6"  type="reset" class="btn btn-reset" value="Reset" />
          
            <input type="button" class="btn btn-success" value="Preview Content File" onclick="Admks.readFromFile()" />
         </div>
         
        </div> <!-- end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->
<script>
$(document).ready(function()
{
   
   $("#fileCSV").change(function () {
        var ext = this.value.match(/\.(.+)$/)[1];
        switch (ext) {
            case 'csv':
            case 'txt':
            
                $('#uploadButton').attr('disabled', false);
                break;
            default:
                alert('This is not an allowed file type, only CSV/TXT file..!!');
                this.value = '';
        }
   });
   
   
   
});
</script>
