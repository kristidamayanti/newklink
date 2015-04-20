<?php
$sess = $this->nativesession->get('sessdata');
?>
<div class="mainForm">
  <form class="form-horizontal" id="formVoucherReport">
    <fieldset>      
      <div class="control-group">
      
         <label class="control-label" for="typeahead">Create Date</label>
            <div class="controls">
               <input type="text" class="datepicker typeahead" id="ssfrom" name="from" onchange="convertTanggal(this.value, '#ssvalidFrom')">&nbsp;to&nbsp;
               <input type="text"  class="datepicker typeahead" id="ssto" name="to" onchange="convertTanggal(this.value, '#ssvalidTo')">
               <input type="hidden" class="span3 dtpicker" id="ssvalidFrom" name="validFrom" required="required" />
               <input type="hidden" class="span3 dtpicker" id="ssvalidTo" name="validTo" required="required" />
            </div>
         <label class="control-label" for="typeahead">Status</label>
            <div class="controls">
              <select id="act" name="act" >
                <option value="1">Activated</option>
                <option value="0">Inactive</option>
                <option value="all">All</option>
              </select>    
            </div>
         
         <label class="control-label" for="typeahead">&nbsp</label>                             
        <div class="controls"  id="inp_btn">
            <input tabindex="8" type="button" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Submit" onclick="Langganan.getVoucherReport()" />
            <input tabindex="9"  type="reset" class="btn btn-reset" value="Reset" />
            <!--<input tabindex="10"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('admPromo/getListPromo')" />-->
         </div>
         <div class="controls" id="upd_btn" style="display: none;">
            <input type="button" class="btn btn-primary" id="updsave" name="save" value="Update " onclick="Promo.saveUpdatePromo()" />
            <input type="button" class="btn btn-danger" value="Cancel Update" id="cancelupd" onclick="Promo.cancelUpdatePromo()" />
            <!--<input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('admPromo/getListPromo')" />-->
                
         </div> 
    
        </div> <!-- end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->
<script>
$(document).ready(function()
{
  
   $(All.get_active_tab() + " .datepicker").datepicker({ dateFormat: 'dd/mm/yy' });
  
});

function convertTanggal(fromField, targetField) {
    var tgl1 = All.convertDateIndo(fromField, "ymd", "/");
    $(targetField).val(tgl1);
}


</script>
