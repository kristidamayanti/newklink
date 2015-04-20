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
                    <?php
                    if (count($selStories) > 0):
                        $row = $selStories;
                    endif;
                    ?>                    
                    <h1> <?php echo $row->bl_name; ?> <small>Success Stories</small></h1>
                </div>
            </div>

            <div class="col-xs-11 col-md-11">

                <div class="row featurette">
                    <div class="col-md-5">
                        <img class="featurette-image img-responsive" src="<?php echo base_url() . 'upload/blog/thumbnail/' . $row->bl_profilepict; ?>" alt="<?php echo $row->bl_name; ?>">
                        <br>
                        <ul class="list-unstyled">
                            <?php
                            if (strlen($row->bl_fb) > 2):
                                echo "<li><i class=\"fa fa-facebook-square fa-2x text-primary\"></i> $row->bl_fb</li>";
                            endif;

                            if (strlen($row->bl_twitter) > 2):
                                echo "<li><i class=\"fa fa-twitter-square fa-2x text-primary\"></i> $row->bl_twitter</li>";
                            endif;
                            ?>                            
                        </ul> 
                    </div>
                    <div class="col-md-7">
                        <i class="fa fa-quote-left fa-3x pull-left text-info"></i><h2 class="featurette-heading"><span class="text-muted"><?php echo $row->bl_name; ?></span></h2>
                        <p class="lead"><?php echo $row->bl_quote; ?></p><i class="fa fa-quote-right pull-right fa-3x text-info"></i>

                    </div>
                </div>

                <hr class="featurette-divider">

                <div class="row">
                    <div class="col-md-8">                        
                        <p class="lead"><?php echo $row->bl_content; ?></p>
                        <div id="sosmed" data-url="<?php echo current_url(); ?>" data-text="<?php echo humanize($row->bl_quote); ?>" data-title="Share"></div>
                    </div>
                    <div class="col-md-4">
                        <h2>Other Success Stories</h2>
                        <?php
                        if (count($allStories) > 0):
                            foreach ($allStories as $row):
                                ?>
                                <h3 class="text-center"><?php echo anchor('successstories/det/' . $row->id . '/' . url_title($row->bl_title), $row->bl_name); ?></h3>
                                <blockquote class="blockquote-reverse success">
                                    <p><?php echo word_limiter($row->bl_quote, 17) ?></p>
                                    <footer><?php echo $row->bl_name; ?></footer>
                                </blockquote>

                                <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>          

                <hr class="featurette-divider">

                <div class="row featurette">
                    <div class="col-xs-6 col-md-3">
                        <h2>Gallery</h2>
                    </div> 
                    <?php
                    if (count($allPict) > 0):
                        foreach ($allPict as $row):
                            ?>                    
                            <div class="col-xs-6 col-md-3">
                                <a href="#" class="thumbnail">
                                    <img src="<?php echo base_url() . 'upload/blog/thumbnail/' . $row->image; ?>" alt="<?php echo $row->title; ?>">
                                </a>
                            </div>                        
                            <?php
                        endforeach;
                    endif;
                    ?>
                </div> 
            </div>  