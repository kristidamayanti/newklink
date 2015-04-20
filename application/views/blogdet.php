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
        <?php
        if (count($blogDet) > 0):
            $row = $blogDet;
        endif;

        if (count($blogNext) > 0):
            $nextRow = $blogNext;
        endif;

        if (count($blogPrev) > 0):
            $prevRow = $blogPrev;
        endif;
        ?>
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="page-header">
                    <h1><i class="fa fa-coffee fa-2x text-primary"></i>Official K-Link Blog</h1>
                </div>
            </div>

            <div class="col-xs-12 col-md-12">
                <br>
                <div class="col-xs-12 col-md-3">
                    <div class="list-group">
                        <a href="#" class="list-group-item active">
                            <H3 class="list-group-item-heading"><i class="fa fa-thumbs-o-up"></i> Editors Choice</H3>
                        </a>
                        <?php
                        if (count($choice) > 0):
                            foreach ($choice as $rowChoice) {
                                echo "<a href=" . site_url() . '/blog/det/' . $rowChoice->id . '/' . url_title($rowChoice->bl_title) . " class=\"list-group-item\">$rowChoice->bl_title</a>";
                            }
                        endif;
                        ?>                
                    </div>
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-info">
                            <H3><i class="fa fa-archive"></i> Blog Archive</H3>
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
                <div class="col-xs-12 col-md-9">
                    <br>
                    <div class="row">
                        <div class="col-xs-2 col-md-2">
                            <span class="fa-stack fa-3x">
                                <i class="fa fa-calendar-o fa-stack-2x"></i>
                                <strong class="fa-stack-1x calendar-text"><?php echo date('d', strtotime($row->createdt)); ?></strong>                                
                            </span>
                            <p class="text-muted text-left"><?php echo date('M Y', strtotime($row->createdt)); ?></p>
                        </div>                                   
                        <div class="col-xs-9 col-md-9">                              
                            <h2><?php echo $row->bl_title; ?> <small> <?php
                                    if (isset($row->bl_name)): echo $row->bl_name;
                                    endif;
                                    ?></small></h2>
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
                            <p><?php echo $row->bl_content; ?></p>
                            <br>
                            <div id="sosmed" data-url="<?php echo current_url(); ?>" data-text="<?php echo humanize($row->bl_title); ?>" data-title="Share"></div>
                        </div> 
                        <br>                        
                        <div class="col-xs-12 col-md-12 posted">
                            <div class="col-xs-6 col-md-6 pull-left">
                                <h3 class="text-left">Prev Post</h3>
                                <p><?php
                                    if (isset($prevRow->bl_title)):
                                        $urlNext = site_url() . '/blog/det/' . $prevRow->id . '/' . url_title($prevRow->bl_title);
                                        echo anchor($urlNext, $prevRow->bl_title);
                                    endif;
                                    ?>
                                </p>
                            </div>
                            <div class="col-xs-6 col-md-6 pull-right">
                                <h3 class="text-right">Next Post</h3>
                                <p class="text-right"><?php
                                    if (isset($nextRow->bl_type)):
                                        $typeRow = $nextRow->bl_type;
                                    else:
                                        $typeRow = 1;
                                    endif;


                                    if ($typeRow == 3):
                                        $type_url = '/blog/reciepe/';
                                    elseif ($typeRow == 4):
                                        $type_url = '/blog/tips/';
                                    elseif ($typeRow == 1):
                                        $type_url = '/blog/det/';
                                    elseif ($typeRow == 5):
                                        $type_url = '/blog/house_of_beauty/';
                                    elseif ($typeRow == 6):
                                        $type_url = '/health/artno/';
                                    elseif ($typeRow == 7):
                                        $type_url = '/syariah/artno/';
                                    endif;

                                    if (isset($nextRow->bl_title)):
                                        $urlNext = site_url() . $type_url . $nextRow->id . '/' . url_title($nextRow->bl_title);
                                        echo anchor($urlNext, $nextRow->bl_title);
                                    endif;
                                    ?>
                                </p>
                            </div>
                        </div>
                        <br>
                        <div class="col-xs-12 col-md-12">                   
                            <h3 class="text-info"><i class="fa fa-comments"></i> Comment</h3>
                            <?php
                            if (count($blogCom) > 0):
                                foreach ($blogCom as $rowBlog):
                                    ?>
                                    <div class="media">                  
                                        <div class="media-body">
                                            <h4 class="media-heading "><?php echo "<span class='text-success'><strong>" . $rowBlog->name . "</strong></span> " . "<span class='text-muted'> | <i class='fa fa-clock-o'></i> " . date('M d, Y H:i:s', strtotime($rowBlog->createdt)); ?></span></h4>
                                            <p><?php echo $rowBlog->bl_comment; ?></p>
                                        </div>
                                    </div>                                            
                                    <?php
                                endforeach;
                            endif;
                            ?>
                        </div> 
                        <div class="col-xs-12 col-md-12 thumbnail">                               
                            <h3 class="text-info"><i class="fa fa-comment"></i>  Post New Comment</h3>
                            <div class="media">                                          
                                <div class="media-body">
                                    <div class="form">
                                        <form id="Komentar">
                                            <input type="hidden" name="bl_id" value="<?php echo $row->id; ?>" />
                                            <div class="form-group">
                                                <label for="name">Your Name</label>
                                                <input type="text" id="name" name="name" autocomplete required class="form-control" placeholder="Enter Your Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Your Comment</label>
                                                <textarea class="form-control" id="bl_comment" name="bl_comment" required maxlength="400" placeholder="Max 400 Character" rows="3"></textarea>
                                            </div>
                                            <input id="comment" type="button" class="btn btn-primary" value="Kirim">                                            
                                        </form>
                                    </div>
                                </div>
                            </div> 
                        </div> 
                    </div>                            

                </div>                
            </div>            
          