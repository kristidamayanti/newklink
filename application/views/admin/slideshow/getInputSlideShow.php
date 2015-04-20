<?php
$sess = $this->nativesession->get('sessdata');
?>
<div class="mainForm">
  <form class="form-horizontal" id="formInputSlideShow">
    <fieldset>      
      <div class="control-group">
       
        <label class="control-label" for="typeahead">Slideshow Title</label>
            <div class="controls">
               <input type="hidden" id="id" name="id" value="" />
               <input placeholder="<?php echo placeholderCheck(); ?>"  type="text" class="span7 typeahead" id="title"  name="title" onchange="Slideshow.getListSlideShowByParam('title', this.value)" /> 
            </div>
         <label class="control-label" for="typeahead">URL</label>
            <div class="controls">
               <input placeholder="required" type="text" class="span7 typeahead" id="url" name="url" />
            </div>
         <label class="control-label" for="typeahead">Description</label>
            <div class="controls">
               <textarea class="span7 typeahead" id="slide_desc" name="slide_desc"></textarea>
            </div>
         <label class="control-label" for="typeahead">File Image</label>
            <div class="controls">
               <input type="hidden" id="pid" name="pid" class="span7 typeahead" /> 
               <input placeholder="required" type="file" id="fileDownload" name="myfile" class="cfile span7 typeahead" />
               <span id="spanfileSlideshow" class="fileExistingInfo"></span>
               <input id="filenameSlideshow" class="fileHiddenExistingInfo" type="hidden" name="filenameSlideshow">
            </div>
         <label class="control-label" for="typeahead">Image Description</label>
            <div class="controls">
               <input type="text" class="span9 typeahead" id="img_desc" name="img_desc" />
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
            <input type="button" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Submit" onclick="Slideshow.saveInputSlideShow()" />
            <input type="reset" class="btn btn-reset" value="Reset" />
            <input type="button" class="btn btn-success" value="View List" onclick="All.getListData('admSlideshow/getListSlideShow')" />
         </div>
         <div class="controls" id="upd_btn" style="display: none;">
            <input type="button" class="btn btn-primary" id="updsave" name="save" value="Update " onclick="Slideshow.saveUpdateSlideShow()" />
            <input type="button" class="btn btn-danger" value="Cancel Update" id="cancelupd" onclick="Slideshow.cancelUpdateSlideShow()" />
            <input type="button" class="btn btn-success" value="View List" onclick="All.getListData('admSlideshow/getListSlideShow')" />
                
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
   
   $("#slide_desc").cleditor({width: 600, height:250});
   
   //$("#description").cleditor();
});
</script>
