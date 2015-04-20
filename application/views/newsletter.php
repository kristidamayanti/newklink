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
                        <p class="text-info"><a href="<?php echo site_url() . '/store'; ?>"><i class="fa fa-shopping-cart"></i> Web Store </a>|<?php echo anchor('http://k-cashonline.com', 'Service'); ?> | <a href="<?php echo site_url() . '/blog'; ?>">Blog </a> | <a href="<?php echo site_url() . '/contact'; ?>">Contact us </a> | <?php echo anchor('http://www.k-link.co.id/community/', 'Community'); ?> | <a href="<?php echo site_url() . '/stockist'; ?>">Locate Stockist</a> | <?php echo anchor('https://www.k-linkindo.com/', 'Distributor Login'); ?> | <a href="<?php echo site_url() . '/career'; ?>">Career |</a><a class="" href="<?php echo site_url() . '/rss_feeds'; ?>">RSS <i class="fa fa-rss"></i> </a></p>
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
        <?php
        if (count($blogDet) > 0):
            $row = $blogDet;
        endif;
        ?>
        <div class="row">
            <div class="col-xs-12 col-md-12">                
                <div class="col-xs-12 col-md-9 col-md-push-2">                    
                    <div class="row">
                        <div class="col-xs-2 col-md-2">
                            <span class="fa-stack fa-3x">
                                <i class="fa fa-calendar-o fa-stack-2x"></i>
                                <strong class="fa-stack-1x calendar-text"><?php echo date('d', strtotime($row->createdt)); ?></strong>                                
                            </span>
                            <p class="text-muted text-left"><?php echo date('M Y', strtotime($row->createdt)); ?></p>
                        </div>                                   
                        <div class="col-xs-9 col-md-9">
                            <?php
                            if (strlen($row->bl_profilepict) == 0): 
                                $pp = "bloglogo.jpg";
                                $bl_name = "logo";
                            else:
                                $pp = $row->bl_profilepict;
                                $bl_name = $row->bl_name;                                
                            endif;                            
                            ?>                            
                            <h1><?php echo $row->bl_title; ?></h1>
                            <img class="featurette-image img-responsive" src="<?php echo base_url() . 'upload/blog/thumbnail/' . $pp; ?>" alt="<?php echo $bl_name; ?>">
                            <br>
                            <h3><?php echo $row->bl_title; ?></h3>
                            <p><?php echo $row->bl_content; ?></p>
                            <br>
                            <div id="sosmed" data-url="<?php echo current_url(); ?>" data-text="<?php echo humanize($row->bl_title); ?>" data-title="Share"></div>
                        </div> 
                        <br>                                                 
                    </div>                            

                </div>                
            </div>            

