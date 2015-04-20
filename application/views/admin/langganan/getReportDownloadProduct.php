<?php
$sess = $this->nativesession->get('sessdata');
?>
<div class="mainForm">
  <form class="form-horizontal" id="formDownloadReport">
    <fieldset>      
      <div class="control-group">
      
         <label class="control-label" for="typeahead">Create Date</label>
            <div class="controls">
               <input type="text" class="datepicker typeahead" id="downloadFrom" name="from" onchange="convertTanggal(this.value, '#xDownloadFrom')">&nbsp;to&nbsp;
               <input type="text"  class="datepicker typeahead" id="downloadTo" name="to" onchange="convertTanggal(this.value, '#xDownloadTo')">
               <input type="hidden" class="span3 dtpicker" id="xDownloadFrom" name="xDownloadFrom" required="required" />
               <input type="hidden" class="span3 dtpicker" id="xDownloadTo" name="xDownloadTo" required="required" />
            </div>
         <label class="control-label" for="typeahead">History Trx Type</label>
            <div class="controls">
              <select id="hist_type" name="hist_type" class="span6">
                <!--<option value="activatedVoucher">Activated Voucher</option>-->
                <option value="voucher">Downloaded Product using Voucher</option>
                <option value="noVoucher">Downloaded Product using K-Wallet</option>
                <option value="all">All Downloaded Product</option>
                
              </select>    
            </div>
         
         <label class="control-label" for="typeahead">&nbsp</label>                             
        <div class="controls"  id="inp_btn">
            <input tabindex="8" type="button" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Submit" onclick="Langganan.getDownloadReport()" />
            <input tabindex="9"  type="reset" class="btn btn-reset" value="Reset" />
            <!--<input tabindex="10"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('admPromo/getListPromo')" />-->
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
    var tgl1 = All.convertDateIndo(fromField, "ymd", "-");
    $(targetField).val(tgl1);
}


</script>
