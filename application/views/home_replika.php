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
            <div class="col-xs-3 col-md-3">
                <img src="<?php echo base_url(); ?>images/logo4.png" alt="K-Link Logo">            
            </div>
            <div class="col-xs-8 col-md-8">
                <div class="row">
                    <div class="col-xs-8 col-md-8">
                        <p class="text-info"> </p>
                    </div>
                    <div class="col-xs-8 col-md-8 pull-right">
                        <p class="text-info"><?php echo anchor('http://k-cashonline.com', 'Service'); ?> | <a href="<?php echo site_url() . '/blog'; ?>">Blog </a> | <a href="<?php echo site_url() . '/contact'; ?>">Contact us </a> | <?php echo anchor('http://www.k-link.co.id/community/', 'Community'); ?> | <a href="<?php echo site_url() . '/stockist'; ?>">Locate Stockist</a> | <?php echo anchor('https://www.k-linkindo.com/', 'Distributor Login'); ?> | <a href="<?php echo site_url() . '/career'; ?>">Career </a></p>
                    </div>
                    <div class="col-xs-8 col-md-8 pull-right">
                        <form class="form-inline" role="form">
                            <div class="form-group">
                                <label class="sr-only" for="search-articel">Look for..</label>
                                <input type="email" class="form-control" id="search-articel" placeholder="Articel / Item">
                                <button type="button" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
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
    </div>
    <div class="container">        
        <div class="row">
            <br>
            <div class="col-xs-12 col-md-12">
                <img class="img-responsive" src="<?php echo base_url()?>images/banner-replica.jpg">
                <br>
            </div>
            <div class="col-xs-12 col-md-12">
                <div class="col-xs-12 col-md-8">                
                    <div class="jumbotron">
                        <h1>Welcome Message!</h1>
                        <p>Eu option ancillae vim, aliquam democritum sed ad. Id graeco denique argumentum est, aliquam consequat voluptaria et sea. Est habeo utinam molestiae in. Porro inimicus indoctum ut his.</p>                    
                        <blockquote>
                            <p>Editable Quote's, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        </blockquote>
                        <p>Ei nam iudico decore eirmod, sit ut illud dicam fastidii. Usu te vocent vidisse dissentias. In vidit doctus iisque vis, ea usu verear percipit. Ut erant insolens philosophia duo. Ut nam ceteros imperdiet. Mel id noster persius, molestiae definitiones ex pro, ea eum facilis efficiantur mediocritatem</p>                    
                    </div>                                           
                </div>

                <div class="col-xs-12 col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Belanja Online Bersama Kami</div>
                        <div class="panel-body">
                            <ul class="list-unstyled">
                                <li>Nyaman</li> 
                                <li>Mudah</li> 
                                <li>Terpercaya</li>
                            </ul>
                            <button type="button" class="btn btn-primary btn-lg"> Belanja Sekarang</button>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">Bergabung dengan Kami</div>
                        <div class="panel-body">
                            <p>Ei nam iudico decore eirmod, sit ut illud dicam fastidii. Usu te vocent vidisse dissentias. In vidit doctus iisque vis</p>
                            <button type="button" class="btn btn-primary btn-lg"> Bergabung Sekarang</button>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">Hubungi Saya</div>
                        <div class="panel-body">
                            <address>
                                <strong>Mr Robert P</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                <a href="mailto:#">first.last@example.com</a>
                                <abbr title="Phone">P:</abbr> (123) 456-7890                            
                            </address>
                            <i class="fa fa-facebook-square text-info fa-2x"></i>
                            <i class="fa fa-twitter-square text-primary fa-2x "></i>
                            <i class="fa fa-youtube-square text-danger fa-2x "></i>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <div class="col-xs-12 col-md-12">
                <div class="col-xs-4 col-md-4 ">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Promo Bulan ini</div>
                        <div class="panel-body">
                            <?php
                            if (count($promo) > 0):
                                foreach ($promo as $row):
                                    ?>                                    
                                    <a href="<?php echo site_url() . '/promo/detail/' . $row->id . '/' . url_title($row->title); ?>">
                                        <img class="img-responsive" src="<?php echo base_url() . 'upload/promo/thumbnail/' . $row->image; ?>" alt="<?php echo $row->title; ?>">
                                    </a>                                    
                                    <?php
                                endforeach;
                            endif;
                            ?>
                        </div> 
                    </div> 
                </div>
                <div class="col-xs-4 col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading"> Youtube Channel <span class="fa fa-youtube-square text-danger fa-2x pull-right"></span></div>
                        <div class="panel-body">
                            <div class="embed-responsive embed-responsive-4by3">
                                <iframe class="embed-responsive-item" width="324" height="166" src="//www.youtube.com/embed/Cd8bIubjtSw" frameborder="0" allowfullscreen></iframe>
                            </div>                        
                        </div> 
                    </div> 
                </div>
                <div class="col-xs-4 col-md-4 ">
                    <div class="panel panel-primary">
                        <div class="panel-heading"> Testimoni <span class="fa fa-bullhorn text-info fa-2x pull-right"></span></div>
                        <div class="panel-body row-promo">
                            <?php
                            if (count($latestTesti) > 0):
                                $row = $latestTesti;

                                echo "<h4 class='text-center'>" . word_limiter(humanize($row->testimonial), 20) . " ~ " . $row->name . "</h4>" . "\n";                                
                            endif;
                            ?>
                        </div> 
                    </div> 
                </div>
            </div>
            <br>
            <div class="col-xs-12 col-md-12">
                <div class="col-xs-12 col-md-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Our Product Line</div>
                        <div id="productpaging" class="panel-body">
                            <ul>
                                <?php
                                if (sizeof($prodGrup) > 0):
                                    foreach ($prodGrup as $row):
                                        $more = "<a href=" . site_url() . "/product/det/" . $row->id . " class=\"btn btn-info center-block btn-xs btn\"><span class=\"glyphicon glyphicon-cloud\"></span> More</a>";
                                        ?>
                                        <li class="col-xs-4 col-md-4">
                                            <img class="img-responsive popup" src="<?php echo base_url() . 'upload/product/thumbnail/' . $row->image; ?>" alt="<?php $row->title; ?>" data-placement="top" data-toggle="popover" title="<?php echo $row->title; ?>" data-content="<?php echo strip_tags(word_limiter($row->description, 30)); ?>">
                                            <?php echo $more ?>
                                        </li>
                                        <?php
                                    endforeach;
                                endif;
                                ?>
                            </ul>
                        </div>
                    </div>            
                </div>

                <div class="col-xs-12 col-md-4">                 
                    <img class="img-icon img-circle img-responsive" src="<?php echo base_url(); ?>images/ngedung.jpg" alt="Responsive image">
                    <h4>PT. K-LINK</h4>          
                    <address>K-LINK TOWER, JL.Gatot Subroto Kav. 59 A, Jakarta Selatan 12950 - Indonesia
                        <ul class="address">
                            <li><span class="glyphicon glyphicon-earphone"></span> Tel. 021.290.27.000</li>
                            <li><span class="glyphicon glyphicon-phone-alt"></span> Fax. 021.290.27.001 - 290.27.004 </li>            
                        </ul>
                    </address>
                </div>
            </div>
            <div class="col-xs-12 col-md-12">
                <hr class="featurette-divider">
                <div class="col-xs-12 col-md-4">
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
                        <li><div class="g-follow" data-href="https://plus.google.com/115183062087900017478" data-annotation="vertical-bubble" data-height="20"></div></li>
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
                <div class="col-xs-3 col-md-3">
                    <p><a href="<?php echo site_url() . '/stockist'; ?>">Locate Stockist</a></p>
                </div>
                <div class="col-xs-2 col-md-2">
                    <p><a href="<?php echo site_url() . '/howdo'; ?>">How do i join? </a></p>
                </div>          
            </div>

        </div> <!-- rows -->
        <hr>
        <?php
        if (isset($nilai)):
            $total = $nilai->count;
        endif;
        ?>    
        <footer>
            <p style="text-align: center;" >Copyright &copy;2014 -  PT K-Link Indonesia - <?php echo anchor('/syariah', 'MLM Bersistem Syariah') ?> -<?php echo anchor('/disclaimer', 'Disclaimer') ?> - <?php echo anchor('http://www.apli.co.id', 'APLI Register No:0069/04/03'); ?> - Total Hits <?php echo $total ?></p>
        </footer>
    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>js/asyncLoader.min.js"></script>
    <script src="<?php echo base_url(); ?>js/holder.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.easyPaginate.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script>
                            asyncLoader(
                                    [
                                        '<?php echo base_url(); ?>css/bootstrap.css',
                                        '<?php echo base_url(); ?>css/magic-bootstrap.css',
                                        '<?php echo base_url(); ?>css/style.css',
                                        '<?php echo base_url(); ?>css/alertify.css',
                                        '<?php echo base_url(); ?>css/fwa/css/font-awesome.css',
                                        '<?php echo base_url(); ?>css/lightbox.css',
                                        '<?php echo base_url(); ?>js/bootstrap.min.js'
                                    ],
                                    {
                                        'callback': function() {
                                            $('body').fadeIn(500);
                                            $('#carousel-example-generic').delay(800).fadeIn();
                                        }
                                    }
                            );
    </script>
    <script>
        $('#productpaging').easyPaginate({
            paginateElement: 'li',
            elementsPerPage: 3,
            nextButton: false,
            prevButton: false,
            firstButtonText: '<i class="fa text-primary fa-2x fa-arrow-circle-left"></i>',
            lastButtonText: '<i class="fa text-primary fa-2x fa-arrow-circle-right"></i>'
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

<!-- NAVBAR
==

