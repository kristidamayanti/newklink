<?php
    if($arrayData[0] != null)
    {
        
       echo "<input type=button class=\"btn btn-mini btn-warning\" value=\"Back to Form\" onclick=\"Langganan.backToFormUpload()\"/><form id=listLangganan><table width=\"100%\" class=\"table table-striped table-bordered bootstrap-datatable datatable\">";
       echo "<thead><tr ><th colspan=5 bgcolor=#lightgrey>List Kaset</th></tr>";
       echo "<tr bgcolor=#f4f4f4>
                <th width=8%>No</th>
                <th>Kode</th>
                <th>Product Name</th>
                <th>West Price</th>
                <th>East Price</th>
                <th>Action</th>
            </thead></tr>";
       echo "<tbody>";
       $i = 1;
       foreach($arrayData->arrayData as $list) {
                echo "<tr id=\"$i\">";
                echo "<td><div align=right>$i</div></td>";
                echo "<td><div align=center><input type=\"hidden\" id=\"id$i\" value=\"$list->kd_kaset\" />$list->title&nbsp;</div></td>";
                echo "<td><div align=right>$list->westprice&nbsp;</div></td>";
                echo "<td><div align=right>$list->eastprice&nbsp;</div></td>";
                echo "<td><div align=\"center\">";
                echo "<a class=\"btn btn-mini btn-info\" onclick=\"Langganan.getUpdateLangganan($i)\"><i class=\"icon-edit icon-white\"></i></a>";
                echo "&nbsp;<a class=\"btn btn-mini btn-danger\" onclick=\"Langganan.deleteLangganan($i)\"><i class=\"icon-trash icon-white\"></i></a>";
                echo "</div></td>";
                echo "</tr>";
              $i++; 
        }
    echo "</tbody></tr></table></form>";
    //echo "</table><input type=\"submit\" class=\"btn btn-success\" value=\"Export to Excel\" /></form>"; 
  ?>
  <script>
  
      $( document ).ready(function() {
       All.set_datatable();
        });
  </script>
  <?php 
    } else {
       echo "<div class='alert-error'>No result found..!!</div>";
    }

   ?>