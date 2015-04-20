<?php
$sess = $this->nativesession->get('sessdata');
?>
<div class="mainForm">
  <form class="form-horizontal" id="formSaveUser">
	<fieldset>      
      <div class="control-group">
        <label class="control-label" for="typeahead">Username</label>
             <div class="controls">
			    <input type="hidden" class="span3 typeahead" id="uid"  name="uid" />
	            <input tabindex="1" type="text" class="span3 typeahead" id="username"  name="username" />
             </div>
        <label class="control-label" for="typeahead">Password</label>
	        <div class="controls">
	           <input tabindex="2" type="password" class="span3 typeahead" id="password"  name="password" /> 
	        </div>
		 <label class="control-label" for="typeahead">Fullname</label>
	        <div class="controls">
	           <input tabindex="3" type="text" class="span6 typeahead" id="fullname"  name="fullname" /> 
	        </div>
		 <label class="control-label" for="typeahead">User Type</label>
	        <div class="controls">
	           <select tabindex="4" id="usertype" name="usertype">
			   	  <?php
			   	   echo "<option value=\"\">--SELECT HERE--</option>";
			   	   foreach($userGroup as $user) {
			   	       echo "<option value=\"$user->id\">$user->nm_group</option>";
			   	   }
			   	  ?>
			   </select>
	        </div>
         <label class="control-label" for="typeahead">&nbsp</label>                             
         <div class="controls"  id="inp_btn">
		    <input tabindex="5" type="button" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Submit" onclick="User.saveInputUser()" />
		    <input tabindex="6"  type="reset" class="btn btn-reset" value="Reset" />
			<input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="User.getListUser()" />
	     </div>
	     <div class="controls" id="upd_btn" style="display: none;">
            <input type="button" class="btn btn-primary" id="updsave" name="save" value="Update " onclick="User.saveUpdateUser()" />
		    <input type="button" class="btn btn-danger" value="Cancel Update" id="cancelupd" onclick="User.cancelUpdateUser()" />
            <input tabindex="7"  type="button" class="btn btn-success" value="View List" onclick="User.getListUser()" />
	            
	     </div> 
        </div> <!-- end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->