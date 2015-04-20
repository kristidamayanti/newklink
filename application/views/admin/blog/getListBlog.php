<?php
    if($listBlog != null)
    {
        
       echo "<input type=button class=\"btn btn-mini btn-warning\" value=\"Back to Form\" onclick=\"Blog.backToFormBlog()\"/><form id=listBlog><table width=\"100%\" class=\"table table-striped table-bordered bootstrap-datatable datatable\">";
       echo "<thead><tr ><th colspan=6 bgcolor=#lightgrey>List Blog</th></tr>";
       echo "<tr bgcolor=#f4f4f4><th width=8%>No</th><th>Name</th><th width=20%>Type</th><th width=8%>Active</th><th width=10%>Create Dt</th><th width=10%>Action</th><th width=10%>Recommended</th></thead></tr>";
       echo "<tbody>";
       $i = 1;
       foreach($listBlog as $list) {
                echo "<tr id=\"$i\">";
                echo "<td><div align=right>$i</div></td>";
                echo "<td><div align=center><input type=\"hidden\" id=\"id$i\" value=\"$list->id\" />$list->bl_name</div></td>";
                echo "<td><div align=center>$list->blogTypeName</div></td>";
                if($list->bl_act == "1") {
                    echo "<td><div align=center>YES</div></td>";
                } else {
                    echo "<td><div align=center>NO</div></td>";
                }
                echo "<td><div align=center>$list->createdt</div></td>";
                echo "<td><div align=\"center\">";
                echo "<a class=\"btn btn-mini btn-info\" onclick=\"Blog.getUpdateBlog($i)\"><i class=\"icon-edit icon-white\"></i></a>";
                echo "&nbsp;<a class=\"btn btn-mini btn-danger\" onclick=\"Blog.deleteBlog($i)\"><i class=\"icon-trash icon-white\"></i></a>";
                echo "</div></td>";
                if($list->flag_recommend == null || $list->flag_recommend == 0) {
                  echo "<td><div align=center>";
                  echo "<select class=span10 id=recommend$i name=recommend$i onchange=\"Blog.setRecommendedBlog($i)\">";
                  echo "<option value=0 selected=selected>NO</option><option value=1>YES</option>";
                  echo "</select>";
                  echo "</div></td>";  
                } else {
                 echo "<td><div align=center>";
                  echo "<select class=span10 id=recommend$i name=recommend$i onchange=\"Blog.setRecommendedBlog($i)\">";
                  echo "<option value=0 >NO</option><option value=1 selected=selected>YES</option>";
                  echo "</select>";
                  echo "</div></td>";    
                }
                 
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