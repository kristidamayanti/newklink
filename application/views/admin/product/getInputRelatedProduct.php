
<style>
  .oke {
  	width: 340px;
  }	
</style>
<div class="mainForm">
  <form class="form-horizontal" enctype="multipart/form-data" id="formInputRelatedProduct">
    <fieldset>      
      <div class="control-group">
        
         <label class="control-label" for="typeahead">Main Product</label>
            <div class="controls">
               <select id="code"  name="code" class="oke">
                 <option value="">--Select Here--</option>
                 <?php 
                  foreach($listProduct as $list) {
                     echo "<option value=\"$list->code\">$list->title</option>";
                  }
                 ?>
               </select>&nbsp;&nbsp;<input type="button" class="btn btn-mini btn-primary" value="Refresh" onclick="Product.refreshListProduct(' #code')" /> 
               <input type="hidden" id="id" name="id" />
            </div>
         
            <?php
              for($i = 1; $i <= 3; $i++) {
                  echo "<label class=\"control-label\" for=\"typeahead\">Related Product $i</label>";
                  echo "<div class=\"controls\"><select class=\"oke\" id=\"rel_code$i\" name=\"rel_code[]\">";
                  echo "<option value=\"\">--Select Here--</option>";
                  foreach($listProduct as $list) {
                     echo "<option value=\"$list->code\">$list->title</option>";
                  }
                  echo "</select>&nbsp;&nbsp;<input type=\"button\" class=\"btn btn-mini btn-primary\" value=\"Refresh\" onclick=\"Product.refreshListProduct(' #rel_code$i')\" /></div>";
              }
            ?>
         
         <label class="control-label" for="typeahead">Active</label>
            <div class="controls">
               <select id="act" name="act">
                   <option value="1">Yes</option>
                   <option value="0">No</option>
               </select>
            </div>
         <label class="control-label" for="typeahead">&nbsp</label>                             
        <div class="controls"  id="inp_btn">
            <input tabindex="5" type="button" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Submit" onclick="Product.saveInputRelatedProduct()" />
            <input tabindex="6"  type="reset" class="btn btn-reset" value="Reset" />
            <input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('admProduct/getListRelatedProduct')" />
         </div>
         <div class="controls" id="upd_btn" style="display: none;">
            <input type="button" class="btn btn-primary" id="updsave" name="save" value="Update " onclick="Product.saveUpdateRelatedProduct()" />
            <input type="button" class="btn btn-danger" value="Cancel Update" id="cancelupd" onclick="Product.cancelUpdateRelatedProduct()" />
            <input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('admProduct/getListRelatedProduct')" />
                
         </div> 
    
        </div> <!-- end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->



