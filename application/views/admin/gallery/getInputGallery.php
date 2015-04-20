<?php
$sess = $this->nativesession->get('sessdata');
?>
<div class="mainForm">
  <form class="form-horizontal" id="formInputGallery" enctype="multipart/form-data" >
    <fieldset>      
      <div class="control-group">
        
        <label class="control-label" for="typeahead">Group Gallery</label>
            <div class="controls">
               <input type="hidden" id="id" name="id" />
               <select tabindex="1" id="gid" name="gid">
               <?php 
                 foreach($listGalCat as $list) {
                     echo "<option value=\"$list->id\">$list->title</option>";
                 }
               ?>    
               </select>&nbsp;&nbsp;<input type="button" class="btn btn-mini btn-primary" value="Refresh" onclick="Gallery.refreshListGalleryCat(' #gid')" /> 
            </div>
        <label class="control-label" for="typeahead">Gallery Title/Name</label>
            <div class="controls">
               <input tabindex="2" placeholder="required (press tab after input to check data)" type="text" class="span7 typeahead" id="title"  name="title" /> 
            </div>
         
         <label class="control-label" for="typeahead">Description</label>
            <div class="controls">
               <textarea tabindex="4" placeholder="required" class="span7 typeahead" id="gallery_desc" name="gallery_desc"></textarea>
            </div>
         <label class="control-label" for="typeahead">Active</label>
            <div class="controls">
               <select id="act" name="act">
                   <option value="1">Yes</option>
                   <option value="0">No</option>
               </select>
            </div>
         <label class="control-label" for="typeahead">Gallery Image</label>
            <div class="controls">
               <input type="hidden" id="pid" name="pid" class="span7 typeahead" /> 
               <input type="file" id="galleryImage" name="myfile" class="span7 typeahead" />
               <span class="fileExistingInfo"></span>
               <input type="hidden" id="filename" name="filename" name="filename"/> 
               <div id="filesRec"></div>
            </div>
         
         
         <label class="control-label" for="typeahead">&nbsp</label>                             
        <div class="controls"  id="inp_btn">
            <input tabindex="5" type="button" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Submit" onclick="Gallery.saveInputGallery()" />
            <input tabindex="6"  type="reset" class="btn btn-reset" value="Reset" />
            <input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('admGallery/getListGallery')" />
         </div>
         <div class="controls" id="upd_btn" style="display: none;">
            <input type="button" class="btn btn-primary" id="updsave" name="save" value="Update " onclick="Gallery.saveUpdateGallery()" />
            <input type="button" class="btn btn-danger" value="Cancel Update" id="cancelupd" onclick="Gallery.cancelUpdateGallery()" />
            <input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('admGallery/getListGallery')" />
                
         </div> 
    
        </div> <!-- end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->

<script>
 $(function() {
   $("#galleryImage").change(function () {
        var ext = this.value.match(/\.(.+)$/)[1];
        switch (ext) {
            case 'jpg':
            case 'jpeg':
            case 'png':
            case 'gif':
            case 'JPG':
            case 'JPEG':
            case 'PNG':
            case 'GIF':
                $('#uploadButton').attr('disabled', false);
                break;
            default:
                alert('This is not an allowed file type.');
                this.value = '';
        }
   });
   
   /*$("form#formInputGallery").submit(function(){

        var formData = new FormData($(this)[0]);
    
        $.ajax({
            url: All.get_url('admGallery/saveInputGallery'),
            type: 'POST',
            data: formData,
            dataType: 'json',
            async: false,
            success: function (data) {
                All.set_enable_button();
                All.clear_div_in_boxcontent(".mainForm > .result");
                if(data.response == "false") {
                    All.set_error_message(".mainForm > .result", data.message);
                } 
                else {
                    All.set_success_message(".mainForm > .result", data.message);
                    All.reset_all_input();
                } 
            },
            cache: false,
            contentType: false,
            processData: false
        });

        return false;
    }); */
});

</script>