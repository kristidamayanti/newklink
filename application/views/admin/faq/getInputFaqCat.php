<?php
$sess = $this->nativesession->get('sessdata');
?>
<div class="mainForm">
  <form class="form-horizontal" id="formInputFaqCat">
    <fieldset>      
      <div class="control-group">
        
       
        <label class="control-label" for="typeahead">Category FAQ</label>
            <div class="controls">
               <input type="hidden" name="id" id="id" />
               <input tabindex="1" placeholder="<?php echo placeholderCheck(); ?>" type="text" class="span7 typeahead" id="category_name"  name="category_name" onchange="Faq.getFaqCatByParam('category_name',this.value)" /> 
            </div>
        
         <label class="control-label" for="typeahead">&nbsp</label>                             
        <div class="controls"  id="inp_btn">
            <input tabindex="3" type="button" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Submit" onclick="Faq.saveInputFaqCat()" />
            <input tabindex="4"  type="reset" class="btn btn-reset" value="Reset" />
            <input tabindex="5"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('admFaq/getListFaqCat')" />
         </div>
         <div class="controls" id="upd_btn" style="display: none;">
            <input type="button" class="btn btn-primary" id="updsave" name="save" value="Update " onclick="Faq.saveUpdateFaqCat()" />
            <input type="button" class="btn btn-danger" value="Cancel Update" id="cancelupd" onclick="Faq.cancelUpdateFaqCat()" />
            <input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="All.getListData('admFaq/getListFaqCat')" />
                
         </div> 
    
        </div> <!-- end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->
