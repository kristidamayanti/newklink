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
                    <h1><i class="fa fa-tag fa-2x text-primary"></i> Promotion</h1>
                </div>
            </div>
            <?php
            if (isset($promo)):
                $row = $promo;
            endif;
            ?>
            <div class="col-xs-12 col-md-12">
                <br>            
                <br>
                <div class="row">
                    <div class="col-xs-2 col-md-2">
                        <span class="fa-stack fa-3x">
                            <i class="fa fa-calendar-o fa-stack-2x"></i>
                            <strong class="fa-stack-1x calendar-text">
                                <?php
                                if (!empty($row->createdt)):
                                    echo date('d', strtotime($row->createdt));
                                endif;
                                ?>
                            </strong>
                        </span>
                        <p>
                            <?php
                            if (!empty($row->createdt)):
                                echo date('F Y', strtotime($row->createdt));
                            endif;
                            ?>
                        </p>
                    </div>                                   
                    <div class="col-xs-10 col-md-10">                  
                        <h2>
                            <?php
                            if (!empty($row->title)):
                                echo $row->title;
                            endif;
                            ?>
                        </h2>
                        <?php
                        if (!empty($row->image)):
                            $image_properties = array(
                                'src' => 'upload/promo/original/' . $row->image,
                                'alt' => $row->title,
                                'class' => 'img-responsive',
                                'title' => $row->title,
                                'rel' => 'lightbox',
                            );

                            echo img($image_properties);
                        endif;
                        ?>
                    </div>
                    <div class="col-xs-2 col-md-2"></div>                                   
                    <div class="col-xs-10 col-md-10"> 
                        <br>                 
                        <p>
                            <?php
                            if (!empty($row->description)):
                                echo $row->description;
                            endif;
                            ?>
                        </p>
                        <br>
                        <div id="sosmed" data-url="<?php echo current_url(); ?>" data-text="<?php echo humanize($row->title); ?>" data-title="Share"></div>
                    </div>
                    <div class="col-xs-12 col-md-12"><h2>Others Promo You May Like</h2></div>
                    <?php
                    if (count($AllPromo) > 0):
                        foreach ($AllPromo as $promoRow):

                            $imgPromo = array(
                                'src' => 'upload/promo/original/' . $promoRow->image,
                                'alt' => $promoRow->title,
                                'class' => 'img-responsive',
                                'title' => $promoRow->title,
                                'width' => 344,
                                'height' => 180
                            );
                            
                            ?>
                            <div class="clear-up col-xs-12 col-md-4">
                                <?php 
                                $a = site_url().'/promo/detail/'.$promoRow->id.'/'.  url_title($promoRow->title);
                                
                                echo "<a href=".$a.">".img($imgPromo)."</a>";
                                ?>
                            </div>
                            <?php
                        endforeach;
                    endif;
                    ?>                                     

                </div>
				<br><br>
            </div>
           