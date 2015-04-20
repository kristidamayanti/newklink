<?php
$sess = $this->nativesession->get('sessdata');
?>
<div class="mainForm">
  <form class="form-horizontal" id="formSaveUserGroup">
    <fieldset>      
      <div class="control-group">
        <label class="control-label" for="typeahead">User Group Name</label>
             <div class="controls">
                <input type="hidden" class="span3 typeahead" id="id"  name="id" />
                <input tabindex="1" placeholder="<?php echo placeholderCheck(); ?>" type="text" class="span7 typeahead" id="nm_group"  name="nm_group" onchange="User.getListUserGroupByParam('nm_group',this.value)" />
             </div>
        
         <label class="control-label" for="typeahead">&nbsp</label>                             
         <div class="controls"  id="inp_btn">
            <input tabindex="5" type="button" id="btn_input_UserGroup" class="btn btn-primary .submit" name="save" value="Submit" onclick="User.saveInputUserGroup()" />
            <input tabindex="6"  type="reset" class="btn btn-reset" value="Reset" />
            <input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('admUser/getListUserGroup')" />
         </div>
         <div class="controls" id="upd_btn" style="display: none;">
            <input type="button" class="btn btn-primary" id="updsave" name="save" value="Update " onclick="User.saveUpdateUserGroup()" />
            <input type="button" class="btn btn-danger" value="Cancel Update" id="cancelupd" onclick="User.cancelUpdateUserGroup()" />
            <input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('admUser/getListUserGroup')" />
                
         </div> 
        </div> <!-- end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->