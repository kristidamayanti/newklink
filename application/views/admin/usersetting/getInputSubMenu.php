<?php
$sess = $this->nativesession->get('sessdata');
?>
<div class="mainForm">
  <form class="form-horizontal" id="formInputSubMenu">
    <fieldset>      
      <div class="control-group">
        
        <label class="control-label" for="typeahead">Sub Menu Name</label>
            <div class="controls">
               <input type="hidden" id="id" name="id" />
               <input tabindex="1" placeholder="<?php echo placeholderCheck(); ?>" type="text" class="span6 typeahead" id="subMenuName"  name="subMenuName" onchange="User.getListMenuByParam('menuName', this.value)" /> 
            </div>
        <label class="control-label" for="typeahead">URL Controller</label>
            <div class="controls">
               <input tabindex="2" placeholder="<?php echo placeholderCheck(); ?>" type="text" class="span6 typeahead" id="url"  name="url" onchange="User.getListMenuByParam('url', this.value)" /> 
            </div>
         <label class="control-label" for="typeahead">Root Menu</label>
            <div class="controls">
               <select tabindex="3" id="parentID" name="parentID" onchange="User.setPrefixSubMenu()">
                   <option value="">--Select Here--</option>
                   <?php
                   foreach($listRootMenu as $list) {
                       echo "<option value=\"$list->id|$list->prefix\">$list->menuName</option>";
                   }
                   ?>
                   
               </select>&nbsp;&nbsp;<input type="button" class="btn btn-mini btn-primary" value="Refresh" onclick="User.refreshListRootMenu(' #parentID')" /> 
               <input type="hidden" class="span2 typeahead" id="prefix" name="prefix" value="<?php echo $listRootMenu[0]->prefix; ?>" />
            </div>
         <label class="control-label" for="typeahead">Order List</label>
            <div class="controls">
               <input tabindex="4" type="text" class="span3 typeahead" id="orderlist"  name="orderlist"/> 
            </div>
         <label class="control-label" for="typeahead">&nbsp</label>                             
        <div class="controls"  id="inp_btn">
            <input tabindex="5" type="button" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Submit" onclick="User.saveInputSubMenu()" />
            <input tabindex="6"  type="reset" class="btn btn-reset" value="Reset" />
            <input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="User.getListSubMenu()" />
         </div>
         <div class="controls" id="upd_btn" style="display: none;">
            <input type="button" class="btn btn-primary" id="updsave" name="save" value="Update " onclick="User.saveUpdateSubMenu()" />
            <input type="button" class="btn btn-danger" value="Cancel Update" id="cancelupd" onclick="User.cancelUpdateSubMenu()" />
            <input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="User.getListSubMenu()" />
                
         </div> 
    
        </div> <!-- end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->