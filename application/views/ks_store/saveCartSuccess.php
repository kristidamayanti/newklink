<?php
    echo "<p>$dataSales[responseMessage]</p>";
    if($dataSales['sukses'] == true) {
        $total = $dataSales['saldo'] * -1;
        echo "<pre>Order No   : $dataSales[orderno]</pre>";
        echo "<pre>Trx No     : $dataSales[trxNo]</pre>";
        echo "<pre>Total Trx  : Rp.".number_format($dataSales['saldo'],0,",",".")."</pre>";
        echo "<pre>Sisa Saldo : ".number_format($dataSales['sisa_saldo'],0,",",".")."</pre>";
    }
?>	
	<div class="col-xs-12 col-sm-8 col-md-9">
  	<?php
                     echo "<div class=\"row\">";
                     if($listBundling == null)
                     {
                        echo "<div class=\"list-group\"><h3>Belum ada histori transaksi..</h3></div>";
                     } else {
                          echo "<div class=\"list-group\"><h3>Audio File yang telah di bayar :</h3></div>";
                          
						  showListAudioProduct($listBundling, "voucher");
                          
                      }  
                     echo "</div>";   
                  ?>   
      <?php
        echo showModalDialog();
      ?>
           
</div>		