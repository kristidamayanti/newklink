<?php
$sess = $this->nativesession->get('sessdata');
?>
<div class="mainForm">
  <form class="form-horizontal" id="formListTestimoni">
    <fieldset>      
      <div class="control-group">
       
        <label class="control-label" for="typeahead">Create Date</label>
            <div class="controls">
               <input type="text" tabindex="5" class="datepicker typeahead" id="from" name="from" onchange="convertTanggal(this.value, '#validFrom')">&nbsp;to&nbsp;
               <input type="text" tabindex="6" class="datepicker typeahead" id="to" name="to" onchange="convertTanggal(this.value, '#validTo')">
               <input type="hidden" class="span3 dtpicker" id="validFrom" name="validFrom" required="required" />
               <input type="hidden" class="span3 dtpicker" id="validTo" name="validTo" required="required" />
            </div>
        <label class="control-label" for="typeahead">Active</label>
            <div class="controls">
              <select id="act" name="act" tabindex="7">
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>    
            </div>
         <label class="control-label" for="typeahead">&nbsp</label>                             
        <div class="controls"  id="inp_btn">
            <input tabindex="5" type="button" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Search" onclick="Testimoni.searchTestimoni()" />
            <input tabindex="6"  type="reset" class="btn btn-reset" value="Reset" />
            <<!--input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('admTestimoni/getListAllTestimoni')" />-->
            <input type="hidden" id="searchF" value="searchF" value="" />
         </div>
         
    
        </div> <!-- end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->
<script>
$(document).ready(function()
{
   $(".datepicker").datepicker({ dateFormat: 'dd/mm/yy', changeMonth:true, changeYear: true });
});

function convertTanggal(fromField, targetField) {
    var tgl1 = All.convertDateIndo(fromField, "ymd", "-");
    $(targetField).val(tgl1);
}
</script>
