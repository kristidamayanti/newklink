<?php
    if(isset($listPromo))
    {
        
       echo "<form id=listUser><table width=\"100%\" class=\"table table-striped table-bordered bootstrap-datatable datatable\">";
       echo "<thead><tr ><th colspan=4 bgcolor=#lightgrey>List Promo</th></tr>";
       echo "<tr bgcolor=#f4f4f4><th width=8%>No</th><th>Promo Title</th><th width=15%>Active</th><th width=15%>Action</th></thead></tr>";
       echo "<tbody>";
       $i = 1;
       foreach($listPromo as $list) {
                echo "<tr id=\"$i\">";
                echo "<td><div align=right>$i</div></td>";
                echo "<td><div align=center><input type=\"hidden\" id=\"id$i\" value=\"$list->id\" />$list->title</div></td>";
                if($list->act == 1) {
					echo "<td><div align=center>YES</div></td>";
				} else {
					echo "<td><div align=center>NO</div></td>";
				}
				
                echo "<td><div align=\"center\">";
                echo "<a class=\"btn btn-mini btn-info\" onclick=\"Promo.getUpdatePromo($i)\"><i class=\"icon-edit icon-white\"></i></a>";
                echo "&nbsp;<a class=\"btn btn-mini btn-danger\" onclick=\"Promo.deletePromo($i)\"><i class=\"icon-trash icon-white\"></i></a>";
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
       echo "<div class='alert alert-error'>No record found..!!</div>";
    }

   ?>