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
                        <p class="text-info"><?php echo anchor('http://k-cashonline.com', 'Service'); ?> | <a href="<?php echo site_url() . '/blog'; ?>">Blog </a> | <a href="<?php echo site_url() . '/contact'; ?>">Contact us </a> | <?php echo anchor('http://www.k-link.co.id/community/', 'Community'); ?> | <a href="<?php echo site_url() . '/stockist'; ?>">Locate Stockist</a> | <?php echo anchor('https://www.k-linkindo.com/', 'Distributor Login'); ?></p>
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
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <?php
                        if (count($slideShow) > 0):

                            reset($slideShow);
                            $firstKey = key($slideShow);

                            foreach ($slideShow as $key => $val):

                                if ($key == $firstKey):
                                    echo "<div class=\"item active\">";
                                else:
                                    echo "<div class=\"item\">";
                                endif;
                                ?>
                                <a href="<?php echo site_url() . '/promotion/det/' . $val->id . '/' . url_title($val->title); ?>">
                                    <img class="img-responsive" src="<?php echo base_url() . 'upload/slideshow/original/' . $val->image; ?>" alt="<?php $val->title ?>">                
                                </a>        
                            </div>                                
                            <?php
                        endforeach;
                    endif;
                    ?>
                </div>
            </div>                  
        </div>  
    </div>

    <!-- Example row of columns -->
    <div class="row">
        <br>
        <div class="col-xs-12 col-md-8">
            <div class="panel panel-success">
                <div class="panel-heading">Promotion</div>
                <div class="panel-body ">                        
                    <div class="row">
                        <?php
                        if (count($promo) > 0):
                            foreach ($promo as $row):
                                ?>
                                <div class="clear-up col-xs-6 col-md-6">
                                    <a href="<?php echo site_url() . '/promo/detail/' . $row->id . '/' . url_title($row->title); ?>">
                                        <img class="img-responsive" src="<?php echo base_url() . 'upload/promo/thumbnail/' . $row->image; ?>" alt="<?php echo $row->title; ?>">
                                    </a>
                                </div>                                
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </div>                        
                </div>
            </div>            
        </div>

        <div class="col-xs-12 col-md-4">
            <h2>News</h2>
            <?php
            if (count($latestNews) > 0):
                $row = $latestNews;

                echo "<p>" . word_limiter(humanize($row->title), 20) . "</p>" . "\n";
                echo "<p>" . strip_tags(word_limiter(humanize($row->news), 20)) . "</p>" . "\n";
                echo "<p>" . anchor('news/det/' . $row->id . '/' . url_title($row->title), "View details &raquo;", array('class' => 'btn btn-default btn-xs')) . "</p>";
            endif;
            ?>            
            <h2>Success Stories</h2>
            <?php
            if (count($latestSuccess) > 0):
                $row = $latestSuccess;

                echo "<p>" . strip_tags(word_limiter(humanize($row->bl_quote), 20)) . " ~ " . $row->bl_name . "</p>" . "\n";
                echo "<p>" . anchor('successstories/det/' . $row->id . '/' . url_title($row->bl_title), "View details &raquo;", array('class' => 'btn btn-default btn-xs')) . "</p>";
            endif;
            ?>            
            <h2>Testimonials</h2>          
            <?php
            if (count($latestTesti) > 0):
                $row = $latestTesti;

                echo "<p>" . word_limiter(humanize($row->testimonial), 20) . " ~ " . $row->name . "</p>" . "\n";
                echo "<p>" . anchor('product/det/' . $row->pid, "View details &raquo;", array('class' => 'btn btn-default btn-xs')) . "</p>";
            endif;
            ?>
        </div>

        <br>
        <div class="col-xs-12 col-md-8">
            <div class="panel panel-success">
                <div class="panel-heading">Product</div>
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
            <!-- <h2>Address</h2> -->
            <address>
                <img class="img-icon img-circle img-responsive" src="<?php echo base_url(); ?>images/ngedung.jpg" alt="Responsive image">
                <h4>PT. K-LINK</h4>          
                <address>K-LINK TOWER, JL.Gatot Subroto Kav. 59 A, Jakarta Selatan 12950 - Indonesia
                    <ul class="address">
                        <li><span class="glyphicon glyphicon-earphone"></span> Tel. 021.290.27.000</li>
                        <li><span class="glyphicon glyphicon-phone-alt"></span> Fax. 021.290.27.001 - 290.27.004 </li>            
                    </ul>
<!--                    <p>Business Hour</p>
                    <ul class="address">            
                        <li><span class="glyphicon glyphicon-time"></span> Monday - Friday : 10:00AM until 18:00PM</li>
                        <li><span class="glyphicon glyphicon-time"></span> Saturday : 10:00AM until 14:00PM</li>
                    </ul> -->
                </address>
        </div>

        <div class="col-xs-12 col-md-12">
            <hr class="featurette-divider">
            <div class="col-xs-12 col-md-8">
                <h3>Sign up to our e-mail </h3>
                <form class="form-inline" role="form">
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
                        <button type="button" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-xs-12 col-md-4">
                <h3>Get Social, Follow us on </h3>
                <ul class="list-unstyled list-inline">                    
                    <li><?php echo anchor('https://www.facebook.com/pages/AP-K-Link-Indonesia/154582434691756', '<i class="fa fa-2x fa-facebook-square text-info"></i>'); ?></li>
                    <li><?php echo anchor('https://twitter.com/anpklinkindo', '<i class="fa fa-2x fa-twitter-square text-primary"></i>'); ?></li>
                    <li><?php echo anchor('http://www.youtube.com/channel/UC1YLBuEkJLzocmc_yp5Pgvw', '<i class="fa fa-2x fa-youtube-square text-danger"></i>'); ?></li>                    
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

    </div> <!-- rows -->


    <hr>

    <footer>
        <p style="text-align: center;" >Copyright &copy;2014 -  PT K-Link Indonesia - <?php echo anchor('/syariah','MLM Bersistem Syariah') ?> -<?php echo anchor('/disclaimer','Disclaimer') ?> - <?php echo anchor('http://www.apli.co.id','APLI Register No:0069/04/03'); ?></p>
    </footer>
</div> <!-- /container -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>js/holder.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.easyPaginate.js"></script>
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

