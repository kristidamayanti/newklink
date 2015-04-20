<?php
$sess = $this->nativesession->get('sessdata');
?>
<div class="mainForm">
  <form class="form-horizontal" enctype="multipart/form-data" id="formInputProduct">
    <fieldset>      
      <div class="control-group">
        <label class="control-label" for="typeahead">Active</label>
            <div class="controls">
               <select id="act" name="act">
                   <option value="1">Product Code</option>
                   <option value="0">Product Name</option>
               </select>
            </div>
         <label class="control-label" for="typeahead">Parameter Value</label>
            <div class="controls">
               <input tabindex="2" type="text" class="span7 typeahead" id="title"  name="title" /> 
            </div>
         <label class="control-label" for="typeahead">&nbsp</label>                             
        <div class="controls"  id="inp_btn">
            <input tabindex="5" type="button" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Submit" onclick="Product.saveInputProduct()" />
            <input tabindex="6"  type="reset" class="btn btn-reset" value="Reset" />
            <input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('admProduct/getListProduct')" />
         </div>
         <div class="controls" id="upd_btn" style="display: none;">
            <input type="button" class="btn btn-primary" id="updsave" name="save" value="Update " onclick="Product.saveUpdateProduct()" />
            <input type="button" class="btn btn-danger" value="Cancel Update" id="cancelupd" onclick="Product.cancelUpdateProduct()" />
            <input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('admGallery/getListProduct')" />
                
         </div> 
    
        </div> <!-- end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->



