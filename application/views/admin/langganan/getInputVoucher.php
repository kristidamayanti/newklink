<?php
$sess = $this->nativesession->get('sessdata');
?>
<div class="mainForm">
  <form class="form-horizontal" enctype="multipart/form-data" id="formInputVoucher">
    <fieldset>      
      <div class="control-group">
        <label class="control-label" for="typeahead">Qty</label>
            <div class="controls" tabindex="1">
              <input tabindex="1"  type="text" class="span4 typeahead" id="qty"  name="qty" />
            </div>
       
         <label class="control-label" for="typeahead">Price</label>
            <div class="controls" >
              <input tabindex="2" type="text" class="span4 typeahead" id="price"  name="price" />
            </div>
         <label class="control-label" for="typeahead">Period</label>
            <div class="controls" >
               <select id="periode" name="periode">
                 <option value="">--Select Here--</option>
                 <?php
                   for($i = 1; $i <= 12; $i++) {
                       echo "<option value=\"$i\">$i Bulan</option>";
                   }
                 ?>  
               </select>
            </div>
          <label class="control-label" for="typeahead">Start Date</label>
            <div class="controls">
               <input type="text" class="datepicker typeahead" id="from" name="from" onchange="convertTanggal(this.value, '#startFrom')">&nbsp;to&nbsp;
               
               <input type="hidden" class="span3 dtpicker" id="startFrom" name="startFrom" required="required" />
               
            </div>  
          <!--<label class="control-label" for="typeahead">Product Bundling</label>
            <div class="controls" >
               <select id="prdcdcat" name="prdcdcat" class="span7 typeahead">
                 <option value="">--Select Here--</option>
                 <?php
                   foreach($prdbundling as $list) {
                       echo "<option value=\"$list->prdcdCat\">$list->prdcdCatName</option>";
                   }
                 ?>  
               </select>
            </div> -->
          
         
         <label class="control-label" for="typeahead">&nbsp</label>                             
        <div class="controls"  id="inp_btn">
            <input tabindex="5" type="button" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Submit" onclick="inputNewVoucher()" />
            <input tabindex="6"  type="reset" class="btn btn-reset" value="Reset" />
            <!--<input type="button" class="btn btn-success" value="View List" onclick="Langganan.getListData('admLangganan/getListLangganan')" />-->
            
         </div>
         <div class="controls" id="upd_btn" style="display: none;">
            <input type="button" class="btn btn-primary" id="updsave" name="save" value="Update " onclick="Langganan.saveUpdateLangganan()" />
            <input type="button" class="btn btn-danger" value="Cancel Update" id="cancelupd" onclick="Langganan.cancelUpdateLangganan()" />
            <input type="button" class="btn btn-success" value="View List" onclick="Langganan.getListData('admLangganan/getListLangganan')" />
           
         </div>     
        </div> <!-- end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->
<script>
$(document).ready(function() {
    $('.span4').keyup(function () {     
      this.value = this.value.replace(/[^0-9\.]/g,'');
    });
    $(All.get_active_tab() + " .datepicker").datepicker({ dateFormat: 'dd/mm/yy' });
});

function convertTanggal(fromField, targetField) {
    var tgl1 = All.convertDateIndo(fromField, "ymd", "-");
    $(targetField).val(tgl1);
}

function inputNewVoucher() {
    All.set_disable_button();
    All.get_wait_message();
    $.post(All.get_url("admLangganan/inputNewVoucher") , $(All.get_active_tab() + " #formInputVoucher").serialize(), function(data)
    {  
        All.set_enable_button();
        if(data.response == "false") {
            All.set_error_message(".mainForm > .result", data.message);
        } 
        else {
            All.set_success_message(".mainForm > .result", data.message);
            All.reset_all_input();
        } 
       //$(All.get_box_content() + ".mainForm > .result").html(data);
        
    },"json").fail(function() { 
        alert("Error requesting page"); 
        All.set_enable_button();
    });  
}
</script>
