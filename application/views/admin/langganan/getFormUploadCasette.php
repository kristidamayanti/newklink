<?php
$sess = $this->nativesession->get('sessdata');
?>
<style>
    .period {
        width: 80px;
    }
</style>
<div class="mainForm">
  <form class="form-horizontal" enctype="multipart/form-data" id="formUploadsKaset">
    <fieldset>      
      <div class="control-group">
        <!--<label class="control-label" for="typeahead">Kode Kaset</label>
            <div class="controls" tabindex="1">
              <input tabindex="1"  placeholder="<?php echo placeholderCheck(); ?>" type="text" class="span7 typeahead" id="kd_kaset"  name="kd_kaset" onchange="Langganan.getListLanggananByParam('kd_kaset', this.value)" />
            </div> -->
         <input type="hidden" id="kd_kaset"  name="kd_kaset" />
         <label class="control-label" for="typeahead">Kode Audio</label>
            <div class="controls" >
              <input type="text" class="span7 typeahead" id="kd_kaset2"  name="kd_kaset2" />
            </div>
         <label class="control-label" for="typeahead">Title</label>
            <div class="controls" >
              <input type="text" class="span7 typeahead" id="title"  name="title" />
            </div>
         
         
          <label class="control-label" for="typeahead">Kaset Detail</label>
            <div class="controls">
                <!--<input tabindex="2" type="text" class="span7 typeahead" id="kasetDetail"  name="kasetDetail" />-->
               <textarea class="span7 typeahead" id="kasetDetail" name="kasetDetail"></textarea> 
            </div>
            
           <label class="control-label" for="typeahead">Harga Barat</label>
            <div class="controls">
                <input type="text" class="span7 typeahead" id="hrgawest"  name="hrgawest" />
               <!--<textarea placeholder="required" class="span7 typeahead" id="kasetDetail" name="kasetDetail"></textarea> -->
            </div>
          
          <label class="control-label" for="typeahead">Harga Timur</label>
            <div class="controls">
                <input type="text" class="span7 typeahead" id="hrgaeest"  name="hrgaeest" />
               <!--<textarea placeholder="required" class="span7 typeahead" id="kasetDetail" name="kasetDetail"></textarea> -->
            </div>
          
         <label class="control-label" for="typeahead">Cover Kaset *format jpg</label>
            <div class="controls" >
              <input type="file" id="fileCover" name="fileCover" class="span7 typeahead" />
              <span id="spanfileCover" class="fileExistingInfo"></span>
			  <input id="filenameCover" class="fileHiddenExistingInfo" type="hidden" name="filenameCover"/>
			  <!--<input placeholder="required" type="text" class="span7 typeahead" id="url_filedownload"  name="url_filedownload"  />-->
            </div>
          
          <label class="control-label" for="typeahead">Kaset *format mp3</label>
            <div class="controls" >
              <input type="file" id="fileKaset" name="fileKaset" class="span7 typeahead" />
              <span id="spanfileKaset" class="fileExistingInfo"></span>
			  <input id="filenameKaset" class="fileHiddenExistingInfo" type="hidden" name="filenameKaset"/>
            </div>
          <label class="control-label" for="typeahead">Status Berlangganan</label>
            <div class="controls" >
              <select id="status" name="status">
                  <option value="1">Yes</option>
                  <option value="2">No</option>
                  <option value="3">All</option>
              </select>
            </div>
          <span id="span_period" style="display:block;">     
          <label class="control-label" for="typeahead">Period</label>
            <div class="controls" >
              <select id="thnPeriod" name="thn" class="period">
                 <option value="">Year</option>
                 <?php
                   $thn = date("Y");
                   $prev = $thn-1;
                   $next = $thn+2;
                   for($i = $prev; $i <= $next; $i++) {
                       echo "<option value=\"$i\">$i</option>";
                   }
                 ?>  
               </select>
               <select id="blnPeriod" name="bln" class="period">
                 <option value="">Month</option>
                  <option value="01">01</option>
                  <option value="02">02</option>
                  <option value="03">03</option>
                  <option value="04">04</option>
                  <option value="05">05</option>
                  <option value="06">06</option>
                  <option value="07">07</option>
                  <option value="08">08</option>
                  <option value="09">09</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
               </select>    
            </div>  
         </span>
         <label class="control-label" for="typeahead">Active</label>
            <div class="controls">
              <select id="act" name="act">
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>    
            </div>
         <label class="control-label" for="typeahead">&nbsp</label>                             
        <div class="controls"  id="inp_btn">
            <input type="button" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Submit" onclick="Langganan.saveUploadKaset()" />
            <input type="reset" class="btn btn-reset" value="Reset" />
            <input type="button" class="btn btn-success" value="View List" onclick="Langganan.getListData('admLangganan/getListLangganan')" />
         </div>
         <div class="controls" id="upd_btn" style="display: none;">
            <input type="button" class="btn btn-primary" id="updsave" name="save" value="Update " onclick="Langganan.saveUpdateLangganan()" />
            <input type="button" class="btn btn-danger" value="Cancel Update" id="cancelupd" onclick="Langganan.cancelUpdateLangganan()" />
            <input type="button" class="btn btn-success" value="View List" onclick="Langganan.getListData('admLangganan/getListLangganan')" />
                
         </div>     
        </div> <!-- end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->
<script>
$(document).ready(function()
{
   //$(All.get_active_tab() + " #kasetDetail").cleditor({width: 450, height:250});
   
   $("#fileCover").change(function () {
        var ext = this.value.match(/\.(.+)$/)[1];
        switch (ext) {
            case 'jpg':
            case 'jpeg':
            case 'png':
            case 'gif':
                $('#uploadButton').attr('disabled', false);
                break;
            default:
                alert('This is not an allowed file type, only Image file..!!');
                this.value = '';
        }
   });
   
   $("#fileKaset").change(function () {
        var ext = this.value.match(/\.(.+)$/)[1];
        switch (ext) {
            case 'mp3':
            case 'mpeg3':
            case 'mpeg':
            case 'wav':
                $('#uploadButton').attr('disabled', false);
                break;
            default:
                alert('This is not an allowed file type, only MP3 file..!!');
                this.value = '';
        }
   });
   
   $(All.get_active_tab() + " #status").change(function () {
       var status = $(All.get_active_tab() + " #status").val();
       if(status == "2") {
           $(All.get_active_tab() + " #span_period").css('display', 'none');
       } else {
           $(All.get_active_tab() + " #span_period").css('display', 'block');
       }
   });    
   
});
</script>
