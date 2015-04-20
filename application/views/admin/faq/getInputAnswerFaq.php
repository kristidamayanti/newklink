<style>
    .oke {
        width: 400px;
    }
</style>
<div class="mainForm">
  <form class="form-horizontal" enctype="multipart/form-data" id="formInputAnswerFaq">
    <fieldset>      
      <div class="control-group">
       
        
         <label class="control-label" for="typeahead">FAQ</label>
            <div class="controls" >
              <input type="hidden" id="id" name="id" />
              <select id="qid" name="qid" class="oke">
                 <option value="">--Select Here--</option>
                 <?php
                 foreach($listFaq as $list) {
                     echo "<option value=\"$list->id\">$list->question</option>";
                 } 
                 ?> 
              </select>&nbsp;&nbsp;<input type="button" class="btn btn-mini btn-primary" value="Refresh" onclick="Faq.refreshListFaq(' #qid')" />
            </div>
          <label class="control-label" for="typeahead">Answer</label>
            <div class="controls">
               <textarea placeholder="required" class="span7 typeahead" id="answer" name="answer"></textarea>
            </div>  
         
         <label class="control-label" for="typeahead">&nbsp</label>                             
        <div class="controls"  id="inp_btn">
            <input type="button" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Submit" onclick="Faq.saveInputAnswerFaq()" />
            <input type="reset" class="btn btn-reset" value="Reset" />
            <input type="button" class="btn btn-success" value="View List" onclick="All.getListData('admFaq/getListAnswerFaq')" />
         </div>
         <div class="controls" id="upd_btn" style="display: none;">
            <input type="button" class="btn btn-primary" id="updsave" name="save" value="Update " onclick="Faq.saveUpdateAnswerFaq()" />
            <input type="button" class="btn btn-danger" value="Cancel Update" id="cancelupd" onclick="Faq.cancelUpdateAnswerFaq()" />
            <input type="button" class="btn btn-success" value="View List" onclick="All.getListData('admFaq/getListAnswerFaq')" />
                
         </div> 
    
        </div> <!-- end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->
<script>
$(document).ready(function()
{
   $(All.get_active_tab() + " #answer").cleditor({width: 600, height:250});
});
</script>
