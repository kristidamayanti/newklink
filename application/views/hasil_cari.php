<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
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
                </div>
            </div>
        </div>
        
        <div class="row">      
            <div class="col-xs-12 col-md-4">
            	<div class="panel panel-success" style="border-radius:80px 0px 2px 2px;">
                <div class="panel-promo">
                	<img class="img-responsive" src="<?php echo base_url() . 'images/header-article.jpg' ?>" alt="K-Link Indonesia">
                </div>
                    <?php
                    if (isset($listBlog)):
                        foreach ($listBlog as $rowList):
                            echo anchor('health/artno/' . $rowList->id . '/' . url_title($rowList->bl_title), $rowList->bl_title, "class='list-group-item'");
                        endforeach;
                    endif;
                    ?>                                                     
                </div>
                <div class="panel panel-success" style="border-radius:80px 0px 2px 2px;">
                <div class="panel-promo">
                	<img class="img-responsive" src="<?php echo base_url() . 'images/header-stories.jpg' ?>" alt="K-Link Indonesia">
                </div>
                    <?php
                    if (isset($listSuccess)):
                        foreach ($listSuccess as $rowList):
                            echo anchor('successstories/det/' . $rowList->id . '/' . url_title($rowList->bl_title), $rowList->bl_title, "class='list-group-item'");
                        endforeach;
                    endif;
                    ?>                                                     
                </div> 
                <div class="panel panel-success" style="border-radius:80px 0px 2px 2px;">
                <div class="panel-promo">
                	<img class="img-responsive" src="<?php echo base_url() . 'images/header-syariah.jpg' ?>" alt="K-Link Indonesia">
                </div>
                    <?php
                    if (isset($listSyariah)):
                        foreach ($listSyariah as $rowList):
                            echo anchor('syariah/artno/' . $rowList->id . '/' . url_title($rowList->bl_title), $rowList->bl_title, "class='list-group-item'");
                        endforeach;
                    endif;
                    ?>                                                     
                </div> 
                <div class="panel panel-success" style="border-radius:80px 0px 2px 2px;">
                <div class="panel-promo">
                	<img class="img-responsive" src="<?php echo base_url() . 'images/header-archive.jpg' ?>" alt="K-Link Indonesia">
                </div>
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
            	<h1 style="margin-top:5px;">Search Result</h1>
                <hr><br>
				<?php
				if($kategori=="news")
				{
					foreach($hasil as $result)
					{
						echo
						'<h3>'.$result->title.'</h3>'.
						'<p>'.strip_tags(word_limiter($result->news,20)).
							anchor('news/det/' . $result->id . '/' . url_title($result->title),'&nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>  Selengkapnya').
						'</p>';
					}
                }
				elseif($kategori=="blog")
				{
					foreach($hasil as $result)
					{
						echo
						'<h3>'.$result->bl_title.'</h3>'.
						'<p>'.strip_tags(word_limiter($result->bl_content,2));
							if($result->bl_type==1)
							{
								echo
								anchor('blog/det/' . $result->id . '/' . url_title($result->bl_title),'&nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>  Selengkapnya');
							}
							elseif($result->bl_type==2)
							{
								echo
								anchor('successstories/det/' . $result->id . '/' . url_title($result->bl_title),'&nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>  Selengkapnya');
							}
							elseif($result->bl_type==3)
							{
								echo
								anchor('blog/recipe/' . $result->id . '/' . url_title($result->bl_title),'&nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>  Selengkapnya');
							}
							elseif($result->bl_type==4)
							{
								echo
								anchor('tips/det/' . $result->id . '/' . url_title($result->bl_title),'&nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>  Selengkapnya');
							}
							elseif($result->bl_type==5)
							{
								echo
								anchor('blog/house_of_beauty/' . $result->id . '/' . url_title($result->bl_title),'&nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>  Selengkapnya');
							}
							elseif($result->bl_type==6)
							{
								echo
								anchor('health/artno/' . $result->id . '/' . url_title($result->bl_title),'&nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>  Selengkapnya');
							}
							elseif($result->bl_type==7)
							{
								echo
								anchor('blog/recipe/' . $result->id . '/' . url_title($result->bl_title),'&nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>  Selengkapnya');
							}
							elseif($result->bl_type==10)
							{
								echo
								anchor('product/article/' . $result->id . '/' . url_title($result->bl_title),'&nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>  Selengkapnya');
							}
							elseif($result->bl_type==11)
							{
								echo
								anchor('lifestyle/artno/' . $result->id . '/' . url_title($result->bl_title),'&nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>  Selengkapnya');
							}
						'</p>';
					}
                }
				elseif($kategori=="product")
				{
					foreach($hasil as $result)
					{
						echo
						'<h3>'.$result->title.'</h3>'.
						'<p>'.strip_tags(word_limiter($result->description,20)).
							anchor('product/det/' . $result->id . '/' . url_title($result->title),'&nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>  Selengkapnya').
						'</p>';
					}
                }
				else
				{
					echo '<p> Isian pencarian anda belum lengkap.</p>';
				}
				 ?>          
            </div> 
