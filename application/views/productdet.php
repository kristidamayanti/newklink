<?php /*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ ?>
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
                    <h3>Products</h3>
                </div>
            </div>
            <div class="col-xs-12 col-md-12">
                <br>                    
                <div class="col-xs-12 col-md-8">
                    <?php
                    if (count($prodDet) > 0):
                        $row = $prodDet;
                    endif;
                    ?>
                    <h1 class="text-center text-success"><?php echo $row->title; ?></h1>
                    <div class="thumbnail thumbnail-product">
                        <?php
                        if (isset($row->image)):
                            echo "<img class=\"img-responsive\" src=" . base_url() . 'upload/product/original/' . $row->image . ">";
                        else:
                            echo "<img class=\"img-responsive\" src=\"holder.js/418x360\">";
                        endif;
                        ?>                        
                    </div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#desc" role="tab" data-toggle="tab"><i class="fa fa-bars"></i> Product Description</a></li>
                        <li><a href="#testi" role="tab" data-toggle="tab"><i class="fa fa-comments-o"></i> Testimonies</a></li>
                        <li><a href="#image" role="tab" data-toggle="tab"><i class="fa fa-photo"></i> Gallery</a></li>
                        <li><a href="#video" role="tab" data-toggle="tab"><i class="fa fa-youtube-square"></i> Video</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="desc">
                            <br>
                            <?php
                            echo $row->description;
                            ?>
                            <div id="sosmed" data-url="<?php echo current_url(); ?>" data-text="<?php echo $row->title; ?>" data-title="Share"></div>
                        </div>
                        <div class="tab-pane" id="testi">
                            <br>
                            <ol>
                                <?php
                                if (count($testiGrp) > 0):
                                    foreach ($testiGrp as $testi):
                                        if ($row->id == $testi->pid):
                                            ?>                                        
                                            <li><?php echo $testi->testimonial . " - " . $testi->name; ?></li>                                        
                                            <?php
                                        endif;
                                    endforeach;
                                else:
                                    echo "<p><i class='fa fa-bullhorn fa-2x'></i> There is no Testimonial yet be the first</p>";
                                endif;
                                ?>
                            </ol>
                            <div class="col-xs-12 col-md-12">
                                <hr>
                                <?php echo validation_errors(); ?>
                                <h3 class="text-info">Post New Testimonies</h3>
                                <div class="media">                                          
                                    <div class="media-body">
                                        <form id="Testimoni">
                                            <?php                                            
                                            echo form_hidden('pid_id', $row->id);
                                            ?>
                                            <div class="form-group">
                                                <label for="name">Your Name</label>
                                                <input id="name" type="text" name="name" autofocus required class="form-control nama" placeholder="Enter Your Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="location">Location</label>
                                                <input id="location" type="text" name="location" required class="form-control mlocation" placeholder="Enter Your Location">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Your Testimonies</label>
                                                <textarea id="testimonial" class="form-control testimonial" name="testimonial" required placeholder="Your Testimonial" rows="5"></textarea>
                                            </div>                                            
                                            <input id="testiBtn" type="button" class="btn btn-primary" value="Kirim">
                                        </form>
                                    </div>
                                </div> 
                            </div> 
                        </div>
                        <div class="tab-pane" id="image">
                            <div class="col-xs-12 col-md-12">
                                <br>
                                <?php
                                if (isset($prodGallery)):
                                    foreach ($prodGallery as $prdGRow):
                                        ?>    
                                        <div class="col-xs-6 col-md-4">                                            
                                            <img src="<?php echo base_url() . 'upload/product/thumbnail/' . $prdGRow->image; ?>">                                            
                                        </div>
                                        <?php
                                    endforeach;
                                else:
                                    echo "<p><i class='fa fa-bullhorn fa-2x'></i> There is no Image yet</p>";
                                endif;
                                ?>                                                                                               
                            </div>
                        </div>
                        <div class="tab-pane" id="video"><p><i class='fa fa-bullhorn fa-2x'></i> Coming Soon !</p></div>
                    </div>
                </div> 

                <div class="col-xs-12 col-md-4">
                    <h3 class="text-center">Other Customers Also Bought</h3>                   
                    <div class="row">
                        <?php
                        if (count($prodRel) > 0):
                            foreach ($prodRel as $prdRow):
                                if ($row->code == $prdRow->code):
                                    foreach ($prodGrup as $prdGroupRow):
                                        if (str_replace(' ', '', $prdRow->rel_code) == str_replace(' ', '', $prdGroupRow->code)):
                                            ?>
                                            <div class="thumbnail thumbnail-product">
                                                <?php
                                                if (isset($prdGroupRow->image)):
                                                    echo "<img src=" . base_url() . 'upload/product/thumbnail/' . $prdGroupRow->image . " alt=\"$prdGroupRow->title\">";
                                                else:
                                                    echo "<img data-src=\"holder.js/100%x180\" alt=\"No Image Displayed\">";
                                                endif;
                                                ?>                                                
                                                <div class="caption">
                                                    <h3 class="text-center"><?php echo $prdGroupRow->title; ?></h3>                      
                                                    <p><a href="<?php echo site_url() . '/product/det/' . $prdGroupRow->id.'/'.  url_title($prdGroupRow->title); ?>" class="btn btn-info center-block" role="button">View This Product</a></p>
                                                </div>
                                            </div>
                                            <?php
                                        endif;
                                    endforeach;
                                endif;
                            endforeach;
                        endif;
                        ?>
                    </div>                    
                </div>   
            </div>
          