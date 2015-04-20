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
        <?php 
        if(isset($categoryName)):
            $rowCatName = $categoryName;
        endif;
        
        ?>
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="page-header">
                    <h1>Products - <small><em><?php echo $rowCatName->prdcat_name;?></em></small></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <br>
                    <div class="col-xs-12 col-md-4"> 
                        <div class="list-group">
                            <a href="#" class="list-group-item active">
                                Product Categories
                            </a>
                            <?php
                            if (sizeof($prodCate) > 0):
                                foreach ($prodCate as $row):
                                    echo anchor('product/cat/' . str_replace(' ', '_', $row->id).'/'. url_title($row->prdcat_name), $row->prdcat_name, array("class" => "list-group-item"));
                                endforeach;
                            endif;
                            ?>                        
                        </div>                     
                    </div>              
                    <div class="col-xs-12 col-md-8">
                        <div class="panel panel-info">
                            <div class="panel-heading">Special Offers</div>
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
                </div>
            </div>

            <div class="row">
                <br>
                <div class="col-xs-12 col-md-12">
                    <div class="col-xs-12 col-md-4">
                        <div class="panel panel-info">
                            <div class="panel-heading"> Recipes </div>
                            <div class="panel-body ">
                                <ul class="list-unstyled">
                                    <?php
                                    if (count($resep) > 0):
                                        foreach ($resep as $resepRow):
                                            echo "<li>" . anchor('/blog/reciepe/' . $resepRow->id, $resepRow->bl_title) . "</li>";
                                        endforeach;
                                    endif;
                                    ?>                                    
                                </ul>
                            </div>
                        </div>      
                    </div>
                    <div class="col-xs-12 col-md-8">
                        <div class="panel panel-info">
                            <div class="panel-heading">Product</div>
                            <div id="productpaging" class="panel-body">
                                <ul>
                                    <?php
                                    if (sizeof($prodGrup) > 0):
                                        foreach ($prodGrup as $row):
											$title= '<p align="center">'.$row->title.'</p>';
                                            $more = "<a href=" . site_url() . "/product/det/" . $row->id.'/'.url_title($row->title). " class=\"btn btn-info center-block btn-xs btn\"><span class=\"glyphicon glyphicon-cloud\"></span> More</a>";
                                            ?>
                                            <li class="col-xs-4 col-md-4">
                                                <a href="<?php echo site_url() . "/product/det/" . $row->id.'/' .url_title($row->title); ?>"><img class="img-responsive" src="<?php echo base_url() . 'upload/product/thumbnail/' . $row->image; ?>" alt="<?php $row->title; ?>" title="<?php echo $row->title; ?>"></a>
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
                </div>
            </div>