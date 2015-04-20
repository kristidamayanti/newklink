<?php
$sess = $this->nativesession->get('sessdata');
?>
<div class="mainForm">
  <form class="form-horizontal" enctype="multipart/form-data" id="formInputNews">
    <fieldset>      
      <div class="control-group">
       
        
         <label class="control-label" for="typeahead">Title</label>
            <div class="controls" >
              <input type="hidden" id="id" name="id" />
              <input placeholder="<?php echo placeholderCheck(); ?>" type="text" class="span7 typeahead" id="title"  name="title" onchange="News.getListNewsByParam('title', this.value)" />
            </div>
           
         <label class="control-label" for="typeahead">Category</label>
            <div class="controls" >
              <select id="cat_id" name="cat_id">
               <?php
                foreach($listNewsCat as $list) {
                    echo "<option value=\"$list->id\">$list->title</option>";
                }
               ?> 
              </select>&nbsp;&nbsp;<input type="button" class="btn btn-mini btn-primary" value="Refresh" onclick="News.refreshListNewsCat(' #cat_id')" />
            </div>
         
         <label class="control-label" for="typeahead">Image</label>
            <div class="controls">
               <?php
                 multiUploadFile(3);
               ?>
            </div>
          <label class="control-label" for="typeahead">File Download</label>
            <div class="controls" >
              <input type="file" id="url_filedownload" name="url_filedownload" class="span7 typeahead" />
              <span id="spanfiledownload" class="fileExistingInfo"></span>
			  <input id="filenameDownload" class="fileHiddenExistingInfo" type="hidden" name="filenameDownload">
			  <!--<input placeholder="required" type="text" class="span7 typeahead" id="url_filedownload"  name="url_filedownload"  />-->
            </div>
          
          <label class="control-label" for="typeahead">File Audio</label>
            <div class="controls" >
              <input type="file" id="url_audio" name="url_audio" class="span7 typeahead" />
              <span id="spanfileaudio" class="fileExistingInfo"></span>
			  <input id="filenameaudio" class="fileHiddenExistingInfo" type="hidden" name="filenameaudio">
			  <!--<input placeholder="required" type="text" class="span7 typeahead" id="url_audio"  name="url_audio" />-->
            </div>
            <label class="control-label" for="typeahead">URL Video</label>
            <div class="controls" >
              <!--<input type="file" id="url_video" name="url_video" class="span7 typeahead" /> -->
              <input placeholder="required" type="text" class="span7 typeahead" id="url_video"  name="url_video" />
            </div>
           <label class="control-label" for="typeahead">News Detail</label>
            <div class="controls">
               <textarea placeholder="required" class="span7 typeahead" id="newsArticleDetail" name="newsArticleDetail"></textarea>
            </div>
           <label class="control-label" for="typeahead">Active</label>
            <div class="controls">
               <select id="act" name="act">
                   <option value="1">Yes</option>
                   <option value="0">No</option>
               </select> 
            </div> 
         <label class="control-label" for="typeahead">&nbsp</label>                             
        <div class="controls"  id="inp_btn">
            <input type="button" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Submit" onclick="News.saveInputNews()" />
            <input type="reset" class="btn btn-reset" value="Reset" />
            <input type="button" class="btn btn-success" value="View List" onclick="News.getListData('admNews/getListNews')" />
         </div>
         <div class="controls" id="upd_btn" style="display: none;">
            <input type="button" class="btn btn-primary" id="updsave" name="save" value="Update " onclick="News.saveUpdateNews()" />
            <input type="button" class="btn btn-danger" value="Cancel Update" id="cancelupd" onclick="News.cancelUpdateNews()" />
            <input type="button" class="btn btn-success" value="View List" onclick="News.getListData('admNews/getListNews')" />
                
         </div> 
    
        </div> <!-- end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->
<script>
$(document).ready(function()
{
   $(All.get_active_tab() + " #newsArticleDetail").cleditor({width: 600, height:350});
   
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
   
   $("#url_filedownload").change(function () {
        var ext = this.value.match(/\.(.+)$/)[1];
        switch (ext) {
            case 'pdf':
            case 'zip':
            case 'jpg':
            case 'jpeg':
            case 'png':
            case 'gif':
                $('#uploadButton').attr('disabled', false);
                break;
            default:
                alert('This is not an allowed file type, only PDF,ZIP or Image file..!!');
                this.value = '';
        }
   });
   
   $("#url_audio").change(function () {
        var ext = this.value.match(/\.(.+)$/)[1];
        switch (ext) {
            case 'mp3':
            case 'wav':
                $('#uploadButton').attr('disabled', false);
                break;
            default:
                alert('This is not an allowed file type, only MP3 | WAV');
                this.value = '';
        }
   });
});
</script>
