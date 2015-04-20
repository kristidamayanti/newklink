<div class="row">
	<div class="col-xs-12 col-sm-4 col-md-3"> 
     <div class="list-group">
        <?php 
        echo audioStoreMenu();
	   ?>  
     </div>          
    </div>
    <div class="col-xs-12 col-sm-8 col-md-9">  
       <?php
                     echo "<div class=\"row\">";
					 if($listHistTrx == null)
					 {
					 	echo "<div class=\"list-group\"><h3>Belum ada transaksi audio yang tersedia</h3></div>";
					 } else {
					 	  echo "<div class=\"list-group\"><h3>History Transaction</h3></div>";
						  showListAudioProduct($listHistTrx, "history");
					  }  
                     echo "</div>";   
                  ?>   
    </div>
    <?php
        echo showModalDialog();
      ?>              
</div>