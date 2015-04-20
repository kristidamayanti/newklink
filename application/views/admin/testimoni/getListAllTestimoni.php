<?php
    if($listTestimoni != NULL)
    {
        
       echo "<form id=listTestimoni><table width=\"100%\" class=\"table table-striped table-bordered bootstrap-datatable datatable\">";
       echo "<thead><tr ><th colspan=5 bgcolor=#lightgrey>List Testimoni</th></tr>";
       echo "<tr bgcolor=#f4f4f4><th width=8%>No</th><th width=25%>Name</th><th>Testimoni</th><th width=8%>Active</th><th width=12%>Action</th></thead></tr>";
       echo "<tbody>";
       $i = 1;
       foreach($listTestimoni as $list) {
                echo "<tr id=\"$i\">";
                echo "<td><div align=right>$i</div></td>";
                echo "<td><div align=left><input type=\"hidden\" id=\"id$i\" value=\"$list->id\" />$list->name</div></td>";
                echo "<td><div align=left>".text_cut($list->testimonial, 50)."</div></td>";
                if($list->act == "1") {
                    echo "<td><div align=center>YES</div></td>";
                } else {
                    echo "<td><div align=center>NO</div></td>";
                }
                
                echo "<td><div align=\"center\">";
                echo "<a class=\"btn btn-mini btn-info\" onclick=\"Testimoni.getUpdateTestimoni($i)\"><i class=\"icon-edit icon-white\"></i></a>";
                echo "&nbsp;<a class=\"btn btn-mini btn-danger\" onclick=\"Testimoni.deleteTestimoni($i)\"><i class=\"icon-trash icon-white\"></i></a>";
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
       echo "<div align=center class='alert alert-error'>No record found..!!</div>";
    }

   ?>