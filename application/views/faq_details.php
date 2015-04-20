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
						echo form_open('Pencarian/cariData', $attributes);
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
                        <?php
                        if (count($mHeader) > 0):
                            foreach ($mHeader->result() as $hMenu):

                                if ($hMenu->menu_url == null):
                                    echo "<li>" . anchor($hMenu->menu_url, $hMenu->menu_title) . "\n";
                                else:
                                    echo "<li class='dropdown'>" . "\n";
                                    echo "<a class='dropdown-toggle' data-toggle='dropdown' href=" . site_url() . "/" . $hMenu->menu_url . ">" . $hMenu->menu_title . "<b class=\"caret\"></b> </a>" . "\n";
                                endif;

                                if (count($mChild) > 0):
                                    echo "<ul class='dropdown-menu'>" . "\n";
                                    foreach ($mChild->result() as $cMenu):
                                        if ($hMenu->menu_category == $cMenu->menu_category):
                                            echo "<li>" . anchor($cMenu->menu_url, $cMenu->menu_title) . "</li>" . "\n";
                                        endif;
                                    endforeach;
                                    echo "</ul>" . "\n";
                                endif;

                                echo "</li>" . "\n";
                            endforeach;
                        endif;
                        ?> 
                    </ul>             
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="page-header">
                    <h1>Frequently Asked Questions</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <img class="img-responsive" src="<?php echo base_url(); ?>images/faq.jpg" alt="Stockist Logo">
            </div>
        </div>
        <br>    
        <hr class="featurette-divider">
        <div class="row featurette">
            <div class="row">
                <?php
                foreach ($question as $que):
                    ?>
                    <div class="col-md-12">                    
                        <div class="col-md-1">            
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-square-o fa-stack-2x"></i>
                                <i class="fa fa-stack-1x">Q</i>
                            </span>          
                        </div>                    
                        <div class="col-md-9">
                            <p class="lead text-info">Question #. <?php echo $que->id; ?> <?php echo strip_tags($que->question); ?></p>
                        </div>
                    </div> 

                    <div class="col-md-12">                            
                        <div class="col-md-1">            
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-square-o fa-stack-2x"></i>
                                <i class="fa fa-stack-1x">A</i>
                            </span>            
                        </div>
                        <div class="col-md-9">
                            <?php
                            foreach ($answer as $ans):
                                if ($que->id == $ans->qid):
                                    ?>
                                    <p><?php echo $ans->answer; ?></p>
                                </div>
                                <div class="col-md-9">
                                    <div id="sosmed" data-url="<?php echo current_url(); ?>" data-text="<?php echo humanize($que->question); ?>" data-title="Share"></div>
                                </div>
                            </div>
                            <?php
                        endif;
                    endforeach;
                endforeach;
                ?>            
            </div>   
            <hr class="featurette-divider">
            <div class="col-xs-12 col-md-12">
                <div class="col-xs-12 col-md-8">
                    <h3>Sign up to our e-mail </h3>
                    <form action="//k-link.us9.list-manage.com/subscribe/post?u=47314fe9f13048a3b7ae50701&amp;id=98e8200075" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate form-inline" target="_blank" novalidate>                        
                        <div class="form-group">
                            <input class="form-control" type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required >
                            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        </div>
                        <div class="form-group">
                            <div style="position: absolute; left: -5000px;"><input type="text" name="b_47314fe9f13048a3b7ae50701_98e8200075" class="form-control" tabindex="-1" value=""></div>
                            <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-primary"></div>
                        </div>
                    </form>
                </div>
                <div class="col-xs-12 col-md-4">
                    <h3>Get Social, Follow us on </h3>
                    <ul class="list-unstyled list-inline">                    
                        <li><?php echo anchor('https://www.facebook.com/pages/AP-K-Link-Indonesia/154582434691756', '<i class="fa fa-2x fa-facebook-square text-info"></i>'); ?></li>
                        <li><?php echo anchor('https://twitter.com/anpklinkindo', '<i class="fa fa-2x fa-twitter-square text-primary"></i>'); ?></li>
                        <li><?php echo anchor('http://www.youtube.com/channel/UC1YLBuEkJLzocmc_yp5Pgvw', '<i class="fa fa-2x fa-youtube-square text-danger"></i>'); ?></li>                    
                        <li><?php echo anchor('http://instagram.com/klink_indonesia_official?ref=badge', '<i class="fa fa-2x fa-instagram text-primary"></i>'); ?></li>
                        <li><script src="//platform.linkedin.com/in.js" type="text/javascript">
                            lang: in_ID
                            </script>
                            <script type="IN/FollowCompany" data-id="3876026" data-counter="none"></script></li>

                    </ul>  
                </div>            
            </div>
            <br>
            <div class="col-xs-12 col-md-12">
                <div class="col-xs-3 col-md-3">
                    <p><a href="<?php echo site_url() . '/contact'; ?>">Hubungi kami</a></p>
                </div>
                <div class="col-xs-3 col-md-3">
                    <?php echo anchor('http://www.k-link.co.id/community/', 'Community'); ?>
                </div>
                <div class="col-xs-2 col-md-2">
                    <p><a href="<?php echo site_url() . '/stockist'; ?>">Locate Stockist</a></p>
                </div>
                <div class="col-xs-2 col-md-2">
                    <p><a href="<?php echo site_url() . '/howdo'; ?>">How do i join? </a></p>
                </div>
                <div class="col-xs-2 col-md-2">
                    <p><a href="<?php echo site_url() . '/career'; ?>">Career </a></p>
                </div>
            </div>        
        </div> <!-- End rows -->
        <hr>
        <footer>
            <p style="text-align: center;" >Copyright &copy;2014 -  PT K-Link Indonesia - <?php echo anchor('/syariah', 'MLM Bersistem Syariah') ?> -<?php echo anchor('/disclaimer', 'Disclaimer') ?> - <?php echo anchor('http://www.apli.co.id', 'APLI Register No:0069/04/03'); ?></p>
        </footer>
    </div> <!-- End Container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.sharrre.js"></script>
    <script>
                            $('#sosmed').sharrre({
                                share: {
                                    googlePlus: true,
                                    facebook: true,
                                    twitter: true,
                                    linkedin: true,
                                    pinterest: true
                                },
                                buttons: {
                                    googlePlus: {size: 'tall', annotation: 'bubble'},
                                    facebook: {layout: 'box_count'},
                                    twitter: {count: 'vertical', via: 'ANPKLinkindo'}
                                },
                                hover: function(api, options) {
                                    $(api.element).find('.buttons').show();
                                },
                                hide: function(api, options) {
                                    $(api.element).find('.buttons').hide();
                                },
                                enableTracking: true
                            });
    </script>
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-54221164-1', 'auto');
        ga('send', 'pageview');

    </script>
</body>
</html>
