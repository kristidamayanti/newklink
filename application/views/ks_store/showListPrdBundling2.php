<div class="row">
  <div class="col-xs-12 col-sm-4 col-md-3"> 
       <?php 
        echo audioStoreMenuNoVoucher();
	   ?>   
  </div>
  <div class="col-xs-12 col-sm-8 col-md-9">
  	<?php
                     echo "<div class=\"row\">";
                     if($listBundling == null)
                     {
                        echo "<div class=\"list-group\"><h3>Belum ada Audio File yang tersedia</h3></div>";
                     } else {
                          echo "<div class=\"list-group\"><h3>Audio File yang belum di download</h3></div>";
                          
						  showListAudioProduct($listBundling, "novoucher");
                          
                      }  
                     echo "</div>";   
                  ?>   
      <?php
        echo showModalDialog();
      ?>
           
</div>
</div>		