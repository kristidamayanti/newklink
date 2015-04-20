<?php
$sess = $this->nativesession->get('sessdata');
?>
<div class="mainForm">
  <form class="form-horizontal" id="formInputOfficeArea">
    <fieldset>      
      <div class="control-group">
        <?php
        $onchange = "Office.getListOfficeAreaByParam('areaname',this.value)";
        echo inputTextWithHiddenID("Area Name", "areaname", "span7 typeahead", "required", $onchange);
        $arr = array(
         "inputAction"  => "Office.saveInputOfficeArea()",
         "updateAction" => "Office.saveUpdateOfficeArea()",
         "cancelUpdate" => "Office.cancelUpdateOfficeArea()",
         "listAction"   => "All.getListData('admOffice/getListOfficeArea')",
        );
        echo buttonInputAndUpdate($arr);
        ?>
        <!--<label class="control-label" for="typeahead">Area Name</label>
            <div class="controls">
               <input type="hidden" id="id" name="id" />
               <input tabindex="2" placeholder="required" type="text" class="span7 typeahead" id="areaname"  name="areaname" onchange="Office.getListOfficeAreaByParam('areaname',this.value)" /> 
            </div>
         
         <label class="control-label" for="typeahead">&nbsp</label>                             
        <div class="controls"  id="inp_btn">
            <input tabindex="5" type="button" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Submit" onclick="Office.saveInputOfficeArea()" />
            <input tabindex="6"  type="reset" class="btn btn-reset" value="Reset" />
            <input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('admOffice/getListOfficeArea')" />
         </div>
         <div class="controls" id="upd_btn" style="display: none;">
            <input type="button" class="btn btn-primary" id="updsave" name="save" value="Update " onclick="Office.saveUpdateOfficeArea()" />
            <input type="button" class="btn btn-danger" value="Cancel Update" id="cancelupd" onclick="Office.cancelUpdateOfficeArea()" />
            <input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('admOffice/getListOfficeArea')" />
                
         </div> 
         -->
        </div> <!-- end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->
