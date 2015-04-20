<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

    <div class="row">
      <div class="col-xs-12 col-md-12">
        <div class="page-header dion-page-header">
          <h1>Login</h1>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-4 col-md-3"> 
        <!-- size 3 -->
        <div class="panel panel-success">
          <div class="panel-heading"><p class="text-uppercase">Informasi</p></div>
          <div class="panel-body">
            <p>Silahkan anda masuk menggunakan username dan password yang anda miliki</p>
            <p>Halaman login ini diperuntukan bagi anda yang ingin membeli dan berlangganan Mp3 dan CD</p>
          </div>
          <div class="panel-footer">Info Hub CS 021-29027000</div>
        </div>

      </div>              
      <div class="col-xs-12 col-sm-8 col-md-9">
        <!-- size 8 -->
        <div role="form">
          <?php echo validation_errors(); ?>
          <?php echo form_open('store/login'); ?>
          <div class="form-group">
            <label for="username">Distributor ID</label>
            <input name="username" type="text" autofocus required class="form-control" id="username" placeholder="Enter your Distributor ID">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password (Sama dengan di www.k-linkmember.co.id)</label>
            <input name="password" required type="password" class="form-control input-custom" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="captcha">Captcha Code : Ejakan angka berikut ini dengan tulisan : <?php echo $mycaptcha; ?> </label>
            <input name="captcha" required type="text" class="form-control input-custom" id="captcha" placeholder="Contoh : Sembilan">
            <input type="hidden" name="hid_chap" value="<?php echo $mycaptcha; ?>" />
          </div>                            
          <?php
          echo form_submit('submit', 'Login', 'class="btn btn-default"');
          echo form_close();
          ?>
        </div>
        <div>
          <?php
          if (isset($err_message)) {
            echo "<font color=red>$err_message</font>";
          }
          ?>
        </div>   
      </div>              
    </div>
    
