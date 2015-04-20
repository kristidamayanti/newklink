<?php
$sess = $this->nativesession->get('sessdata');
?>
<div class="mainForm">
  <form class="form-horizontal" enctype="multipart/form-data" id="formInputSyariah">
    <fieldset>      
      <div class="control-group">
       
        
         <label class="control-label" for="typeahead">Title</label>
            <div class="controls" >
              <input type="hidden" id="id" name="id" />
			  <input placeholder="<?php echo placeholderCheck(); ?>" tabindex="1" type="text" class="span7 typeahead" id="title"  name="title" onchange="Syariah.getListSyariahByParam('title', this.value)" />
            </div>
         <label class="control-label" for="typeahead">Description</label>
            <div class="controls">
               <textarea placeholder="required" tabindex="2" class="span7 typeahead" id="detailSyariah" name="detail"></textarea>
            </div>
         <label class="control-label" for="typeahead">&nbsp</label>                             
        <div class="controls"  id="inp_btn">
            <input tabindex="3" type="button" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Submit" onclick="Syariah.saveInputSyariah()" />
            <input tabindex="4"  type="reset" class="btn btn-reset" value="Reset" />
            <input tabindex="5"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('admSyariah/getListSyariah')" />
         </div>
         <div class="controls" id="upd_btn" style="display: none;">
            <input type="button" class="btn btn-primary" id="updsave" name="save" value="Update " onclick="Syariah.saveUpdateSyariah()" />
            <input type="button" class="btn btn-danger" value="Cancel Update" id="cancelupd" onclick="Syariah.cancelUpdateSyariah()" />
            <input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('Syariah/getListSyariah')" />
                
         </div> 
    
        </div> <!-- end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->
<script>
$(document).ready(function()
{
   $("#detailSyariah").cleditor({width: 600, height:260});
});
</script>
