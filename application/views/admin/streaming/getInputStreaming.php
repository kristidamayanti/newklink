<?php
$sess = $this->nativesession->get('sessdata');
?>
<div class="mainForm">
  <form class="form-horizontal" enctype="multipart/form-data" id="formInputStreaming">
    <fieldset>      
      <div class="control-group">
       
        <label class="control-label" for="typeahead">Streaming Category</label>
            <div class="controls">
               <input type="hidden" id="id" name="id" value="" />
               <select id="category" name="category" tabindex="1">
                 <?php
                   foreach($listStreamingCat as $list) {
                       echo "<option value=\"$list->id\">$list->title</option>";
                   }
                 ?>  
               </select>&nbsp;&nbsp;<input type="button" class="btn btn-mini btn-primary" value="Refresh" onclick="Streaming.refreshListStreamingCat(' #category')" /> 
            </div>
         <label class="control-label" for="typeahead">Title</label>
            <div class="controls" tabindex="2">
              <input placeholder="<?php echo placeholderCheck(); ?>" tabindex="2" type="text" class="span7 typeahead" id="title"  name="title" onchange="Streaming.getListStreamingByParam('title', this.value)" />
            </div>
         <label class="control-label" for="typeahead">Description</label>
            <div class="controls">
               <textarea placeholder="required" tabindex="3" class="span7 typeahead" id="streaming_desc" name="streaming_desc"></textarea>
            </div>
         <label class="control-label" for="typeahead">Image</label>
            <div class="controls">
               <input type="hidden" id="pid" name="pid" class="span7 typeahead" /> 
               <input placeholder="required" tabindex="4" type="file" id="fileDownload" name="myfile" class="cfile span7 typeahead" />
               <span id="spanfileStreaming" class="fileExistingInfo"></span>
               <input id="filenameStreaming" class="fileHiddenExistingInfo" type="hidden" name="filenameStreaming">
            </div>
         <label class="control-label" for="typeahead">Youtube URL</label>
            <div class="controls">
               <input placeholder="required" type="text" tabindex="5" class="span8 typeahead" id="youtube_url" name="youtube_url" />
            </div>
         <label class="control-label" for="typeahead">Duration</label>
            <div class="controls">
               <input placeholder="required" type="text" tabindex="6" class="span5 typeahead" id="duration" name="duration" />
            </div>
         <label class="control-label" for="typeahead">Active</label>
            <div class="controls">
              <select id="act" name="act">
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>    
            </div>
         <label class="control-label" for="typeahead">&nbsp</label>                             
        <div class="controls"  id="inp_btn">
            <input tabindex="5" type="button" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Submit" onclick="Streaming.saveInputStreaming()" />
            <input tabindex="6"  type="reset" class="btn btn-reset" value="Reset" />
            <input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('admStreaming/getListStreaming')" />
         </div>
         <div class="controls" id="upd_btn" style="display: none;">
            <input type="button" class="btn btn-primary" id="updsave" name="save" value="Update " onclick="Streaming.saveUpdateStreaming()" />
            <input type="button" class="btn btn-danger" value="Cancel Update" id="cancelupd" onclick="Streaming.cancelUpdateStreaming()" />
            <input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('Streaming/getListStreaming')" />
                
         </div> 
    
        </div> <!-- end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->
<script>
$(document).ready(function()
{
   $(".cfile").change(function () {
        var ext = this.value.match(/\.(.+)$/)[1];
        switch (ext) {
            case 'jpg':
            case 'jpeg':
            case 'png':
            case 'gif':
                $('#uploadButton').attr('disabled', false);
                break;
            default:
                alert('This is not an allowed file type.');
                this.value = '';
        }
   });
});
</script>
