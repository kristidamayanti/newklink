<?php
    if(isset($listRootMenu))
    {
    
       echo "<form id=listUser><table width=\"100%\" class=\"table table-striped table-bordered bootstrap-datatable datatable\">";
       echo "<thead><tr ><th colspan=5 bgcolor=#lightgrey>List Root Menu</th></tr>";
       echo "<tr bgcolor=#f4f4f4><th width=8%>No</th><th>ID</th><th>Menu Name</th><th width=20%>Sub Menu Prefix</th><th width=15%>Order List</th><th width=15%>Action</th></thead></tr>";
       echo "<tbody>";
       $i = 1;
       foreach($listRootMenu as $list) {
                echo "<tr id=\"$i\">";
                echo "<td><div align=right>$i</div></td>";
                echo "<td><div align=center>$list->id</div></td>";  
                echo "<td><div align=center><input type=\"hidden\" id=\"id$i\" value=\"$list->id\" />$list->menuName</div></td>";
                echo "<td><div align=center>$list->prefix</div></td>";
                echo "<td><div align=center>$list->orderlist</div></td>";
                echo "<td><div align=\"center\">";
                echo "<a class=\"btn btn-mini btn-info\" onclick=\"User.getUpdateRootMenu($i)\"><i class=\"icon-edit icon-white\"></i></a>";
                echo "&nbsp;<a class=\"btn btn-mini btn-danger\" onclick=\"User.deleteRootMenu($i)\"><i class=\"icon-trash icon-white\"></i></a>";
                echo "</div></td>";
                echo "</tr>";
              $i++; 
        }
    echo "</tbody></tr></table></table>";
    //echo "</table><input type=\"submit\" class=\"btn btn-success\" value=\"Export to Excel\" /></table>"; 
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