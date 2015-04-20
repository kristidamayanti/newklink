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
                    <h1>News</h1>
                </div>
            </div>

            <div class="col-xs-12 col-md-12">
                <br>
                <div class="col-xs-12 col-sm-12 col-md-3"> 
                    <div class="list-group">
                        <a href="#" class="list-group-item active">
                            News Categories
                        </a>
                        <?php
                        if (sizeof($newsCat) > 0):
                            foreach ($newsCat as $row):
                                echo anchor('news/cat/' . $row->cat_id . '/' . url_title($row->title), $row->title, array("class" => "list-group-item"));
                            endforeach;
                        endif;
                        ?>   
                    </div>                     
                </div>              
                <!--                <div class="col-xs-12 col-md-9">
                                    <img class="center-block img-responsive" src="holder.js/825x400" alt="Responsive image">               
                                </div> -->
                <br>
                <div class="col-xs-12 col-md-3">              
                </div>

                <div class="col-xs-12 col-sm-9 col-md-9">
                    <br>
                    <?php
                    if (sizeof($newsDet) > 0):
                        foreach ($newsDet as $row):
                            ?>
                            <div class="row">  
                                <br>
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <img class="img-responsive" src="<?php echo base_url(); ?>upload/news/thumbnail/<?php echo $row->image; ?>" alt="<?php echo $row->title ?>">
                                </div>                                
                                <div class="col-xs-12 col-sm-9 col-md-9">
                                    <h4><?php echo anchor('news/det/' . $row->id . '/' . url_title($row->title), $row->title); ?></h4>
                                    <?php echo strip_tags(word_limiter($row->news, 40)); ?> <span class="glyphicon glyphicon-eye-open"></span> <?php echo anchor('news/det/' . $row->id, 'Read More'); ?>
                                </div>                                
                                <div class="col-xs-12 col-sm-9 col-md-9 pull-right">                   
                                    <br>
                                    <span class="glyphicon glyphicon-download-alt"></span> 
                                    <?php
                                    $realFile = base_url() . "upload/news/download/";

                                    if (isset($row->url_filedownload)): echo anchor($realFile . $row->url_filedownload, ' Download');
                                    endif;
                                    ?>
                                    <span class="glyphicon glyphicon-picture"></span>
                                    <?php
                                    $realImage = base_url() . "upload/news/original/";

                                    if (isset($row->image)): echo anchor($realImage . $row->image, ' Image');
                                    endif;
                                    ?>
                                    <span class="glyphicon glyphicon-facetime-video"></span>
                                    <?php                                    
                                    if (isset($row->url_video)): echo anchor($row->url_video, ' Video');
                                    endif;
                                    ?>
                                    <span class="glyphicon glyphicon-headphones"></span>
                                    <?php
                                    $realAu = base_url() . "upload/news/audio/";

                                    if (isset($row->url_audio)): echo anchor($realAu . $row->url_audio, ' Audio');
                                    endif;
                                    ?>
                                </div>
                            </div> 
                            <?php
                        endforeach;
                    endif;
                    echo "<div class=\"pager pull-right\">" . $halaman . "</div>";
                    ?>
                </div>
            </div>