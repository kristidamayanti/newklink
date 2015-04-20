<style>
    .prd {
        width: 400px;
    }
    
    .tot_price, .kanan1, .kanan2 {
        text-align: right;
    }
</style>
<?php
$sess = $this->nativesession->get('sessdata');
?>
<div class="mainForm">
  <form class="form-horizontal" enctype="multipart/form-data" id="formInputPrdBundling">
    <fieldset>      
      <div class="control-group">
        <!--<label class="control-label" for="typeahead">Kode Kaset</label>
            <div class="controls" tabindex="1">
              <input tabindex="1"  placeholder="<?php echo placeholderCheck(); ?>" type="text" class="span7 typeahead" id="kd_kaset"  name="kd_kaset" onchange="Langganan.getListLanggananByParam('kd_kaset', this.value)" />
            </div> -->
         <input type="hidden" id="prdcd_cat"  name="prdcd_cat" />
         <label class="control-label" for="typeahead">Product Name</label>
            <div class="controls" >
              <input tabindex="2" type="text" class="span7 typeahead" id="name"  name="name" />
            </div>
         <label class="control-label" for="typeahead">Description</label>
            <div class="controls" >
              <input tabindex="2" type="text" class="span7 typeahead" id="prdbundling_desc"  name="prdbundling_desc" />
            </div>
          
         <label class="control-label" for="typeahead">Active</label>
            <div class="controls">
              <select id="act" name="act">
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>    
            </div>
         <label class="control-label" for="typeahead">Detail Product</label>
           <div class="controls">  
             <table width="100%" class="table table-striped table-bordered">
                 <thead>
                     <tr bgcolor="#f4f4f4">
                         <th colspan="4" >List Product</th>
                     </tr>
                     <tr>
                         <th width="5%">No</th>
                         <th>Product</th>
                         <th width="12%">West Price</th>
                         <th width="12%">East Price</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php
                     for($i=1; $i<=5; $i++) {
                         echo "<tr>";
                         echo "<td><div align=right>$i</div></td>";
                         echo "<td>";
                           
                           echo "<select id=\"prddet$i\" name=\"prddet[]\" class=\"prd\" onchange=\"setPrice($i)\">";
                           echo "<option value=\"\">--Select Here--</option>";
                             foreach($arrayData as $list) {
                                echo "<option value=\"$list->kd_kaset,$list->westprice,$list->eastprice,$list->title\">$list->kd_kaset - $list->title</option>" ; 
                             }    
                           echo "</select>";
                           
                         echo "<input type=\"hidden\" id=\"prdcdDet$i\" name=\"prdcdDet[]\" /><input type=\"hidden\" id=\"prdcdNmDet$i\" name=\"prdcdNmDet[]\" /></td>";
                         echo "<td><div align=right><input readonly=\"readonly\" class=\"kanan1\" type=\"text\" id=\"westprice$i\" name=\"westprice[]\" value=\"0\" /></div></td>";
                         echo "<td><div align=right><input readonly=\"readonly\" class=\"kanan2\" type=\"text\" id=\"eastprice$i\" name=\"eastprice[]\" value=\"0\" /></div></td>";
                         echo "</tr>";
                     }
                     ?>
                     <tr bgcolor="#f4f4f4">
                         <td colspan="2"><div align="right">TOTAL&nbsp;&nbsp;&nbsp;</div></td>
                         <td><input readonly="readonly" class="tot_price" type="text" id="tot_westprice" name="tot_westprice" value="0" /></td>
                         <td><input readonly="readonly" class="tot_price" type="text" id="tot_eastprice" name ="tot_eastprice" value="0" /></td>
                     </tr>
                 </tbody>
             </table>
           </div>  
         </div>   
         <label class="control-label" for="typeahead">&nbsp</label>                             
        <div class="controls"  id="inp_btn">
            <input tabindex="5" type="button" id="btn_input_user" class="btn btn-primary .submit" name="save" value="Submit"/>
            <input tabindex="6"  type="reset" class="btn btn-reset" value="Reset" />
            <input type="button" class="btn btn-success btn_view_prdBundling" value="View List" onclick="Langganan.getListPrdBundling()" />
         </div>
         <div class="controls" id="upd_btn" style="display: none;">
            <input type="button" class="btn btn-primary" id="updsave" name="save" value="Update " onclick="Langganan.saveUpdatePrdBundling()" />
            <input type="button" class="btn btn-danger" value="Cancel Update" id="cancelupd" onclick="Langganan.cancelUpdatePrdBundling()" />
            <input type="button" class="btn btn-success btn_view_prdBundling" value="View List" onclick="Langganan.getListPrdBundling()" />
                
         </div>     
        <!--</div>  end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->
<script>
$(document).ready(function()
{
   
   
   $(All.get_active_tab() + " #btn_input_user" ).on("click", function() {
        All.set_disable_button();
        All.get_wait_message();
        $.post(All.get_url("admLangganan/saveProductBundling/") , $(All.get_active_tab() + " #formInputPrdBundling").serialize(), function(data)
        {  
            All.clear_div_in_boxcontent(".mainForm > .result");
            All.set_enable_button();
            if(data.response == "false") {
                All.set_error_message(".mainForm > .result", data.message);
            } 
            else {
                All.set_success_message(".mainForm > .result", data.message);
                All.reset_all_input();
            } 
            
        }, "json").fail(function() { 
            alert("Error requesting page"); 
            All.set_enable_button();
        });  
   });    
});



function setPrice(param) {
    var x = $(All.get_active_tab() + " #prddet" +param).val();
    var nilaiX = x.split(",");
    var kdprd = nilaiX[0];
    var westprice = nilaiX[1];
    var eastprice = nilaiX[2];
    var prdNmDet = nilaiX[3];
    //alert("west :" +westprice+ " east :" +eastprice);
    $(All.get_active_tab() + " #prdcdDet" +param).val(kdprd);
    $(All.get_active_tab() + " #prdcdNmDet" +param).val(prdNmDet);
    $(All.get_active_tab() + " #westprice" +param).val(0);
    $(All.get_active_tab() + " #eastprice" +param).val(0);
    $(All.get_active_tab() + " #westprice" +param).val(westprice);
    $(All.get_active_tab() + " #eastprice" +param).val(eastprice);
    
    hitungPrice();
}

function hitungPrice() {
    var total = 0;   
    var total2 = 0;   
    $(All.get_active_tab() + " .kanan1").each( function(){
        total += $(this).val() * 1;
    });
    
    $(All.get_active_tab() + " .kanan2").each( function(){
        total2 += $(this).val() * 1;
    });
    
    $(All.get_active_tab() + " #tot_westprice").val(total);
    $(All.get_active_tab() + " #tot_eastprice").val(total2);
}
</script>
