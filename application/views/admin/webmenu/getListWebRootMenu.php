<?php
    if(isset($listRootMenu))
    {
    
       echo "<form id=listWebmenu><table width=\"100%\" class=\"table table-striped table-bordered bootstrap-datatable datatable\">";
       echo "<thead><tr ><th colspan=5 bgcolor=#lightgrey>List Web Root Menu</th></tr>";
       echo "<tr bgcolor=#f4f4f4><th width=8%>No</th><th>ID</th><th>Menu Name</th><th width=20%>URL</th><th width=15%>Action</th></thead></tr>";
       echo "<tbody>";
       $i = 1;
       foreach($listRootMenu as $list) {
                echo "<tr id=\"$i\">";
                echo "<td><div align=right>$i</div></td>";
                echo "<td><div align=center>$list->menu_id</div></td>";  
                echo "<td><div align=center><input type=\"hidden\" id=\"id$i\" value=\"$list->menu_id\" />$list->menu_title</div></td>";
                echo "<td><div align=center>$list->menu_url</div></td>";
                echo "<td><div align=\"center\">";
                echo "<a class=\"btn btn-mini btn-info\" onclick=\"Webmenu.getUpdateRootMenu($i)\"><i class=\"icon-edit icon-white\"></i></a>";
                echo "&nbsp;<a class=\"btn btn-mini btn-danger\" onclick=\"Webmenu.deleteRootMenu($i)\"><i class=\"icon-trash icon-white\"></i></a>";
                echo "</div></td>";
                echo "</tr>";
              $i++; 
        }
    echo "</tbody></tr></table></table>";
    //echo "</table><input type=\"submit\" class=\"btn btn-success\" value=\"Export to Excel\" /></form>"; 
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