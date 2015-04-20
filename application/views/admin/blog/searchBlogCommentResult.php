<?php
    if($listResult != null)
    {
        
       echo "<form id=listUser><table width=\"100%\" class=\"table table-striped table-bordered bootstrap-datatable datatable\">";
       echo "<thead><tr ><th colspan=5 bgcolor=#lightgrey>List Blog Comment $blogName</th></tr>";
       echo "<tr bgcolor=#f4f4f4><th width=8%>No</th><th width=20%>Name</th><th>Blog Comment</th><th width=15%>Create Dt</th><th width=15%>Action</th></thead></tr>";
       echo "<tbody>";
       $i = 1;
       foreach($listResult as $list) {
                echo "<tr id=\"$i\">";
                echo "<td><div align=right>$i</div></td>";
                echo "<td><div align=center><input type=\"hidden\" id=\"id$i\" value=\"$list->id\" />$list->name</div></td>";
                echo "<td><div align=center>".text_cut($list->bl_comment, 50)."</td>";
				echo "<td><div align=center>$list->createdt</td>";
                echo "<td><div align=\"center\">";
				if($list->bl_act == "0") {
					echo "<a class=\"btn btn-mini btn-info\" onclick=\"Blog.setStatusComment($i,'1')\">Approve</a>";
				} else {
					echo "<a class=\"btn btn-mini btn-info\" onclick=\"Blog.setStatusComment($i,'0')\">Disapprove</a>";
				}
                
                echo "&nbsp;<a class=\"btn btn-mini btn-danger\" onclick=\"Blog.deleteBlogComment($i)\"><i class=\"icon-trash icon-white\"></i></a>";
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
       echo "null";
    }

   ?>