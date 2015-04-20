<?php
$sess = $this->nativesession->get('sessdata');
?>
<div class="mainForm">
  <form class="form-horizontal" enctype="multipart/form-data" id="formUpdateTestimoni">
    <fieldset>      
      <div class="control-group">
         <label class="control-label" for="typeahead">Name</label>
            <div class="controls" >
              <input type="hidden" id="id" name="id" value="<?php echo $detailTestimoni[0]->id; ?>" />
              <input placeholder="required" tabindex="1" type="text" class="span7 typeahead" id="name"  name="name" value="<?php echo $detailTestimoni[0]->name; ?>" />
            </div>
         <label class="control-label" for="typeahead">Location</label>
            <div class="controls" >
              <input placeholder="required" tabindex="1" type="text" class="span7 typeahead" id="location"  name="location" value="<?php echo $detailTestimoni[0]->location; ?>" />
            </div>
         <label class="control-label" for="typeahead">Testimonial</label>
            <div class="controls">
               <textarea placeholder="required" tabindex="2" class="span7 typeahead" id="testimonial" name="testimonial"><?php echo $detailTestimoni[0]->testimonial; ?></textarea>
            </div>
         <label class="control-label" for="typeahead">Active</label>
            <div class="controls">
               <select tabindex="2" id="act" name="act">
                   <?php
                   if($detailTestimoni[0]->act == "1") {
                       echo "<option value=\"1\" selected>YES</option>";
                       echo "<option value=\"0\">NO</option>";
                   } else {
                       echo "<option value=\"1\">YES</option>";
                       echo "<option value=\"0\" selected>NO</option>";
                   }
                   ?>
               </select> 
            </div> 
         <label class="control-label" for="typeahead">&nbsp</label>                             
        <div class="controls"  id="inp_btn">
            <input type="button" id="btn_back" class="btn btn-warning .submit" name="back" value="Back" onclick="Testimoni.backToListTestimoni()" />
            <input type="button" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Submit" onclick="Testimoni.saveUpdateTestimoni()" />
            
         </div>
         
    
        </div> <!-- end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->
<script>
$(document).ready(function()
{
   $("#testimonial").cleditor({width: 670, height:240});
});
</script>
