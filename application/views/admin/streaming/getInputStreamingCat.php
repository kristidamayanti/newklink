<?php
$sess = $this->nativesession->get('sessdata');
?>
<div class="mainForm">
  <form class="form-horizontal" id="formInputStreamingCat">
    <fieldset>      
      <div class="control-group">
        
       
        <label class="control-label" for="typeahead">Streaming Category Title</label>
            <div class="controls">
               <input type="hidden" name="id" id="id" />
               <input tabindex="1" placeholder="<?php echo placeholderCheck(); ?>" type="text" class="span7 typeahead" id="title"  name="title" onchange="Streaming.getListStreamingCatByParam('title',this.value)" /> 
            </div>
        <label class="control-label" for="typeahead">Active</label>
            <div class="controls">
               <select tabindex="2" id="act" name="act">
                   <option value="1">Yes</option>
                   <option value="0">No</option>
               </select> 
            </div> 
         <label class="control-label" for="typeahead">&nbsp</label>                             
        <div class="controls"  id="inp_btn">
            <input tabindex="3" type="button" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Submit" onclick="Streaming.saveInputStreamingCat()" />
            <input tabindex="4"  type="reset" class="btn btn-reset" value="Reset" />
            <input tabindex="5"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('admStreaming/getListStreamingCat')" />
         </div>
         <div class="controls" id="upd_btn" style="display: none;">
            <input type="button" class="btn btn-primary" id="updsave" name="save" value="Update " onclick="Streaming.saveUpdateStreamingCat()" />
            <input type="button" class="btn btn-danger" value="Cancel Update" id="cancelupd" onclick="Streaming.cancelUpdateStreamingCat()" />
            <input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('admStreaming/getListStreamingCat')" />
                
         </div> 
    
        </div> <!-- end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->
