<?php
$sess = $this->nativesession->get('sessdata');
?>
<div class="mainForm">
  <form class="form-horizontal" id="formInputDownload">
    <fieldset>      
      <div class="control-group">
       
        <label class="control-label" for="typeahead">Download Title</label>
            <div class="controls">
               <input type="hidden" id="id" name="id" value="" />
               <input placeholder="<?php echo placeholderCheck(); ?>" tabindex="1" type="text" class="span7 typeahead" id="title"  name="title" onchange="Download.getListDownloadByParam('title', this.value)" /> 
            </div>
         <label class="control-label" for="typeahead">Category</label>
            <div class="controls" tabindex="2">
               <select id="did" name="did">
                  <?php
                   foreach($listDownloadCat as $list) {
                       echo "<option value=\"$list->did\">$list->title</option>";
                   }
                  ?> 
               </select> 
            </div>
         <label class="control-label" for="typeahead">Description</label>
            <div class="controls">
               <textarea placeholder="required" tabindex="3" class="span7 typeahead" id="download_desc" name="download_desc"></textarea>
            </div>
         <label class="control-label" for="typeahead">File</label>
            <div class="controls">
               <input type="hidden" id="pid" name="pid" class="span7 typeahead" /> 
               <input type="file" id="fileDownload" name="myfile" class="span7 typeahead" />
               <span id="spanfileDownload" class="fileExistingInfo"></span>
               <input id="filenameDownload" class="fileHiddenExistingInfo" type="hidden" name="filenameDownload">
            </div>
         <label class="control-label" for="typeahead">Download</label>
            <div class="controls">
               <input type="text" tabindex="5" class="span5 typeahead" id="download" name="download" maxlength="5" />
            </div>
         <label class="control-label" for="typeahead">Hits</label>
            <div class="controls">
               <input type="text" tabindex="6" class="span5 typeahead" id="hits" name="hits" maxlength="25" />
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
            <input tabindex="5" type="button" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Submit" onclick="Download.saveInputDownload()" />
            <input tabindex="6"  type="reset" class="btn btn-reset" value="Reset" />
            <input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('admDownload/getListDownload')" />
         </div>
         <div class="controls" id="upd_btn" style="display: none;">
            <input type="button" class="btn btn-primary" id="updsave" name="save" value="Update " onclick="Download.saveUpdateDownload()" />
            <input type="button" class="btn btn-danger" value="Cancel Update" id="cancelupd" onclick="Download.cancelUpdateDownload()" />
            <input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('admDownload/getListDownload')" />
                
         </div> 
    
        </div> <!-- end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->
