<body>
  <div class="container-fluid">      
    <div class="row">          
      <div class="col-xs-3 col-md-3">
        <img src="<?php echo base_url(); ?>images/logo.png" alt="K-Link Logo">            
      </div>
      <div class="col-xs-9 col-md-9">
        <div class="row">
          <div class="col-xs-12 col-md-12 hidden-xs">
            <ul class="secondary-nav clearfix">
              <li>Service</li>
              <li><a href="<?php echo site_url() . '/blog'; ?>">Blog</a></li>
              <li><a href="<?php echo site_url() . '/contact'; ?>">Contact us</a></li>
              <li>Community</li>
              <li><a href="<?php echo site_url() . '/stockist'; ?>">Locate Stockist</a></li>
              <?php
               if($username == "" || $username == null) {
               	 echo "<li>Distributor Login</li>";
               } else {
               	 $ss = 	site_url('store/logout');
               	 echo "<li><a href=\"$ss\">Logout</a></li>";
               }
              ?>
              
            </ul>

          </div>
          <div class="col-xs-12 col-md-12">  
          	<?php
          	if($username != "" || $username != null) {
          	?>	
          		
          		<button type="button" class="btn btn-default btn-lg pull-right"><span class="glyphicon glyphicon-user"></span> Welcome, <?php echo $username; ?> </button>
          		<a href="<?php echo site_url('voucher'); ?>" class="btn btn-default btn-lg pull-right"><span class="glyphicon glyphicon-shopping-cart"></span> Enter Audio Store </a>
          	<?php
          	}     
			?>            
            <!--<button type="button" class="btn btn-default btn-lg pull-right"><span class="glyphicon glyphicon-shopping-cart"></span>My Chart <span class="caret"></span></button>-->        
          </div>    
        </div>
      </div>         
    </div>  
    
    <div class="row nav-wrapper">
      <div class="col-md-12" data-spy="affix" data-offset-top="105" data-offset-bottom="200">
        <nav class="navbar navbar-default" role="navigation">
            
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>              
            </div>

            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Home</a></li>
                <li class="dropdown">
                  <a href="aboutus.html" class="dropdown-toggle" data-toggle="dropdown">About Us <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="visimisi.html">Vision & Mission</a></li>
                    <li><a href="#">Company Profile</a></li>
                    <li><a href="bod.html">Board of Director</a></li>
                    <li><a href="president.html">President Director</a></li>                    
                    <li><a href="gm.html">General Manager</a></li>
                    <li class="divider"></li>
                    <li><a href="#">CSR & K_link Care</a></li>
                    <li><a href="#">Awards & Recognition</a></li>                         
                  </ul>
                </li>                                
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Product <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Ayurveda</a></li>
                    <li><a href="#">Beaucareline</a></li>
                    <li><a href="#">Health Drink</a></li>                    
                    <li><a href="#">Health Food</a></li>                    
                    <li><a href="#">Personal Care</a></li>
                    <li><a href="#">Car Care</a></li>
                    <li><a href="#">Testimony</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Business Opportunity <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="directselling.html">What is direct selling</a></li>
                    <li><a href="#">Why choose K-Link</a></li>
                    <li><a href="#">Our Royall Crown Ambasador's</a></li>                    
                    <li><a href="#">Success Stories</a></li>
                    <li><a href="#">How do i join ?</a></li>                    
                    <li><a href="#">Our Marketing Plan</a></li>                    
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">News & Events <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">News Room</a></li>
                    <li><a href="#">CSR</a></li>                    
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">K-Link Ladies <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">L.B.C</a></li>
                    <li><a href="#">House of beauty</a></li>
                    <li><a href="#">Beauty tips</a></li>
                    <li><a href="#">Recipes</a></li>                    
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">The Doctors Surgery <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Our doctors</a></li>
                    <li><a href="#">Health article</a></li>                    
                  </ul>
                </li>
              </ul>             
            </div><!-- /.navbar-collapse -->

        </nav>
      </div>
    </div>