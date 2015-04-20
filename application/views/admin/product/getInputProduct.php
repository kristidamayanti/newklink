<?php
$sess = $this->nativesession->get('sessdata');
?>
<div class="mainForm">
  <form class="form-horizontal" enctype="multipart/form-data" id="formInputProduct">
    <fieldset>      
      <div class="control-group">
        
        <label class="control-label" for="typeahead">Product Code</label>
            <div class="controls">
               <input type="hidden" id="id" name="id" />
               <input placeholder="<?php echo placeholderCheck(); ?>" type="text" class="span6 typeahead" id="prdcd"  name="prdcd" onchange="Product.getProductByID(this.value, 'title')" /> 
            </div>
        <label class="control-label"  for="typeahead">Product Title/Name</label>
            <div class="controls">
               <input placeholder="required" type="text" class="span7 typeahead" id="title"  name="title" /> 
            </div>
         <label class="control-label" for="typeahead">Category</label>
            <div class="controls">
               <select id="category"  name="category">
			     <option value="">--Select Here--</option>
				 <?php 
				  foreach($listProductCat as $list) {
				  	 echo "<option value=\"$list->id\">$list->prdcat_name</option>";
				  }
				 ?>
			   </select>&nbsp;&nbsp;<input type="button" class="btn btn-mini btn-primary" value="Refresh" onclick="Product.refreshListProductCat(' #category')" /> 
            </div>
         <label class="control-label" for="typeahead">Description</label>
            <div class="controls">
               <textarea class="span7 typeahead" id="product_desc" name="product_desc"></textarea>
            </div>
         <label class="control-label" for="typeahead">Product Image</label>
            <div class="controls">
               <?php
                 multiUploadFile(5);
               ?>
               
               <!--<input type="file" name="myfile[]" class="span7 typeahead" />-->
               <!--<div id="fileuploader">Upload</div>-->
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
            <input tabindex="5" type="button" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Submit" onclick="Product.saveInputProduct()" />
            <input tabindex="6"  type="reset" class="btn btn-reset" value="Reset" />
            <input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="Product.getListDataProduct('admProduct/getListProduct')" />
         </div>
         <div class="controls" id="upd_btn" style="display: none;">
            <input type="button" class="btn btn-primary" id="updsave" name="save" value="Update " onclick="Product.saveUpdateProduct()" />
            <input type="button" class="btn btn-danger" value="Cancel Update" id="cancelupd" onclick="Product.cancelUpdateProduct()" />
            <input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="Product.getListDataProduct('admGallery/getListProduct')" />
                
         </div> 
    
        </div> <!-- end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->

<script>
$(document).ready(function()
{
   $(All.get_active_tab() + " #product_desc").cleditor({width: 600, height:330});
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


