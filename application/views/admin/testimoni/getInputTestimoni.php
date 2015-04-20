<?php
$sess = $this->nativesession->get('sessdata');
?>
<div class="mainForm">
  <form class="form-horizontal" enctype="multipart/form-data" id="formInputTestimoni">
    <fieldset>      
      <div class="control-group">
         <label class="control-label" for="typeahead">Name</label>
            <div class="controls" >
              <input type="hidden" id="id" name="id" value="" />
              <input placeholder="required" type="text" class="span7 typeahead" id="name"  name="name" />
            </div>
         <label class="control-label" for="typeahead">Location</label>
            <div class="controls" >
              <input type="text" class="span7 typeahead" id="location"  name="location" />
            </div>
         <label class="control-label" for="typeahead">Product</label>
            <div class="controls">
               <select id="pid" name="pid">
                   <?php
                    foreach($listProduct as $list) {
                        echo "<option value=\"$list->id\">$list->title</option>";
                    }
                    ?> 
               </select>&nbsp;&nbsp;<input type="button" class="btn btn-mini btn-primary" value="Refresh" onclick="Testimoni.refreshListProduct(' #pid')" />
            </div>   
         <label class="control-label" for="typeahead">Testimonial</label>
            <div class="controls">
               <textarea placeholder="required" class="span7 typeahead" id="testimonial" name="testimonial"></textarea>
            </div>
         <label class="control-label" for="typeahead">Active</label>
            <div class="controls">
               <select id="act" name="act">
                   <option value="1">YES</option>
                   <option value="0">NO</option>
               </select> 
            </div> 
         <label class="control-label" for="typeahead">&nbsp</label>                             
        <div class="controls"  id="inp_btn">
            <input tabindex="3" type="button" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Submit" onclick="Testimoni.saveInputTestimoni()" />
            <input tabindex="4"  type="reset" class="btn btn-reset" value="Reset" />
            <input tabindex="5"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('admTestimoni/getListAllTestimoni')" />
         </div>
         
         <div class="controls" id="upd_btn" style="display: none;">
            <input type="button" class="btn btn-primary" id="updsave" name="save" value="Update " onclick="Testimoni.saveUpdateTestimoni()" />
            <input type="button" class="btn btn-danger" value="Cancel Update" id="cancelupd" onclick="Testimoni.cancelUpdateTestimoni()" />
            <input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('Testimoni/getListAllTestimoni')" />
                
         </div> 
    
        </div> <!-- end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->
<script>
$(document).ready(function()
{
   $("#testimonial").cleditor({width: 600, height:220});
});
</script>
