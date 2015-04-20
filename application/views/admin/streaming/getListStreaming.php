<?php
    if(isset($listStreaming))
    {
        
       echo "<form id=listUser><table width=\"100%\" class=\"table table-striped table-bordered bootstrap-datatable datatable\">";
       echo "<thead><tr ><th colspan=4 bgcolor=#lightgrey>List Streaming</th></tr>";
       echo "<tr bgcolor=#f4f4f4><th width=8%>No</th><th>Title</th><th width=30%>Category</th><th width=12%>Action</th></thead></tr>";
       echo "<tbody>";
       $i = 1;
       foreach($listStreaming as $list) {
                echo "<tr id=\"$i\">";
                echo "<td><div align=right>$i</div></td>";
                echo "<td><div align=center><input type=\"hidden\" id=\"id$i\" value=\"$list->id\" />$list->title</div></td>";
                echo "<td><div align=center>$list->categoryName</div></td>";
                echo "<td><div align=\"center\">";
                echo "<a class=\"btn btn-mini btn-info\" onclick=\"Streaming.getUpdateStreaming($i)\"><i class=\"icon-edit icon-white\"></i></a>";
                echo "&nbsp;<a class=\"btn btn-mini btn-danger\" onclick=\"Streaming.deleteStreaming($i)\"><i class=\"icon-trash icon-white\"></i></a>";
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