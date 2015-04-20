<?php
$sess = $this->nativesession->get('sessdata');

?>
<div class="mainForm">
  <form class="form-horizontal" id="formInputGalleryCat">
    <fieldset>      
      <div class="control-group">
        
        <label class="control-label" for="typeahead">Group Gallery ID</label>
            <div class="controls">
               <input type="hidden" id="id" name="id" />
               <input tabindex="1" type="text" placeholder="<?php echo placeholderCheck(); ?>" class="span6 typeahead" id="gid"  name="gid" onchange="Gallery.getGalleryCatByParam('gid',this.value)" /> 
            </div>
        <label class="control-label" for="typeahead">Group Gallery Title/Name</label>
            <div class="controls">
               <input tabindex="2" placeholder="<?php echo placeholderCheck(); ?>" type="text" class="span7 typeahead" id="gCatTitle"  name="gCatTitle" onchange="Gallery.getGalleryCatByParam('title',this.value)" /> 
            </div>
         
         <label class="control-label" for="typeahead">&nbsp</label>                             
        <div class="controls"  id="inp_btn">
            <input tabindex="5" type="button" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Submit" onclick="Gallery.saveInputGalleryCat()" />
            <input tabindex="6"  type="reset" class="btn btn-reset" value="Reset" />
            <input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('admGallery/getListGalleryCat')" />
         </div>
         <div class="controls" id="upd_btn" style="display: none;">
            <input type="button" class="btn btn-primary" id="updsave" name="save" value="Update " onclick="Gallery.saveUpdateGalleryCat()" />
            <input type="button" class="btn btn-danger" value="Cancel Update" id="cancelupd" onclick="Gallery.cancelUpdateGalleryCat()" />
            <input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('admGallery/getListGalleryCat')" />
                
         </div> 
    
        </div> <!-- end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->

<script>
 $(function() {
   $("#fileImage").change(function () {
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