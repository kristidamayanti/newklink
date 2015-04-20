<div class="row">
	<div class="col-xs-12 col-sm-4 col-md-3"> 
       <?php 
        echo audioStoreMenu();
	   ?>	   
    </div>
    <div class="col-xs-12 col-sm-8 col-md-9">  
      <?php echo validation_errors(); ?>
        <?php if (isset($mssg)): echo $mssg;
        endif; ?>
        <!-- size 8 -->
        <div role="form">
		<?php echo form_open('voucher/check'); ?>
            <div class="form-group">
                <label for="voucherno">Voucher Verification Check</label>
                <input name="voucherno" autofocus required type="text" class="form-control" id="voucherno" placeholder="Masukan Voucher No Anda">
            </div>
            <div class="form-group">                  
                <input name="voucherkey" required type="password" class="form-control" id="voucherkey" placeholder="Masukan Voucher Key Anda">
            </div>
            <!--<div class="form-group">                  
                <input type="checkbox" name="nonvoucher" id="nonvoucher" value="checked"> Non Voucher, bayar melalui Saldo K-Wallet
            </div>-->                               
            <?php
            echo form_submit('submit', 'Submit', 'class="btn btn-default"');
            echo form_close();
			
			if(isset($loginSukses)) {
				 echo "<h4>$loginSukses</h4>";
			}
            ?>	
        </div>
        <div>
            <?php
              if(isset($err_message) && $err_message != "1" && $err_message != "0") {
                  echo "<font color=red>$err_message</font>";
              }
            ?>
        </div>
      </div>              
</div>