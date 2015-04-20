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
                    <h1><i class="fa fa-map-marker"></i> Stockist Locator</h1>
                </div>
            </div>
        </div>
<!--        <div class="row">
            <div class="col-xs-12 col-md-12">
                <img src="holder.js/1140x200" alt="Stockist Logo">
            </div>
        </div>-->
        <div class="row">      
            <div class="col-xs-12 col-md-4">
                <br>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-info">
                        <h3>Area Based</h3>
                    </a>
                    <?php
                    if (count($area) > 0):
                        foreach ($area as $row):
                            ?>
                            <a href="<?php echo site_url() . '/stockist/area/' . $row->id ?>" class="list-group-item"><?php echo $row->areaname; ?></a>                            
                            <?php
                        endforeach;
                    endif;
                    ?>
                </div> 
            </div>
            <div class="col-xs-12 col-md-8">
                <br>
                <?php
                if (count($stockis) > 0):
                    foreach ($stockis as $row):
                        ?>

                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-xs-12 col-md-8">
                                    <h4><?php echo $row->sname . ' ~ ' . $row->scode . " "; ?><?php
                                        if ($row->online == 1): echo " <i class=\"fa fa-globe text-info\"></i>";
                                        endif;
                                        ?></h4>
                                    <address>
                                        <strong><i class="fa fa-map-marker"></i> <?php echo humanize($row->type); ?></strong><br>
                                        <?php echo $row->address; ?><br>
                                        <?php echo $row->city; ?><br>
                                        <?php echo $row->country; ?><br>
                                        <?php echo $row->zipcode; ?><br>
                                        <abbr title="Phone"><i class="fa fa-phone"></i> </abbr> <?php echo $row->phone; ?> <br>
                                        <abbr title="Fax"><i class="fa fa-fax"></i> </abbr> <?php echo $row->fax; ?>
                                    </address>
                                </div>
                                <div class="col-xs-4 col-md-4">
                                    <div class="thumbnails">
                                        <?php
                                        $image_properties = array(
                                            'src' => 'upload/office/original/'.$row->image,
                                            'alt' => $row->sname,
                                            'class' => 'img-responsive',
                                        );

                                        echo img($image_properties);
                                        ?>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
            <div class="col-xs-12 col-md-12">
                <hr>
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
                        <li><?php echo anchor('https://www.facebook.com/anp.klink', '<i class="fa fa-2x fa-facebook-square text-info"></i>'); ?></li>
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
            <p style="text-align: center;" >Copyright &copy;2014 -  PT K-Link Indonesia - <?php echo anchor('/syariah','MLM Bersistem Syariah') ?> -<?php echo anchor('/disclaimer','Disclaimer') ?> - <?php echo anchor('http://www.apli.co.id','APLI Register No:0069/04/03'); ?></p>
        </footer>
    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/holder.js"></script>
</body>
</html>
