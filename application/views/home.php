<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&appId=462249443911585&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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
    <hr class="featurette-divider">

    <!-- Example row of columns -->
    <div class="row">
        
        <!--sidebar-->
        <div class="col-xs-12 col-md-4 clear-padding-right">
        <!--search box-->
        <div class="col-xs-12 col-md-12">
        <div class="panel panel-success" style="border-radius:80px 0px 2px 2px;">
                <div class="panel-promo">
                	<img class="img-responsive" src="<?php echo base_url() . 'images/header-search.jpg' ?>" alt="K-Link Indonesia">
                </div>
                <div style="margin:0px 5% 20px;">
            	<h3 style="color:#1c974e;"><p class="text-center">Search For an Article? </p></h3>
                <?php					
						$attributes = array("class" => "validate form-inline", "id" =>"loginform", "name" => "loginform", "target"=>"_blank");
						echo form_open('pencarian/cariData', $attributes);
				?>
                <div class="form-group">
							<input class="form-control" type="text" name="search" placeholder="Type Keywords" >
							<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
						</div>
						<div class="form-group">
						<select class="form-option" name="jenis">
						  <option> - </option>
						  <option value="product">Product</option>
						  <option value="news">News</option>
						  <option value="blog">Blog</option>
						</select>
						
						<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
						</div>
						<div class="form-group">
							<div style="position: absolute; left: -5000px;"><input type="text" name="" class="form-control" tabindex="-1" value=""></div>
							<div class="clear"><input type="submit" value="Go" name="" id="" class="btn btn-search"></div>
						</div>
					<?php echo form_close();?>
                </div>
            </div>
        </div>
        <!--search box-->
        
        <!--news box-->
        <div class="col-xs-12 col-md-12">
        	<div class="panel panel-success" style="border-radius:80px 0px 2px 2px;">
                <div class="panel-promo">
                	<img class="img-responsive" src="<?php echo base_url() . 'images/header-news.jpg' ?>" alt="K-Link Indonesia">
                </div>
            <?php
            if (count($latestNews) > 0):
                $row = $latestNews;

                $imgprop = array(
                    'src' => 'upload/news/thumbnail/' . $row->image,
                    'alt' => $row->title,
                    'width' => '325',
                    'height' => '170',
                );

                echo "<div class='row'>";
				echo "<div class='col-md-11' style='margin:5px 0px 0px 15px; padding-right:20px;'>";
                echo "<p>";
                echo img($imgprop);
                echo "</p>";
                echo "<p>";
                echo "<p>" . word_limiter($row->title, 20) . "</p>" . "\n";
                echo "<p>" . strip_tags(word_limiter(humanize($row->news), 20)) . "</p>" . "\n";
                echo "<p>" . anchor('news/det/' . $row->id . '/' . url_title($row->title), "Read More &raquo;", array('class' => 'btn btn-default btn-xs')) . "</p>";
                echo "</p>";
                echo "</div>";
				echo "</div>";
            endif;
            ?> 
            </div>
        </div> 
        <!--search box-->
        
        <!--stories box-->
        <div class="col-xs-12 col-md-12">
        	<div class="panel panel-success" style="border-radius:80px 0px 2px 2px;">
                <div class="panel-promo">
                	<img class="img-responsive" src="<?php echo base_url() . 'images/header-stories.jpg' ?>" alt="K-Link Indonesia">
                </div>
            <?php
            if (count($latestSuccess) > 0):
                $row = $latestSuccess;
                $imgprop = array(
                    'src' => 'upload/blog/thumbnail/' . $row->bl_profilepict,
                    'alt' => $row->bl_name,
                    'width' => '325',
                    'height' => '170',
                );

                echo "<div class='row'>";
                echo "<div class='col-md-11' style='margin:5px 0px 0px 15px; padding-right:20px;'>";
                echo "<p>";
                echo img($imgprop);
                echo "</p>";
                echo "<p>";
                echo "<p>" . strip_tags(word_limiter(humanize($row->bl_quote), 20)) . " ~ " . $row->bl_name . "</p>" . "\n";
                echo "<p>" . anchor('successstories/det/' . $row->id . '/' . url_title($row->bl_title), "Read More &raquo;", array('class' => 'btn btn-default btn-xs')) . "</p>";
                echo "</p>";
                echo "</div>";
				echo "</div>";
            endif;
            ?>            
            </div>
        </div>
        <!--stories box-->
        
        <!--testimonial box-->
        <div class="col-xs-12 col-md-12">
        	<div class="panel panel-success" style="border-radius:80px 0px 2px 2px;">
                <div class="panel-promo">
                	<img class="img-responsive" src="<?php echo base_url() . 'images/header-testimonials.jpg' ?>" alt="K-Link Indonesia">
                </div>
                <div class="panel-body">         
					<?php
                    if (count($latestTesti) > 0):
                        $row = $latestTesti;
        
                        echo "<div class='col-md-12' style='margin:15px 0px 0px 15px; padding-right:20px;'>";
                        echo "<p>" . word_limiter(humanize($row->testimonial), 20) . "</br></br>" . "<em><strong style='color:#1c974e;'>" . $row->name . "</strong></em>" . "</p>" . "\n";
                        echo "<p></br></p>";
                        echo "<p>" . anchor('product/det/' . $row->pid, "Read More &raquo;", array('class' => 'btn btn-default btn-xs')) . "</p>";
                        echo "<p></p>";
                        echo "</div>";
                    endif;
                    ?>
           		</div>
        	</div>
        </div>
        <!--testimonial box-->  
        
        <!--quote box-->
        <!-- <div class="col-xs-12 col-md-12">
        	<div class="panel panel-success" style="border-radius:80px 0px 2px 2px;">
                <div class="panel-promo">
                	<img class="img-responsive" src="<?php echo base_url() . 'images/header-quotes.jpg' ?>" alt="K-Link Indonesia">
                </div>
                <div class="panel-body">         
					<?php
                    /*if (count($latestTesti) > 0):
                        $row = $latestTesti;
        
                        echo "<div class='col-md-12' style='margin:15px 0px 0px 15px; padding-right:20px;'>";
                        echo "<p>" . word_limiter(humanize($row->testimonial), 20) . "</br></br>" . "<em><strong style='color:#1c974e;'>" . $row->name . "</strong></em>" . "</p>" . "\n";
                        echo "<p></p>";  
                        echo "</div>";
                    endif;*/
                    ?>
           		</div>
        	</div>
        </div>
		-->
        <!--quote box-->  
        
        <!--facebook box-->
        <div class="col-xs-12 col-md-12">
        	<div class="panel panel-success" style="border-radius:80px 0px 2px 2px;">
                <div class="panel-promo">
                	<img class="img-responsive" src="<?php echo base_url() . 'images/header-fb.jpg' ?>" alt="K-Link Indonesia">
                </div>
                <div class="panel-body">
                	<div class="fb-like-box" data-href="https://www.facebook.com/pages/AP-K-Link-Indonesia/154582434691756" data-width="330" data-height="330" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="true" data-show-border="false"></div>
           		</div>
        	</div>
        </div>
        <!--facebook box--> 
        
        <!--twitter box-->
        <div class="col-xs-12 col-md-12">
        	<div class="panel panel-success" style="border-radius:80px 0px 2px 2px;">
                <div class="panel-promo">
                	<img class="img-responsive" src="<?php echo base_url() . 'images/header-tweet.jpg' ?>" alt="K-Link Indonesia">
                </div>
                <div class="panel-body">
                	<a class="twitter-timeline" href="https://twitter.com/Official_Klink" data-widget-id="567247833892274176">Tweets by @Official_Klink</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
           		</div>
        	</div>
        </div>
        <!--twitter box-->  
               
        </div>
        <!--sidebar-->
        
        <!--promo box-->
        <div class="col-xs-12 col-md-8">
            <div class="panel panel-success" style="border-radius:80px 0px 2px 2px;">
                <div class="panel-promo">
                	<img class="img-responsive" src="<?php echo base_url() . 'images/header-promo.jpg' ?>" alt="K-Link Indonesia">
                </div>
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
        <!--promo box-->
        
        <!--product box-->
        <div class="col-xs-12 col-md-8">
            <div class="panel panel-success" style="border-radius:40px 0px 2px 2px;">
                <div class="panel-promo">
                	<img class="img-responsive" src="<?php echo base_url() . 'images/header-product.jpg' ?>" alt="K-Link Indonesia">
                </div>
                <div id="productpaging" class="panel-body">
                    <ul>
                        <?php
                        if (sizeof($prodGrup) > 0):
                            foreach ($prodGrup as $row):
								$title = '<p align="center">'. $row->title.'</p>';
                                $more = "<a href=" . site_url() . "/product/det/" . $row->id . " class=\"btn btn-info center-btn btn-xs btn\"><span class=\"glyphicon glyphicon-cloud\"> </span> More</a>";
                                ?>
                                <li class="col-xs-4 col-md-4">
                                    <img class="img-responsive popup" src="<?php echo base_url() . 'upload/product/thumbnail/' . $row->image; ?>" alt="<?php $row->title; ?>" data-placement="top" data-toggle="popover" title="<?php echo $row->title; ?>" data-content="<?php echo strip_tags(word_limiter($row->description, 30)); ?>">
                                    <?php echo $title.$more ?>
                                </li>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </ul>
                </div>
            </div>            
        </div>
        <!--product box-->
		
        <div class="col-xs-12 col-md-8 clear-padding">
        <!--recipe box-->
        <div class="col-xs-12 col-md-6">
            <div class="panel panel-success" style="border-radius:40px 0px 2px 2px;">
                <div class="panel-promo">
                	<img class="img-responsive" src="<?php echo base_url() . 'images/header-recipe.jpg' ?>" alt="K-Link Indonesia">
                </div>
                <div class="panel-body">                    
                    <?php
                    if (isset($resep)):
                        $rowResep = $resep;
                    endif;
                    ?>
                    <h4><p class="text-center"><?php echo strip_tags($rowResep->bl_title) ?></p></h4>
                    <?php
                    if (strlen($rowResep->bl_profilepict) > 0):
                        $imgResep = array(
                            'src' => 'upload/blog/thumbnail/' . $rowResep->bl_profilepict,
                            'alt' => $rowResep->bl_title,
                            'class' => 'thumbnail img-responsive',
                        );

                        echo img($imgResep);
                    endif;
                    ?>
                    <p><?php echo strip_tags(word_limiter($rowResep->bl_content, 50)); ?></p>
                    <ul>
                        <?php
                        if (count($resepList) > 0):
                            foreach ($resepList as $vRes):
                                ?>
                                <li><?php echo anchor('blog/recipe/' . $vRes->id . '/' . url_title($vRes->bl_title), $vRes->bl_title); ?></li>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </ul>
                </div>                
            </div>            
        </div>
        <!--recipe box-->
        
        <!--fit box-->
        <div class="col-xs-12 col-md-6">        	
            <div class="panel panel-success" style="border-radius:40px 0px 2px 2px;">
                <div class="panel-promo">
                	<img class="img-responsive" src="<?php echo base_url() . 'images/header-fit.jpg' ?>" alt="K-Link Indonesia">
                </div>
                <div class="panel-body">                    
                    <?php
                    if (isset($health)):
                        $rowHealth = $health;
                    endif;
                    ?>
                    <h4><p class="text-center"><?php echo strip_tags($rowHealth->bl_title) ?></p></h4>
                    <?php
                    if (strlen($rowHealth->bl_profilepict) > 0):
                        $imgResep = array(
                            'src' => 'upload/blog/thumbnail/' . $rowHealth->bl_profilepict,
                            'alt' => $rowHealth->bl_title,
                            'class' => 'thumbnail img-responsive',
                        );

                        echo img($imgResep);
                    endif;
                    ?>
                    <p><?php echo strip_tags(word_limiter($rowHealth->bl_content, 50)); ?></p>
                    <ul>
                        <?php
                        if (count($healthList) > 0):
                            foreach ($healthList as $val):
                                ?>
                                <li><?php echo anchor('health/artno/' . $val->id . '/' . url_title($val->bl_title), $val->bl_title); ?></li>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </ul>
                </div>                
            </div>            
        </div>
        <!--fit box-->
        </div>
        
        <div class="col-xs-12 col-md-8 clear-padding">
        <!--syariah box-->
        	<div class="col-xs-12 col-md-6">
            <div class="panel panel-success" style="border-radius:80px 0px 2px 2px;">
                <div class="panel-promo">
                	<img class="img-responsive" src="<?php echo base_url() . 'images/header-syariah.jpg' ?>" alt="K-Link Indonesia">
                </div>
                <div class="panel-body">
                    <?php
                    if (isset($syariah)):
                        $rowSyariah = $syariah;
                    endif;
                    ?>
                    <h4><p class="text-center"><?php echo strip_tags($rowSyariah->bl_title) ?></p></h4><br><br>
					<?php
                    if (strlen($rowSyariah->bl_profilepict) > 0):
                        $imgResep = array(
                            'src' => 'upload/blog/thumbnail/' . $rowSyariah->bl_profilepict,
                            'alt' => $rowSyariah->bl_title,
                            'class' => 'thumbnail img-responsive',
                        );

                        echo img($imgResep);
                    endif;
                    ?>
                    <p><?php echo strip_tags(word_limiter($rowSyariah->bl_content, 50)); ?></p>
                    <ul>
                        <?php
                        if (count($syariahList) > 0):
                            foreach ($syariahList as $vSyariah):
                                ?>
                                <li><?php echo anchor('syariah/artno/' . $vSyariah->id . '/' . url_title($vSyariah->bl_title), $vSyariah->bl_title); ?></li>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </ul>
                </div>                
            </div>            
        </div>
        <!--syariah box-->
        
        <!--lifestyle box-->
        <div class="col-xs-12 col-md-6">
            <div class="panel panel-success" style="border-radius:80px 0px 2px 2px;">
                <div class="panel-promo">
                	<img class="img-responsive" src="<?php echo base_url() . 'images/header-lifestyle.jpg' ?>" alt="K-Link Indonesia">
                </div>
                <div class="panel-body">
                    <?php
                    if (isset($lifestyle)):
                        $rowLifestyle = $lifestyle;
                    endif;
                    ?>
                    <h4><p class="text-center"><?php echo strip_tags($rowLifestyle->bl_title) ?></p></h4><br><br>
					<?php
                    if (strlen($rowLifestyle->bl_profilepict) > 0):
                        $lifestyle = array(
                            'src' => 'upload/blog/thumbnail/' . $rowLifestyle->bl_profilepict,
                            'alt' => $rowLifestyle->bl_title,
                            'class' => 'thumbnail img-responsive',
                        );

                        echo img($lifestyle);
                    endif;
                    ?>
                    <p><?php echo strip_tags(word_limiter($rowLifestyle->bl_content, 50)); ?></p>
                    <ul>
                        <?php
                        if (count($lifestyleList) > 0):
                            foreach ($lifestyleList as $vLifestyle):
                                ?>
                                <li><?php echo anchor('lifestyle/artno/' . $vLifestyle->id . '/' . url_title($vLifestyle->bl_title), $vLifestyle->bl_title); ?></li>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </ul>
                </div>                
            </div>            
        </div>
        <!--lifestyle box-->
        </div>   
    </div>
    <!-- rows --> 
    
   