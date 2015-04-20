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
                    <h1>Life Style</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <img class="img-responsive" src="<?php echo base_url(); ?>images/healtharticle.jpg" alt="Stockist Logo">
            </div>
        </div>
        <div class="row">      
            <div class="col-xs-12 col-md-4">
                <br>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-info">
                        <h3>Article</h3>
                    </a>
                    <?php
                    if (isset($listBlog)):
                        foreach ($listBlog as $rowList):
                            echo anchor('lifestyle/artno/' . $rowList->id . '/' . url_title($rowList->bl_title), $rowList->bl_title, "class='list-group-item'");
                        endforeach;
                    endif;
                    ?>                                                     
                </div>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-info">
                        <h3>Success Stories</h3>
                    </a>
                    <?php
                    if (isset($listSuccess)):
                        foreach ($listSuccess as $rowList):
                            echo anchor('successstories/det/' . $rowList->id . '/' . url_title($rowList->bl_title), $rowList->bl_title, "class='list-group-item'");
                        endforeach;
                    endif;
                    ?>                                                     
                </div> 
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-info">
                        <h3>Syariah</h3>
                    </a>
                    <?php
                    if (isset($listSyariah)):
                        foreach ($listSyariah as $rowList):
                            echo anchor('syariah/artno/' . $rowList->id . '/' . url_title($rowList->bl_title), $rowList->bl_title, "class='list-group-item'");
                        endforeach;
                    endif;
                    ?>                                                     
                </div> 
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-info">
                        <h3>Archive</h3>
                    </a>
                    <?php
                    if (count($gYear) > 0):
                        foreach ($gYear as $rows) {
                            echo "<a href=" . site_url() . '/blog/archive/' . $rows->grpyear . '/' . $blType . " class=\"list-group-item\">$rows->grpyear</a>";
                        }
                    endif;
                    ?>                 
                </div> 
            </div>
            <div class="col-xs-12 col-md-8">                
                <br>
                <?php
                if (isset($latestBlog)):
                    foreach ($latestBlog as $row):
                        ?>
                        <h1><?php echo $row->bl_title; ?></h1>
                        <p>Posted : <?php echo date('d-m-Y h:i:s', strtotime($row->createdt)); ?> | <i class="fa fa-user-md"></i> By <?php echo strtolower($row->createnm); ?></p>
                        <hr>
                        <?php
                        if (strlen($row->bl_profilepict) > 0):
                            $image_properties = array(
                                'src' => 'upload/blog/thumbnail/' . $row->bl_profilepict,
                                'alt' => humanize($row->bl_title),
                                'title' => humanize($row->bl_title),
                            );
                            echo "<div class='thumbnail'>";
                            echo img($image_properties);
                            echo "</div>";
                        endif;
                        ?>  
                        <?php
                        echo $row->bl_content;
                        ?>
                        <div id="sosmed" data-url="<?php echo current_url(); ?>" data-text="<?php echo humanize($row->bl_title); ?>" data-title="Share"></div>
                        <?php
                    endforeach;
                endif;
                ?>               
            </div> 
