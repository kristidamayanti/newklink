<?php
$sess = $this->nativesession->get('sessdata');
?>
<div class="mainForm">
  <form class="form-horizontal" id="formInputRootMenu">
    <fieldset>      
      <div class="control-group">
        
        <label class="control-label" for="typeahead">Root Menu Name</label>
            <div class="controls">
               <input type="hidden" id="id" name="id" />
               <input tabindex="1" placeholder="<?php echo placeholderCheck(); ?>" type="text" class="span6 typeahead" id="rootMenuName"  name="rootMenuName" onchange="User.getListMenuByParam('menuName', this.value)" /> 
            </div>
        <label class="control-label" for="typeahead">Sub menu Prefix</label>
            <div class="controls">
               <input tabindex="2" placeholder="<?php echo placeholderCheck(); ?>" type="text" class="span6 typeahead" id="prefix"  name="prefix" onchange="User.getListMenuByParam('prefix', this.value)" /> 
            </div>
         <label class="control-label" for="typeahead">Order List</label>
            <div class="controls">
               <input tabindex="3" type="text" class="span3 typeahead" id="orderlist"  name="orderlist"/> 
            </div>
         <label class="control-label" for="typeahead">&nbsp</label>                             
        <div class="controls"  id="inp_btn">
            <input tabindex="5" type="button" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Submit" onclick="User.saveInputRootMenu()" />
            <input tabindex="6"  type="reset" class="btn btn-reset" value="Reset" />
            <input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="User.getListRootMenu()" />
         </div>
         <div class="controls" id="upd_btn" style="display: none;">
            <input type="button" class="btn btn-primary" id="updsave" name="save" value="Update " onclick="User.saveUpdateRootMenu()" />
            <input type="button" class="btn btn-danger" value="Cancel Update" id="cancelupd" onclick="User.cancelUpdateRootMenu()" />
            <input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="User.getListRootMenu()" />
                
         </div> 
    
        </div> <!-- end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->