<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<body>
    <div class="container">      
        <div class="row">
			<div class="col-xs-12 col-md-3">
					<img class="img-responsive" src="<?php echo base_url(); ?>images/logo4.png" alt="K-Link Logo" height="105" width="260px" >            
			</div>
            <div class="col-xs-12 col-md-9">
                <div class="row">                    
                    <div class="col-xs-12 col-md-12 pull-right right atas-bawah">
                        <p class="text-info">
                        <a href="<?php echo site_url() . '/store'; ?>"><i class="fa fa-shopping-cart"></i> Web Store </a>|
						<?php echo anchor('http://k-cashonline.com', 'Service'); ?> | 
                        <a href="<?php echo site_url() . '/blog'; ?>">Blog </a> | 
                        <a href="<?php echo site_url() . '/contact'; ?>">Contact us </a> | 
						<?php echo anchor('http://www.k-link.co.id/community/', 'Community'); ?> | 
                        <a href="<?php echo site_url() . '/stockist'; ?>">Locate Stockist</a> | 
						<?php echo anchor('https://www.k-linkindo.com/', 'Distributor Login'); ?> | 
                        <a href="<?php echo site_url() . '/career'; ?>">Career</a> |
                        <a class="" href="<?php echo site_url() . '/rss_feeds'; ?>">RSS <i class="fa fa-rss"></i> </a></p>
                    </div>
                    <div class="col-xs-12 col-md-12 pull-right right atas-bawah">
                        <?php
						$attributes = array("class" => "form-inline", "id" =>"loginform", "name" => "loginform", "target"=>"_blank", "role"=>"form");
						echo form_open('pencarian/cariData', $attributes);
						?>
                          <div class="form-group">
                            <label class="sr-only" for="search-articel">Look for..</label>
                                <input class="form-control" type="text" name="search" placeholder="Search Article" >
                          </div>
                            <div class="form-group">
                                <select class="form-option" name="jenis">
                                  <option value=""> - </option>
                                  <option value="product">Product</option>
                                  <option value="news">News</option>
                                  <option value="blog">Blog</option>
                                </select>
                                
                                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
							</div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-search">Submit</button>
                            </div>
                        <?php echo form_close();?>
                    </div>    
                </div>
			</div>
        </div>    
        <!-- <br>  -->     
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo site_url(); ?>">Back To Home</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">                                
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="page-header">
                    <h1>Login</h1><h1>
                </div>
            </div>

            <div class="col-xs-12 col-md-12">
                <br>
                <div class="col-xs-3 col-md-3"> 
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
                <div class="col-xs-8 col-md-8">
                    <!-- size 8 -->
                    <div role="form">
                        <?php echo validation_errors(); ?>
                        <?php echo form_open('storelogin'); ?>
                        <div class="form-group">
                            <label for="username">Distributor ID</label>
                            <input name="username" type="text" autofocus required class="form-control" id="username" placeholder="Enter your Distributor ID">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input name="password" required type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="captcha">Captcha Code : Ejakan angka berikut ini dengan tulisan : <?php echo $mycaptcha; ?> </label>
                            <input name="captcha" required type="text" class="form-control" id="captcha" placeholder="Contoh : Sembilan">
                        </div>                            
                        <?php
                        echo form_submit('submit', 'Login', 'class="btn btn-default"');
                        echo form_close();
                        ?>
                    </div>   
                </div>              
            </div>
