<?php
$sess = $this->nativesession->get('sessdata');
?>
<div class="mainForm">
  <form class="form-horizontal" id="formInputSyariahCat">
    <fieldset>      
      <div class="control-group">
        
       
        <label class="control-label" for="typeahead">Syariah Category Title</label>
            <div class="controls">
               <input type="hidden" name="id" id="id" />
               <input tabindex="1" placeholder="required" type="text" class="span7 typeahead" id="title"  name="title" onchange="Syariah.getListSyariahCatByParam('title',this.value)" /> 
            </div>
        <label class="control-label" for="typeahead">Active</label>
            <div class="controls">
               <select tabindex="2" id="act" name="act">
                   <option value="1">Yes</option>
                   <option value="0">No</option>
               </select> 
            </div> 
         <label class="control-label" for="typeahead">&nbsp</label>                             
        <div class="controls"  id="inp_btn">
            <input tabindex="3" type="button" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Submit" onclick="Syariah.saveInputSyariahCat()" />
            <input tabindex="4"  type="reset" class="btn btn-reset" value="Reset" />
            <input tabindex="5"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('admSyariah/getListSyariahCat')" />
         </div>
         <div class="controls" id="upd_btn" style="display: none;">
            <input type="button" class="btn btn-primary" id="updsave" name="save" value="Update " onclick="Syariah.saveUpdateSyariahCat()" />
            <input type="button" class="btn btn-danger" value="Cancel Update" id="cancelupd" onclick="Syariah.cancelUpdateSyariahCat()" />
            <input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('admSyariah/getListSyariahCat')" />
                
         </div> 
    
        </div> <!-- end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->
