<?php
    if(isset($listOffice))
    {
    
       echo "<form id=listOffice><table width=\"100%\" class=\"table table-striped table-bordered bootstrap-datatable datatable\">";
       echo "<thead><tr ><th colspan=5 bgcolor=#lightgrey>List Office</th></tr>";
       echo "<tr bgcolor=#f4f4f4><th width=8%>No</th><th>Office Name</th><th width=20%>City</th><th width=20%>Area</th><th width=15%>Action</th></thead></tr>";
       echo "<tbody>";
       $i = 1;
       foreach($listOffice as $list) {
                echo "<tr id=\"$i\">";
                echo "<td><div align=right>$i</div></td>";
                //echo "<td><div align=center>$list->gid</div></td>";  
                echo "<td><div align=center><input type=\"hidden\" id=\"id$i\" value=\"$list->id\" />$list->scode</div></td>";
                echo "<td><div align=center>$list->city</div></td>";
                echo "<td><div align=center>$list->areaname</div></td>";
                echo "<td><div align=\"center\">";
                echo "<a class=\"btn btn-mini btn-info\" onclick=\"Office.getUpdateOffice($i)\"><i class=\"icon-edit icon-white\"></i></a>";
                echo "&nbsp;<a class=\"btn btn-mini btn-danger\" onclick=\"Office.deleteOffice($i)\"><i class=\"icon-trash icon-white\"></i></a>";
                echo "</div></td>";
                echo "</tr>";
              $i++; 
        }
    echo "</tbody></tr>";
    echo "</table></form>"; 
  ?>
  <script>
  
      $( document ).ready(function() {
       All.set_datatable();
        });
  </script>
  <?php 
    } else {
       echo "<div class='alert alert-error'>No record found..!!</div>";
    }

   ?>