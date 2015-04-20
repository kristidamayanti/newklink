<?php
$sess = $this->nativesession->get('sessdata');
?>
<div class="mainForm">
  <form class="form-horizontal" id="formChangePassword">
	<fieldset>      
      <div class="control-group">
        <label class="control-label" for="typeahead">Username</label>
             <div class="controls">
	            <input type="text" class="span3 typeahead" id="username" readonly="readonly"  name="username" value="<?php echo $sess[0]->username;?>"/>
             </div>
        <label class="control-label" for="typeahead">Old Password</label>
	        <div class="controls">
	           <input tabindex="1" type="password" class="span3 typeahead" id="oldPassword"  name="oldPassword"/> 
	        </div>
        <label class="control-label" for="typeahead">New Password</label>
	        <div class="controls">
	           <input tabindex="2" type="password" class="span3 typeahead" id="newPassword"  name="newPassword"/> 
	        </div>
		 <label class="control-label" for="typeahead">Confirm New Password</label>
	        <div class="controls">
	           <input tabindex="3" type="password" class="span3 typeahead" id="confirmNewPassword"  name="confirmNewPassword"/> 
	        </div>
         <label class="control-label" for="typeahead">&nbsp</label>                             
        
              <div class="controls">
		    <input tabindex="4" type="button" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Submit" onclick="User.saveChangePassword()" />
		    <input tabindex="5"  type="reset" class="btn btn-reset" value="Reset" />
            <input type="hidden" id="action" name="action" value="<?php echo $form_action; ?>" />
         </div>
    
        </div> <!-- end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->