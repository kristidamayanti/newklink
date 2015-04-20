<?php
$sess = $this->nativesession->get('sessdata');
?>
<div class="mainForm">
  <form class="form-horizontal" id="formInputWebRootMenu">
    <fieldset>      
      <div class="control-group">
         <label class="control-label" for="typeahead">Root Menu Name</label>
            <div class="controls">
               <input type="hidden" id="id" name="id" />
               <input placeholder="<?php echo placeholderCheck(); ?>" type="text" class="span6 typeahead" id="menu_title"  name="menu_title" onchange="Webmenu.getListMenuByParam('menu_title', this.value)" /> 
            </div>
         <label class="control-label" for="typeahead">URL</label>
            <div class="controls">
               <input placeholder="required" type="text" class="span6 typeahead" id="menu_url"  name="menu_url" /> 
            </div>
         <label class="control-label" for="typeahead">Category</label>
            <div class="controls">
               <input placeholder="required" type="text" class="span5 typeahead" id="menu_category"  name="menu_category" /> 
            </div>
         <label class="control-label" for="typeahead">Description</label>
            <div class="controls">
               <textarea class="span7 typeahead" id="menu_description" name="menu_description"></textarea>
            </div>
         <!--<label class="control-label" for="typeahead">Order List</label>
            <div class="controls">
               <input type="text" class="span3 typeahead" id="orderlist"  name="orderlist"/> 
            </div>-->
         <label class="control-label" for="typeahead">&nbsp</label>                             
        <div class="controls"  id="inp_btn">
            <input  type="button" id="btn_input_Webmenu" class="btn btn-primary .submit" name="save" value="Submit" onclick="Webmenu.saveInputRootMenu()" />
            <input  type="reset" class="btn btn-reset" value="Reset" />
            <input  type="button" class="btn btn-success" value="View List" onclick="Webmenu.getListRootMenu()" />
         </div>
         <div class="controls" id="upd_btn" style="display: none;">
            <input type="button" class="btn btn-primary" id="updsave" name="save" value="Update " onclick="Webmenu.saveUpdateRootMenu()" />
            <input type="button" class="btn btn-danger" value="Cancel Update" id="cancelupd" onclick="Webmenu.cancelUpdateRootMenu()" />
            <input type="button" class="btn btn-success" value="View List" onclick="Webmenu.getListRootMenu()" />
                
         </div> 
    
        </div> <!-- end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->