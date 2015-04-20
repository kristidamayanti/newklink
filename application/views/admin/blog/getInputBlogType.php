<?php
$sess = $this->nativesession->get('sessdata');
$req = "required (press tab after typing to check data)";
?>
<div class="mainForm">
  <form class="form-horizontal" id="formInputBlogType">
    <fieldset>      
      <div class="control-group">
        
       <?php
         $onchange = "onchange=Blog.getListBlogTypeByParam('bl_type',this.value)";
         echo inputTextWithHiddenID("Blog Type ID", "bl_type", "span7 typeahead", placeholderCheck(), $onchange);
         $onchange = "onchange=Blog.getListBlogTypeByParam('bl_name',this.value)";
         echo inputText("Blog Type Title", "bl_name", "span7 typeahead", placeholderCheck(), $onchange);
         $arr = array(
             "inputAction"  => "Blog.saveInputBlogType()",
             "updateAction" => "Blog.saveUpdateBlogType()",
             "cancelUpdate" => "Blog.cancelUpdateBlogType()",
             "listAction"   => "All.getListData('admBlog/getListBlogType')",
            );
         echo buttonInputAndUpdate($arr);
         ?> 
       
        </div> <!-- end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->
