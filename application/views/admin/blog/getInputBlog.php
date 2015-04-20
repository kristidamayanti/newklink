<?php
$sess = $this->nativesession->get('sessdata');
?>
<div class="mainForm">
  <form class="form-horizontal" enctype="multipart/form-data" id="formInputBlog">
    <fieldset>      
      <div class="control-group">
       
         <?php
          echo inputTextWithHiddenID("Blog Name", "bl_name", "span7 typeahead", "required");
          echo inputText("Blog Title", "bl_title", "span7 typeahead", "required");
          echo inputText("Blog Quote", "bl_quote", "span7 typeahead", "");
          echo inputText("Facebook", "bl_fb", "span7 typeahead", "");
          echo inputText("Blog Twitter", "bl_twitter", "span7 typeahead", "");
         ?>        
         <label class="control-label" for="typeahead">Blog Type</label>
            <div class="controls" >
              <select id="bl_type" name="bl_type">
               <option value="">--Select Here</option>
               <?php
                foreach($listBlogType as $list) {
                    echo "<option value=\"$list->bl_type\">$list->bl_name</option>";
                }
               ?> 
              </select>&nbsp;&nbsp;<input type="button" class="btn btn-mini btn-primary" value="Refresh" onclick="Blog.refreshListBlogType(' #bl_type')" />
            </div>
         <?php
            echo setMultipleUploadFile("Image", 3);
            echo textareaContent("Content", "bl_content");
            echo selectFlagActive();
            
            $arr = array(
             "inputAction"  => "Blog.saveInputBlog()",
             "updateAction" => "Blog.saveUpdateBlog()",
             "cancelUpdate" => "Blog.cancelUpdateBlog()",
             "listAction"   => "Blog.getListData('admBlog/getListBlog')",
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
   $("#bl_content").cleditor({width: 600, height:350});
   
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
                alert('This is not an allowed file type, only JPG|JPEG|PNG|GIF');
                this.value = '';
        }
   });
   
   
});
</script>
