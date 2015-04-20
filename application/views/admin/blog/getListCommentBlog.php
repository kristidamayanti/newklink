<style>
  .oke {
    width: 340px;
  } 
</style>
<div class="mainForm">
  <form class="form-horizontal" id="formCommentApproval">
    <fieldset>      
      <div class="control-group">
        <label class="control-label" for="typeahead">Blog Type</label>
            <div class="controls">
              <select class="oke" id="bl_type" name="bl_type" onchange="Blog.getListBlogByType(this.value, 'search')">
                <option value="">--Select Here--</option>
                <?php
				   foreach($listBlogType as $list) {
				   	 echo "<option value=\"$list->bl_type\">$list->bl_name</option>";
				   }
				?>
              </select>&nbsp;&nbsp;<input type="button" class="btn btn-mini btn-primary" value="Refresh" onclick="Blog.refreshListBlogType(' #bl_type')" />    
            </div>
		<!--<span id="showListBlog">
		  	
		</span>-->
		<label class="control-label" for="typeahead">Blog Name</label>
            <div class="controls">
              <select id="blogID" class="oke" name="blogID">
                    <option value="">--Select Here--</option>
              </select>&nbsp;
              <input id="id" type="hidden" name="id">
              <input class="btn btn-mini btn-primary" type="button" onclick="Blog.getListBlogByType(this.form.bl_type.value)" value="Refresh">
        </div>	 
        <label class="control-label" for="typeahead">Create Date</label>
            <div class="controls">
               <input type="text" tabindex="5" class="datepicker typeahead" id="getListComFrom" name="from" onchange="convertTanggal(this.value, '#validFrom')">&nbsp;to&nbsp;
               <input type="text" tabindex="6" class="datepicker typeahead" id="getListComTo" name="to" onchange="convertTanggal(this.value, '#validTo')">
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
            <input tabindex="5" type="button" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Search" onclick="Blog.searchBlogComment()" />
            <input tabindex="6"  type="reset" class="btn btn-reset" value="Reset" />
            <!--<input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('admBlog/getListAllBlogComment')" />-->
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
   $(All.get_active_tab() + " #getListComFrom").datepicker({ dateFormat: 'dd/mm/yy', changeMonth:true, changeYear: true });
   $(All.get_active_tab() + " #getListComTo").datepicker({ dateFormat: 'dd/mm/yy', changeMonth:true, changeYear: true });
});

function convertTanggal(fromField, targetField) {
    var tgl1 = All.convertDateIndo(fromField, "ymd", "-");
    $(targetField).val(tgl1);
}
</script>
