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
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
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
            </div><!-- /.container-fluid -->
        </nav>
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="page-header">
                    <h1>K-Link Motivation Audio Store</h1>
                </div>
            </div>
            <div class="col-xs-12 col-md-12">
                <img class="center-block img-responsive" src="holder.js/1170x460" alt="Responsive image">
            </div> 



            <div class="col-xs-12 col-md-12">
                <br>
                <div class="btn-group-xs pull-right">
                    <button type="button" class="btn btn-default">See All</button>
                </div>
            </div> 


            <div class="col-xs-12 col-md-12">
                <br>
                <div class="col-xs-3 col-md-3"> 
                    <div class="list-group">
                        <a href="#" class="list-group-item active">
                            Audio Categories
                        </a>
                        <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
                        <a href="#" class="list-group-item">Morbi leo risus</a>
                        <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                        <a href="#" class="list-group-item">Vestibulum at eros</a>
                    </div>                     
                </div>              
                <div class="col-xs-8 col-md-8">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img data-src="holder.js/213x200" alt="...">
                                <div class="caption">
                                    <h3>Thumbnail label</h3>
                                    <p>...</p>
                                    <div class="btn-group btn-group-xs">
                                        <button type="button" class="btn btn-info"><span class="glyphicon glyphicon-search"></span> Info </button>
                                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> Buy</button>
                                        <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-heart"></span></button>                           
                                    </div>                          
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img data-src="holder.js/213x200" alt="...">
                                <div class="caption">
                                    <h3>Thumbnail label</h3>
                                    <p>...</p>
                                    <div class="btn-group btn-group-xs">
                                        <button type="button" class="btn btn-info"><span class="glyphicon glyphicon-search"></span> Info </button>
                                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> Buy</button>
                                        <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-heart"></span></button>                           
                                    </div>                          
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img data-src="holder.js/213x200" alt="...">
                                <div class="caption">
                                    <h3>Thumbnail label</h3>
                                    <p>...</p>
                                    <div class="btn-group btn-group-xs">
                                        <button type="button" class="btn btn-info"><span class="glyphicon glyphicon-search"></span> Info </button>
                                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> Buy</button>
                                        <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-heart"></span></button>                           
                                    </div> 
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img data-src="holder.js/213x200" alt="...">
                                <div class="caption">
                                    <h3>Thumbnail label</h3>
                                    <p>...</p>
                                    <div class="btn-group btn-group-xs">
                                        <button type="button" class="btn btn-info"><span class="glyphicon glyphicon-search"></span> Info </button>
                                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> Buy</button>
                                        <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-heart"></span></button>                           
                                    </div> 
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img data-src="holder.js/213x200" alt="...">
                                <div class="caption">
                                    <h3>Thumbnail label</h3>
                                    <p>...</p>
                                    <div class="btn-group btn-group-xs">
                                        <button type="button" class="btn btn-info"><span class="glyphicon glyphicon-search"></span> Info </button>
                                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> Buy</button>
                                        <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-heart"></span></button>                           
                                    </div> 
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img data-src="holder.js/213x200" alt="...">
                                <div class="caption">
                                    <h3>Thumbnail label</h3>
                                    <p>...</p>
                                    <div class="btn-group btn-group-xs">
                                        <button type="button" class="btn btn-info"><span class="glyphicon glyphicon-search"></span> Info </button>
                                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> Buy</button>
                                        <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-heart"></span></button>                           
                                    </div> 
                                </div>
                            </div>
                        </div>

                    </div>                      
                </div>              
            </div>

            <div class="col-xs-12 col-md-12">
                <div class="col-xs-12 col-md-8">
                    <h3>Sign up to our e-mail </h3>
                    <form class="form-inline" role="form">
                        <div class="form-group btn-group-xs">
                            <label class="sr-only" for="exampleInputEmail2">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
                            <button type="button" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="col-xs-12 col-md-4">
                    <h3>Get Social, Follow us on </h3>
                    <ul class="icons">
                        <li class="myicon-facebook"></li>
                        <li class="myicon-twitter"></li>
                        <li class="myicon-youtube"></li>
                    </ul> 
                </div>            
            </div>
            <br>

            <div class="col-xs-12 col-md-12">
                <div class="col-xs-3 col-md-3">
                    <p><a href="<?php echo site_url() . '/contact'; ?>">Hubungi kami</a></p>
                </div>
                <div class="col-xs-3 col-md-3">
                    <p><a href="<?php echo site_url() . '/community'; ?>">Community</a></p>
                </div>
                <div class="col-xs-3 col-md-3">
                    <p><a href="<?php echo site_url() . '/stockist'; ?>">Locate Stockist</a></p>
                </div>
                <div class="col-xs-3 col-md-3">
                    <p><a href="<?php echo site_url() . '/howdo'; ?>">How do i join? </a></p>
                </div>
            </div>
        </div> <!-- End rows -->

        <hr>

        <footer>
            <p>Copyright &copy; PT K-Link Indonesia 2014</p>
        </footer>
    </div>  --><!-- /container

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/holder.js"></script>
</body>
</html>
