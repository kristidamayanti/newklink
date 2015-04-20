<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>K-SYSTEM ONLINE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content="k-link, responsive, HTML5, K-System Online"/>
	<meta name="author" content="k-link"/>
    
    <!-- The styles -->
	<link  href="<?php echo base_url('css/bootstrap/css/bootstrap-cerulean.css')?>" rel="stylesheet"/>
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
    <link href="<?php echo base_url('css/bootstrap/css/bootstrap-responsive.css')?>" rel="stylesheet"/>
	<link href="<?php echo base_url('css/bootstrap/css/charisma-app.css') ?>" rel="stylesheet"/>
	<link href="<?php echo base_url('css/bootstrap/css/jquery-ui-1.8.21.custom.css')?>" rel="stylesheet"/>
	<link href="<?php echo base_url('css/bootstrap/css/chosen.css')?>" rel="stylesheet"/>
	<link href="<?php echo base_url('css/bootstrap/css/uniform.default.css')?>" rel="stylesheet"/>
	<link href="<?php echo base_url('css/bootstrap/css/colorbox.css')?>" rel="stylesheet"/>
	<link href="<?php echo base_url('css/bootstrap/css/jquery.noty.css')?>" rel="stylesheet"/>
	<link href="<?php echo base_url('css/bootstrap/css/noty_theme_default.css')?>" rel="stylesheet"/>
	<link href="<?php echo base_url('css/bootstrap/css/elfinder.min.css')?>" rel="stylesheet"/>
	<link href="<?php echo base_url('css/bootstrap/css/elfinder.theme.css')?>" rel="stylesheet"/>
	<link href="<?php echo base_url('css/bootstrap/css/jquery.iphone.toggle.css')?>" rel="stylesheet"/>
	<link href="<?php echo base_url('css/bootstrap/css/opa-icons.css')?>" rel="stylesheet"/>
	<link href="<?php echo base_url('css/bootstrap/css/uploadify.css')?>" rel="stylesheet"/>
</head>
<body>

<div  class="container-fluid">
		<div class="row-fluid">
		
			<div align="center" class="row-fluid">
				<div class="span12 center login-header">
					<h2><?php echo $header; ?></a></h2>
				</div><!--/span-->
			</div><!--/row-->
			
			<div align="center"  class="row-fluid">
				<div class="well span5 center login-box">
					<div class="alert alert-info">
						<?php echo $header_message; ?>
					</div>
					<form class="form-horizontal" action="<?php echo $form_action; ?>" method="post">
						<fieldset>
							<div class="input-prepend" title="Username" data-rel="tooltip"/>
								<span class="add-on"><i class="icon-user"></i></span>
                                <input autofocus class="input-large span10" name="username" id="username" type="text" placeholder="Username" value="<?php echo set_value('username'); ?>" />
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password" data-rel="tooltip">
								<span class="add-on"><i class="icon-lock"></i></span>
                                <input class="input-large span10" name="password" id="password" type="password" placeholder="Password" value="<?php echo set_value('password'); ?>" />
							</div>
							<div class="clearfix"></div>
                            
                            
                            <div class="input-prepend" title="New Password" data-rel="tooltip">
								<span class="add-on"><i class="icon-lock"></i></span>
                                <input autofocus class="input-large span10" name="new_password" id="new_password" type="password" placeholder="New Password" value="<?php echo set_value('new_password'); ?>" />
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Confirm New Password" data-rel="tooltip">
								<span class="add-on"><i class="icon-lock"></i></span>
                                <input class="input-large span10" name="confirm_new_password" id="confirm_new_password" type="password" placeholder="Confirm New Password" value="<?php echo set_value('confirm_new_password'); ?>" />
							</div>
							<div class="clearfix"></div>
                            
                            
							<div class="input-prepend">
							<label class="remember" for="remember"><a href="<?php echo $link_form; ?>"><?php echo $chg_pwd; ?></a></label>
							</div>
							<div class="clearfix"></div>

							<p class="center span5">
							<button type="submit" class="btn btn-primary" name="submit"><?php echo $button_act; ?></button>
							</p>
						</fieldset>
					</form>
				</div><!--/span-->
			</div><!--/row-->
				</div><!--/fluid-row-->
		
	</div><!--/.fluid-container-->
    <div align="center">
      <font color="red">
        <?php 
        if(isset($error_message))
        { echo $error_message; } 
        ?>
      </font>  
    </div>
    	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- jQuery -->
	<script src="<?php echo base_url('asset/js/jquery-1.7.2.min.js')?>"></script>
	<!-- jQuery UI -->
	<script src="<?php echo base_url('asset/js/jquery-ui-1.8.21.custom.min.js')?>"></script>
	<!-- transition / effect library -->
	<script src="<?php echo base_url('asset/js/bootstrap-transition.js')?>"></script>
	<!-- alert enhancer library -->
	<script src="<?php echo base_url('asset/js/bootstrap-alert.js')?>"></script>
	<!-- modal / dialog library -->
	<script src="<?php echo base_url('asset/js/bootstrap-modal.js')?>"></script>
	<!-- custom dropdown library -->
	<script src="<?php echo base_url('asset/js/bootstrap-dropdown.js')?>"></script>
	<!-- scrolspy library -->
	<script src="<?php echo base_url('asset/js/bootstrap-scrollspy.js');?>"></script>
	<!-- library for creating tabs -->
	<script src="<?php echo base_url('asset/js/bootstrap-tab.js')?>"></script>
	<!-- library for advanced tooltip -->
	<script src="<?php echo base_url('asset/js/bootstrap-tooltip.js')?>"></script>
	<!-- popover effect library -->
	<script src="<?php echo base_url('asset/js/bootstrap-popover.js')?>"></script>
	<!-- button enhancer library -->

</body>
</html>