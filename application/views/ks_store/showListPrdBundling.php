<div class="row">
  <div class="col-xs-12 col-sm-4 col-md-3"> 
       <?php 
        echo audioStoreMenu();
	   ?>	   
  </div>
  <div class="col-xs-12 col-sm-8 col-md-9">
  	<?php
         echo "<div class=\"row\">";
		 //echo "isi list bundling : $listBundling";
		 //$rpc = $this->session->user_data('resultrpc');
		// $rpc = $this->session->userdata('resultrpc');
		// print_r($rpc);
		 if($listBundling == null)
		 {
		 	echo "<div class=\"list-group\"><h3>Product yang tersedia masih kosong..</h3></div>";
		 } else if($listBundling == "expired") {
		 	echo "<div class=\"list-group\"><h3>Voucher sudah expired</h3></div>";
		 } 
		 else { 
		 	  echo "<div class=\"list-group\"><h3>Audio File yang belum pernah di download</h3></div>";
			  showListAudioProduct($listBundling, "voucher");
			  
		  }  
         echo "</div>"; 
		   
      ?>   
      <!--<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <h4 class="modal-title" id="myModalLabel">Image preview</h4>
		      </div>
		      <div class="modal-body">
		        <img src="" id="imagepreview">
		        <div id="title_kaset"></div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>     
      </div>-->
      <?php
        echo showModalDialog();
      ?>
           
</div>
</div>		