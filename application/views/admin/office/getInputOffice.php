<style>
    .medium_select {
        width : 150px;
    }
</style>
<div class="mainForm">
  <form class="form-horizontal" enctype="multipart/form-data" id="formInputOffice">
   
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
         <tr>
           <td width="15%" align="right">Office Code&nbsp;&nbsp;</td>
           <td width="35%">
               <input type="hidden" id="id" name="id" />
               <!--onchange="Office.getListOfficeByParam('scode', this.value)"-->
               <input tabindex="1" placeholder="required" type="text" class="span15 typeahead" id="scode"  name="scode"  />
           </td>
           <td width="13%" align="right">&nbsp;</td>
           <td>&nbsp;</td>   
         </tr>
         <tr>
           <td width="15%" align="right">Office Name&nbsp;&nbsp;</td>
           <td width="35%">
               <input type="hidden" id="id" name="id" />
               <!--onchange="Office.getListOfficeByParam('scode', this.value)"-->
               <input tabindex="1" placeholder="required" type="text" class="span15 typeahead" id="sname"  name="sname"  />
           </td>
           <td width="13%" align="right">Fax&nbsp;&nbsp;</td>
           <td><input tabindex="9" type="text" class="span15 typeahead" id="fax"  name="fax" /> </td>   
         </tr>
         <tr>
            <td width="15%" align="right">Area&nbsp;&nbsp;</td>
           <td>
               <select id="areaid" name="areaid" tabindex="2" class="medium_select">
                   <?php
                   foreach($listArea as $list) {
                       echo "<option value=\"$list->id\">$list->areaname</option>";
                   }
                   ?>
               </select>&nbsp;&nbsp;<input type="button" class="btn btn-mini btn-primary" value="Refresh" onclick="Office.refreshListOfficeArea(' #areaid')" />
           </td>
           <td align="right">Email&nbsp;&nbsp;</td>
           <td><input tabindex="10" type="text" class="span15 typeahead" id="email"  name="email" /> </td>   
         </tr>
         <tr>
           <td align="right">Type&nbsp;&nbsp;</td>
           <td><input tabindex="3" placeholder="required" type="text" class="span15 typeahead" id="type"  name="type" /></td>
           <td align="right">Website&nbsp;&nbsp;</td>
           <td><input tabindex="11" type="text" class="span15 typeahead" id="web"  name="web" /> </td>   
         </tr>
         <tr>
           <td align="right">Country&nbsp;&nbsp;</td>
           <td><input tabindex="4" value="INDONESIA" placeholder="required"  type="text" class="span15 typeahead" id="country"  name="country" /></td>
           <td align="right">Mobile&nbsp;&nbsp;</td>
           <td><input tabindex="12" type="text" class="span15 typeahead" id="mobile"  name="mobile" /> </td>   
         </tr>
         <tr>
           <td align="right">City&nbsp;&nbsp;</td>
           <td><input tabindex="5" value="JAKARTA" placeholder="required" type="text" class="span15 typeahead" id="city"  name="city" /> </td>
           <td align="right">Online&nbsp;&nbsp;</td>
           <td><select tabindex="13" id="online" name="online">
                  <option value="1">YES</option>
                   <option value="0">NO</option> 
               </select> </td>     
         </tr>
         <tr>
           <td align="right" valign="top">Address&nbsp;&nbsp;</td>
           <td><textarea tabindex="6" placeholder="required" class="span15 typeahead" id="address" name="address"></textarea></td>
           <td align="right" valign="top">Note&nbsp;&nbsp;</td>
           <td valign="top"><textarea  tabindex="14" class="span15 typeahead" id="note" name="note"></textarea></td>   
         </tr>
         <tr>
           <td align="right">ZIP Code&nbsp;&nbsp;</td>
           <td><input tabindex="7" type="text" class="span15 typeahead" id="zipcode"  name="zipcode" /></td>
           <td align="right">Active&nbsp;&nbsp;</td>
           <td><select id="act" name="act" tabindex="15">
                   <option value="1">Yes</option>
                   <option value="0">No</option>
               </select></td>  
         </tr>
         <tr>
           <td align="right">Phone&nbsp;&nbsp;</td>
           <td><input tabindex="8" placeholder="required" type="text" class="span15 typeahead" id="phone"  name="phone" /></td>
           <td align="right" valign="top">Office Image&nbsp;&nbsp;</td>
           <td valign="top">
               <input tabindex="16" type="file" name="myfile" class="cfile span7 typeahead" />
               
           </td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td align="left">
             <div  id="inp_btn">
                <input tabindex="17" type="button" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Submit" onclick="Office.saveInputOffice()" />
                <input tabindex="18" type="reset" class="btn btn-reset" value="Reset" />
                <input tabindex="19" type="button" class="btn btn-success" value="View List" onclick="All.getListData('admOffice/getListOffice')" />
             </div>
             <div id="upd_btn" style="display: none;">
                <input tabindex="17" type="button" class="btn btn-primary" id="updsave" name="save" value="Update " onclick="Office.saveUpdateOffice()" />
                <input tabindex="18" type="button" class="btn btn-danger" value="Cancel Update" id="cancelupd" onclick="Office.cancelUpdateOffice()" />
                <input tabindex="19" type="button" class="btn btn-success" value="View List" onclick="All.getListData('admOffice/getListOffice')" />
             </div> 
           </td>
           <td align="right"><span class="spnimg" style="display: none">File Image :&nbsp;</span></td>
           <td>
               <!--<span class="fileExistingInfo"></span>
               <input type="hidden" id="filename" name="filename" name="filename"/>-->
               <span id="spanfileOffice" class="fileExistingInfo"></span>
               <input id="filenameOffice" class="fileHiddenExistingInfo" type="hidden" name="filenameOffice">  
           </td>
             
         </tr>
     </table>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->

<script>
$(document).ready(function()
{
   $(".cfile").change(function () {
        var ext = this.value.match(/\.(.+)$/)[1];
        switch (ext) {
            case 'jpg':
            case 'jpeg':
            case 'png':
            case 'gif':
                $('#uploadButton').attr('disabled', false);
                break;
            default:
                alert('This is not an allowed file type.');
                this.value = '';
        }
   });
});
</script>


