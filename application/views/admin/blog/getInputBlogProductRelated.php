<style>
  .oke {
    width: 340px;
  } 
</style>
<div class="mainForm">
  <form class="form-horizontal" id="formInputBlogRelatedToProduct">
    <fieldset>      
      <div class="control-group">
        <span id="forInput">
        <label class="control-label" for="typeahead">Blog Type</label>
            <div class="controls">
              <select class="oke" id="bl_type" name="bl_type" onchange="Blog.getListBlogByType(this.value, 'blogPrdRelated')">
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
        </span>
        <span id="forUpdate">
            
        </span>
        <?php
          for($i = 1; $i <= 3; $i++) {
              echo "<label class=\"control-label\" for=\"typeahead\">Related Product $i</label>";
              echo "<div class=\"controls\"><select class=\"oke\" id=\"code$i\" name=\"code[]\">";
              echo "<option value=\"\">--Select Here--</option>";
              foreach($listProduct as $list) {
                 echo "<option value=\"$list->code\">$list->title</option>";
              }
              echo "</select>&nbsp;&nbsp;<input type=\"button\" class=\"btn btn-mini btn-primary\" value=\"Refresh\" onclick=\"Blog.refreshListProductRelated(' #code$i')\" /></div>";
          }
        ?>  
        <!--<label class="control-label" for="typeahead">Product Relation</label>
            <div class="controls">
               <select id="code"  name="code" class="oke">
                 <option value="">--Select Here--</option>
                 <?php 
                  foreach($listProduct as $list) {
                     echo "<option value=\"$list->code\">$list->title</option>";
                  }
                 ?>
               </select>&nbsp;&nbsp;<input type="button" class="btn btn-mini btn-primary" value="Refresh" onclick="Blog.refreshListProductRelated(' #code')" /> 
               <input type="hidden" id="id" name="id" />
            </div>-->
        <label class="control-label" for="typeahead">Active</label>
            <div class="controls">
              <select id="act" name="act" tabindex="7">
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>    
            </div>
        <!-- <label class="control-label" for="typeahead">&nbsp</label>                             
        <div class="controls"  id="inp_btn">
            <input tabindex="5" type="button" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Search" onclick="Blog.saveInputBlogProductRelated()" />
            <input tabindex="6"  type="reset" class="btn btn-reset" value="Reset" />
            <input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('admBlog/getListBlogProductRelated')" />
            <input type="hidden" id="searchF" value="searchF" value="" />
         </div> -->
         <?php
         $arr = array(
             "inputAction"  => "Blog.saveInputBlogProductRelated()",
             "updateAction" => "Blog.saveUpdateBlogProductRelated()",
             "cancelUpdate" => "Blog.cancelUpdateBlogProductRelated()",
             "listAction"   => "Blog.getListData('admBlog/getListBlogProductRelated')",
            );
            echo buttonInputAndUpdate($arr);
         ?>
    
        </div> <!-- end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->
<script>
$(document).ready(function()
{
   //$(All.get_active_tab() + " #InpBlogfrom").datepicker({ dateFormat: 'dd/mm/yy', changeMonth:true, changeYear: true });
   //$(All.get_active_tab() + " #InpBlogto").datepicker({ dateFormat: 'dd/mm/yy', changeMonth:true, changeYear: true });
});

function convertTanggal(fromField, targetField) {
    var tgl1 = All.convertDateIndo(fromField, "ymd", "-");
    $(targetField).val(tgl1);
    //var x = $(All.get_active_tab() + " #FFfrom").val();
    //alert("isi : " +x);
}
</script>
