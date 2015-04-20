<?php
$sess = $this->nativesession->get('sessdata');
?>
<div class="mainForm">
  <form class="form-horizontal" enctype="multipart/form-data" id="formInputFaq">
    <fieldset>      
      <div class="control-group">
       
         <label class="control-label" for="typeahead">FAQ Category</label>
            <div class="controls" >
              <input type="hidden" id="id" name="id" />
              <select id="category_id" name="category_id">
                  <option value="">--Select Here--</option>
                  <?php
                  foreach($listCat as $list) {
                      echo "<option value=\"$list->id\">$list->category_name</option>";
                  }
                  ?>
              </select>
              &nbsp;&nbsp;<input type="button" class="btn btn-mini btn-primary" value="Refresh" onclick="Faq.refreshListFaqCat(' #category_id')" />
            </div>
         <label class="control-label" for="typeahead">FAQ</label>
            <div class="controls" >
              <textarea placeholder="<?php echo placeholderCheck(); ?>" type="text" class="span8 typeahead" id="question"  name="question" onchange="Faq.getListFaqByParam('question', this.value)"></textarea>
            </div>
         
         <label class="control-label" for="typeahead">&nbsp</label>                             
        <div class="controls"  id="inp_btn">
            <input type="button" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Submit" onclick="Faq.saveInputFaq()" />
            <input type="reset" class="btn btn-reset" value="Reset" />
            <input type="button" class="btn btn-success" value="View List" onclick="All.getListData('admFaq/getListFaq')" />
         </div>
         <div class="controls" id="upd_btn" style="display: none;">
            <input type="button" class="btn btn-primary" id="updsave" name="save" value="Update " onclick="Faq.saveUpdateFaq()" />
            <input type="button" class="btn btn-danger" value="Cancel Update" id="cancelupd" onclick="Faq.cancelUpdateFaq()" />
            <input type="button" class="btn btn-success" value="View List" onclick="All.getListData('admFaq/getListFaq')" />
                
         </div> 
    
        </div> <!-- end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->
