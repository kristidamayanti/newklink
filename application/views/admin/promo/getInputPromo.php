<?php
$sess = $this->nativesession->get('sessdata');
?>
<div class="mainForm">
  <form class="form-horizontal" id="formInputPromo">
    <fieldset>      
      <div class="control-group">
       
        <label class="control-label" for="typeahead">Promo Title</label>
            <div class="controls">
               <input type="hidden" id="id" name="id" value="" />
               <input placeholder="<?php echo placeholderCheck(); ?>" type="text" class="span7 typeahead" id="title"  name="title" onchange="Promo.getListPromoByParam('title', this.value)" /> 
            </div>
         <label class="control-label" for="typeahead">URL</label>
            <div class="controls">
               <input placeholder="required" type="text" class="span7 typeahead" id="url" name="url" />
            </div>
         <label class="control-label" for="typeahead">Description</label>
            <div class="controls">
               <textarea class="span7 typeahead" id="descPromo" name="descPromo"></textarea>
            </div>
	     
         <label class="control-label" for="typeahead">File Image</label>
            <div class="controls">
               <input type="hidden" id="pid" name="pid" class="span7 typeahead" /> 
               <input placeholder="required" type="file" id="fileDownload" name="myfile" class="cfile span7 typeahead" />
               <span id="spanfilePromo" class="fileExistingInfo"></span>
               <input id="filenamePromo" class="fileHiddenExistingInfo" type="hidden" name="filenamePromo">
            </div>
         <label class="control-label" for="typeahead">Valid Date</label>
            <div class="controls">
               <input type="text" class="datepicker typeahead" id="from" name="from" onchange="convertTanggal(this.value, '#validFrom')">&nbsp;to&nbsp;
			   <input type="text"  class="datepicker typeahead" id="to" name="to" onchange="convertTanggal(this.value, '#validTo')">
			   <input type="hidden" class="span3 dtpicker" id="validFrom" name="validFrom" required="required" />
               <input type="hidden" class="span3 dtpicker" id="validTo" name="validTo" required="required" />
            </div>
         <label class="control-label" for="typeahead">Active</label>
            <div class="controls">
              <select id="act" name="act" >
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>    
            </div>
		 
         <label class="control-label" for="typeahead">&nbsp</label>                             
        <div class="controls"  id="inp_btn">
            <input tabindex="8" type="button" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Submit" onclick="Promo.saveInputPromo()" />
            <input tabindex="9"  type="reset" class="btn btn-reset" value="Reset" />
            <input tabindex="10"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('admPromo/getListPromo')" />
         </div>
         <div class="controls" id="upd_btn" style="display: none;">
            <input type="button" class="btn btn-primary" id="updsave" name="save" value="Update " onclick="Promo.saveUpdatePromo()" />
            <input type="button" class="btn btn-danger" value="Cancel Update" id="cancelupd" onclick="Promo.cancelUpdatePromo()" />
            <input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('admPromo/getListPromo')" />
                
         </div> 
    
        </div> <!-- end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->
<script>
$(document).ready(function()
{
   $(".cfile").change(function () {
        var ext = this.value.match(/\.(.+)$/)[1];
        switch (ext) {
            case 'jpg':
            case 'jpeg':
            case 'png':
            case 'gif':
                $('#uploadButton').attr('disabled', false);
                break;
            default:
                alert('This is not an allowed file type.');
                this.value = '';
        }
   });
   $(".datepicker").datepicker({ dateFormat: 'dd/mm/yy' });
   $("#descPromo").cleditor({width: 600, height:250});
});

function convertTanggal(fromField, targetField) {
	var tgl1 = All.convertDateIndo(fromField, "ymd", "-");
	$(targetField).val(tgl1);
}
</script>
