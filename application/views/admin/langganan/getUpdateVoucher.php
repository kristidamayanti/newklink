<?php
  if($res == null) {
        echo "<form id=\"viewDetailVoucher\">";
        echo "<table width=\"70%\" id=\"updVoucher\" class=\"table table-striped table-bordered\">";
        echo "<tr><td colspan=2>No result found</td></tr>";
        echo "<tr><td ><input type=\"button\" class=\"btn btn-mini btn-warning\" value=\"<< Back\" onclick=\"All.back_to_form('.nextForm1','.mainForm')\" /></td><td>&nbsp;</td></tr>";
        echo "</table></form>";
  } else {
        foreach($res as $resultx) {    
            echo "<form id=\"formUpdVoucher\">";
            echo "<table width=\"70%\" id=\"updVoucher\" class=\"table table-striped table-bordered\">";
            echo "<tr><th colspan=2>Update Voucher</th></tr>";
            echo "<tr><td width=25%><input type=hidden id=vchno  name=vchno  value=\"$resultx->vcno\" />Voucher No</td><td>&nbsp;$resultx->vcno</td></tr>";
            echo "<tr><td >Voucher Key</td><td>&nbsp;$resultx->vckey</td></tr>";
            echo "<tr><td >Member ID</td><td>&nbsp;$resultx->memberid</td></tr>";
            echo "<tr><td >Create Date</td><td>&nbsp;$resultx->createdt</td></tr>";
            echo "<tr><td >Start Date</td><td>&nbsp;$resultx->startdt</td></tr>";
            echo "<tr><td >End Date</td><td>&nbsp;$resultx->enddt</td></tr>";
            echo "<tr><td >Product Bundling</td><td>&nbsp;$resultx->prd_bundling</td></tr>";
            echo "<tr><th colspan=2>Update To</th></tr>";
            echo "<tr><td >Product Bundling</td><td>&nbsp;";
            echo "<select id=\"prdbundling\" name=\"prdbundling\">";
            foreach($listPrdBundling as $bundling) {
                if($bundling->prdcdCat == $resultx->prd_bundling) {
                    echo "<option selected value=\"$bundling->prdcdCat\">$bundling->prdcdCatName</option>";
                } else {
                    echo "<option value=\"$bundling->prdcdCat\">$bundling->prdcdCatName</option>";
                }         
            }
            
            echo "</select>";
            echo "</td></tr>";
            echo "<tr><td align=right><input type=\"button\" class=\"btn btn-mini btn-warning\" value=\"<< Back\" onclick=\"All.back_to_form('.nextForm1','.mainForm')\" />&nbsp;</td>";
            echo "<td>&nbsp;<input type=\"button\" class=\"btn btn-mini btn-primary\" value=\"Update Voucher\" onclick=\"Langganan.saveUpdateVoucher()\" /></td></tr>";
            echo "</table></form>";
        }
  } 
  
  //print_r($res);
?>