<!DOCTYPE html>
<html lang="en">
<head encode="utf-8">
	
	<meta charset="utf-8"/>
	<title>K-System Online</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content="a fully featured, responsive, HTML5, Bootstrap admin template."/>
	<meta name="author" content="k-link.co.id ADMIN"/>

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
	<link href="<?php echo base_url('css/bootstrap/css/charisma-app.css')?>" rel="stylesheet"/>
	<link href="<?php echo base_url('css/bootstrap/css/jquery-ui-1.8.21.custom.css')?>" rel="stylesheet"/>
	<link href="<?php echo base_url('css/bootstrap/css/fullcalendar.css')?>" rel="stylesheet"/>
	<link href="<?php echo base_url('css/bootstrap/css/fullcalendar.print.css')?>" rel="stylesheet"  media="print"/>
	<link href="<?php echo base_url('css/bootstrap/css/chosen.css')?>" rel="stylesheet"/>
	<link href="<?php echo base_url('css/bootstrap/css/uniform.default.css')?>" rel="stylesheet"/>
	<link href="<?php echo base_url('css/bootstrap/css/colorbox.css')?>" rel="stylesheet"/>
	<link href="<?php echo base_url('css/bootstrap/css/jquery.cleditor.css')?>" rel="stylesheet"/>
	<link href="<?php echo base_url('css/bootstrap/css/jquery.noty.css')?>" rel="stylesheet"/>
	<link href="<?php echo base_url('css/bootstrap/css/noty_theme_default.css')?>" rel="stylesheet"/>
	<link href="<?php echo base_url('css/bootstrap/css/elfinder.min.css')?>" rel="stylesheet"/>
	<link href="<?php echo base_url('css/bootstrap/css/elfinder.theme.css')?>" rel="stylesheet"/>
	<link href="<?php echo base_url('css/bootstrap/css/jquery.iphone.toggle.css')?>" rel="stylesheet"/>
	<link href="<?php echo base_url('css/bootstrap/css/opa-icons.css')?>" rel="stylesheet"/>
	<link href="<?php echo base_url('css/bootstrap/css/uploadify.css')?>" rel="stylesheet"/>
	<link href="<?php echo base_url('css/bootstrap/css/main.css')?>" rel="stylesheet"/>
	<script src="<?php echo base_url('css/bootstrap/js/jquery-1.7.2.min.js')?>"></script>
	
    <!-- jQuery UI -->
	<script src="<?php echo base_url('css/bootstrap/js/jquery-ui-1.8.21.custom.min.js')?>"></script>
	<!-- transition / effect library -->
	<script src="<?php echo base_url('css/bootstrap/js/bootstrap-transition.js')?>"></script>
	<!-- alert enhancer library -->
	<script src="<?php echo base_url('css/bootstrap/js/bootstrap-alert.js')?>"></script>
	<!-- modal / dialog library -->
	<script src="<?php echo base_url('css/bootstrap/js/bootstrap-modal.js')?>"></script>
	<!-- custom dropdown library -->
	<script src="<?php echo base_url('css/bootstrap/js/bootstrap-dropdown.js')?>"></script>
	
	
    <script src="<?php echo base_url('css/bootstrap/js/jquery.ui.datepicker.js')?>"></script>
    <script src="<?php echo base_url('css/bootstrap/js/jquery.ui.core.js')?>"></script>
    <script src="<?php echo base_url('css/bootstrap/js/jquery.ui.widget.js')?>"></script>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="img/favicon.ico"/>	
</head>
<body>
	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

<!-- jQuery -->
	
	<!-- scrolspy library -->
	<script src="<?php echo base_url('css/bootstrap/js/bootstrap-scrollspy.js')?>"></script>
	<!-- library for creating tabs -->
	<script src="<?php echo base_url('css/bootstrap/js/bootstrap-tab.js')?>"></script>
	<!-- library for advanced tooltip -->
	<script src="<?php echo base_url('css/bootstrap/js/bootstrap-tooltip.js')?>"></script>
	<!-- popover effect library -->
	<script src="<?php echo base_url('css/bootstrap/js/bootstrap-popover.js')?>"></script>
	<!-- button enhancer library -->
	<script src="<?php echo base_url('css/bootstrap/js/bootstrap-button.js')?>"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="<?php echo base_url('css/bootstrap/js/bootstrap-collapse.js')?>"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="<?php echo base_url('css/bootstrap/js/bootstrap-carousel.js')?>"></script>
	<!-- autocomplete library -->
	<script src="<?php echo base_url('css/bootstrap/js/bootstrap-typeahead.js')?>"></script>
	<!-- tour library -->
	<script src="<?php echo base_url('css/bootstrap/js/bootstrap-tour.js')?>"></script>
	<!-- library for cookie management -->
	<script src="<?php echo base_url('css/bootstrap/js/jquery.cookie.js')?>"></script>
	
	<!-- data table plugin -->
	<script src="<?php echo base_url('css/bootstrap/js/jquery.dataTables.min.js')?>"></script>

	<!-- chart libraries start -->
	<script src="<?php echo base_url('css/bootstrap/js/excanvas.js')?>"></script>
	<script src="<?php echo base_url('css/bootstrap/js/jquery.flot.min.js')?>"></script>
	<script src="<?php echo base_url('css/bootstrap/js/jquery.flot.pie.min.js')?>"></script>
	<script src="<?php echo base_url('css/bootstrap/js/jquery.flot.stack.js')?>"></script>
	<script src="<?php echo base_url('css/bootstrap/js/jquery.flot.resize.min.js')?>"></script>
	<!-- chart libraries end -->
    	<!-- select or dropdown enhancer -->
	<script src="<?php echo base_url('css/bootstrap/js/jquery.chosen.min.js')?>"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="<?php echo base_url('css/bootstrap/js/jquery.uniform.min.js')?>"></script>
	<!-- plugin for gallery image view -->
	<script src="<?php echo base_url('css/bootstrap/js/jquery.colorbox.min.js')?>"></script>
	<!-- rich text editor library -->
	<script src="<?php echo base_url('css/bootstrap/js/jquery.cleditor.min.js')?>"></script>
	<!-- notification plugin -->
	<script src="<?php echo base_url('css/bootstrap/js/jquery.noty.js')?>"></script>
	<!-- file manager library -->
	<script src="<?php echo base_url('css/bootstrap/js/jquery.elfinder.min.js')?>"></script>
	<!-- star rating plugin -->
	<script src="<?php echo base_url('css/bootstrap/js/jquery.raty.min.js')?>"></script>
	<!-- for iOS style toggle switch -->
	<script src="<?php echo base_url('css/bootstrap/js/jquery.iphone.toggle.js')?>"></script>
	<!-- autogrowing textarea plugin -->
	<script src="<?php echo base_url('css/bootstrap/js/jquery.autogrow-textarea.js')?>"></script>
	<!-- multiple file upload plugin -->
	<script src="<?php echo base_url('css/bootstrap/js/jquery.uploadify-3.1.min.js')?>"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="<?php echo base_url('css/bootstrap/js/jquery.history.js')?>"></script>
	<!-- application script for Charisma demo -->
	<script src="<?php echo base_url('css/bootstrap/js/charisma.js')?>"></script>
    <!-- application purchasing module buatan guweeeee -->
    <script src="<?php echo base_url('css/bootstrap/js/purchasing_module.js')?>" ></script>


	<?php  if(!isset($no_visible_elements) || !$no_visible_elements)	{ ?>
	<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
			 USER ROLE : <?php echo $userrolename; ?>
				<!-- theme selector starts -->
				
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone">&nbsp;&nbsp;<?php echo $username;?></span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo site_url('/login/change_password/');?>"><i class="icon icon-key"></i> Change Password</a></li>
						<li class="divider"></li>
						<li><a href="<?php echo $logout; ?>"><i class="icon icon-locked"></i> Logout</a></li>
					</ul>
				</div>
				<!-- user dropdown ends -->
				
				<div class="top-nav nav-collapse">
					<ul class="nav">
					
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>
	<!-- topbar ends -->
	<?php } ?>
    
	<div class="container-fluid">
		<div class="row-fluid">
		<?php if(!isset($no_visible_elements) || !$no_visible_elements) { ?>
		
			<!-- left menu starts -->
            
			<div class="span3 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header">Main</li>
                        
						<?php
                        echo $menu;
						?>
                        
                        
					</ul>
				
				</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu ends -->
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
            
			<div id="content" class="span9">
			<!-- content starts -->
			<?php  } ?>