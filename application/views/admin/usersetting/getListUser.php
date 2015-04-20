<?php
    if(isset($listUser))
    {
    
       echo "<form id=listUser><table width=\"100%\" class=\"table table-striped table-bordered bootstrap-datatable datatable\">";
       echo "<thead><tr ><th colspan=5 bgcolor=#lightgrey>List User</th></tr>";
       echo "<tr bgcolor=#f4f4f4><th width=8%>No</th><th width=15%>Username</th><th>Password</th><th>User Group</th><th width=15%>Action</th></thead></tr>";
       echo "<tbody>";
       $i = 1;
       foreach($listUser as $list) {
    			echo "<tr id=\"$i\">";
    			echo "<td><div align=right>$i</div></td>";	
                echo "<td><div align=center><input type=\"hidden\" id=\"id$i\" value=\"$list->uid\" /><input type=\"hidden\" id=\"usrnm$i\" value=\"$list->username\" />$list->username</div></td>";
                echo "<td><div align=center>$list->password</div></td>";
                echo "<td><div align=center>$list->nm_group</div></td>";
    			echo "<td><div align=\"center\">";
                echo "<a class=\"btn btn-mini btn-info\" onclick=\"User.getUpdateUser($i)\"><i class=\"icon-edit icon-white\"></i></a>";
            	echo "&nbsp;<a class=\"btn btn-mini btn-danger\" onclick=\"User.deleteUser($i)\"><i class=\"icon-trash icon-white\"></i></a>";
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