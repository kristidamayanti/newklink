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
                    <h1>How do I join ?</h1>
                </div>
            </div>
        </div>
        <!--        <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <img class="img-responsive" src="holder.js/1140x200" alt="Stockist Logo">
                    </div>
                </div>-->
        <br>
        <div class="row">
            <div class="col-md-7">
                <h2 class="featurette-heading text-primary">Mulailah hari ini untuk hari besok yang lebih baik</h2>
                <p class="lead">Jika Anda ingin mempelajari lebih lanjut tentang peluang bisnis K-Link yang luar biasa, ikuti salah satu metode di bawah ini. </p>

            </div>
            <div class="col-md-5">
                <img class="featurette-image img-responsive" src="<?php echo base_url() . 'images/hari_ini.jpg'; ?>" alt="Hari Ini">
            </div>        
            <hr class="featurette-divider">
            <div id="houseofbeauty" class="row featurette">
                <div class="col-md-5">
                    <img class="featurette-image img-responsive" src="<?php echo base_url() . 'images/distributor.jpg'; ?>" alt="Generic placeholder image">
                </div>
                <div class="col-md-7">
                    <h2 class="featurette-heading text-primary">Hubungi Distributor Terdekat</h2>
                    <p class="lead">Jika Anda telah mendengar tentang peluang bisnis K-Link sebelumnya dari salah seorang distributor, Kami sarankan Anda menghubungi orang tersebut untuk lebih membantu Anda dengan pertanyaan Anda, Namun, jika Anda belum pernah dikenalkan sebelumnya atau Anda tidak bisa mendapatkan kontak orang tersebut, silakan Anda hadir dipertemuan BOP & Grand BOP di Kota Anda dengan mencari dihalaman berikut <?php echo anchor('schedule', 'Cari Acara BOP & Grand BOP',"class='btn btn-info'") ?>. </p>
                </div>
            </div>
            <div class="col-md-7">
                <h2 class="featurette-heading text-primary">Kunjungi K-Link Stockist Centre </h2>
                <p class="lead"><?php echo anchor('stockist', 'Klik di sini',"class='btn btn-info'") ?> untuk daftar lengkap dari semua stokis Kami di seluruh Indonesia. Hubungi kapan saja selama jam kerja dan salah seorang staf akan membantu Anda dengan segala sesuatunya yang perlu Anda ketahui tentang menjadi Distributor K-Link.</p>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-responsive" src="<?php echo base_url() . 'images/stockis.jpg'; ?>" alt="Generic placeholder image">
            </div>