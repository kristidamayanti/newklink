<?php
$sess = $this->nativesession->get('sessdata');
?>
<div class="mainForm">
  <form class="form-horizontal" id="formMenuConfig">
    <fieldset>      
     <div class="clearfix">
          <label class="control-label" for="typeahead">User Group</label>
          <div class="controls"> 
            <select id="usertype" name="usertype">
             <option value="">--SELECT HERE--</option>
             <?php
               foreach($listUserGroup as $list) {
                   echo "<option value=\"$list->id\">$list->nm_group</option>";
               }
             ?>
            </select>
            &nbsp;<input type="button" class="btn btn-primary" id="show" name="show" value="Show List Menu" onclick="User.showListMenuByGroupID()" />
          </div>
        </div>
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->