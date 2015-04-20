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
                    <h1>Schedule</h1>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <img class="img-responsive" src="<?php echo base_url(); ?>images/ksystem.jpg" alt="Responsive image">
            </div> 

            <div class="col-xs-12 col-md-8">
                <?php
                if (isset($pesan)):
                    echo $pesan;
                endif;
                ?>
                <div class="form-horizontal" role="form">
                    <?php echo form_open('schedule'); ?>
                    <div class="form-group">
                        <label for="pembicara" class="col-sm-2 control-label"> Pembicara </label>
                        <div class="col-sm-10">
                            <input type="text" name="pembicara" class="form-control" id="pembicara" placeholder="Pembicara">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lokasi" class="col-sm-2 control-label">Lokasi</label>
                        <div class="col-sm-10">
                            <input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="Lokasi">
                        </div>
                    </div>  
                    <div class="form-group">
                        <label for="tanggal" class="col-sm-2 control-label">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="text" name="tanggal" class="form-control" id="tanggal" placeholder="Contoh 2014-01-01">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <?php echo $image; ?>
                        </div>                       
                    </div>
                    <div class="form-group">
                        <label for="captcha" class="col-sm-2 control-label">Captcha Code</label>
                        <div class="col-sm-10">
                            <input type="text" name="captcha" class="form-control" id="captcha">
                        </div>                        
                    </div>                    
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <?php
                            echo form_submit('submit', 'Search', 'class="btn btn-default"');
                            ?>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
                <h3>Jadwal Program K-System</h3>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kota </th>
                            <th>Event </th>
                            <th>Lokasi </th>
                            <th>Pembicara </th>
                            <th>Tanggal </th>
                        </tr>                    
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        if (count($currSch) > 0):
                            foreach ($currSch as $row):
                                echo "<tr>";
                                echo "<td>" . $i++ . "</td>";
                                echo "<td>" . $row->city . "</td>";
                                echo "<td>" . $row->event . "</td>";
                                echo "<td>" . $row->location . "</td>";
                                echo "<td>" . $row->speaker . "</td>";
                                echo "<td>" . $row->eventdate . "</td>";
                                echo "</tr>";
                            endforeach;
                        endif;
                        ?>                        
                    </tbody>
                </table>
                <div class="pager pull-right"><?php if(isset($halaman)) echo $halaman ?></div>
            </div>  