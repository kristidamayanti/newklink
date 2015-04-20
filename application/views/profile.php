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
                    <h1><i class="fa fa-bar-chart-o"></i> Company Profile</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <h2 class="featurette-heading text-primary"> Company Profile</h2>
                <p class="lead">K-Link Indonesia adalah salah satu anak perusahaaan dari K-Link International, sebuah perusahaan yang telah berkembang dan beroperasi di 46 negara. Kami bangga menjadi perusahaan penjualan langsung yang giat, idealis, dan strategis, dengan tujuan menciptakan situasi ‘win-win’ untuk distributor, pelanggan, staf, mitra dagang dan rekan bisnis kami.</p>
                <p class="lead">Kami beroperasi di dalam industri yang sangat kompetitif dan menantang, yang terus-menerus berkembang. Oleh karena itu, sangat penting bagi kami untuk tidak berhenti pada pencapaian kami. Kami terus mengembangkan metode baru dan sarana untuk kemajuan yang berkelanjutan, memberikan para distributor dan pelanggan di seluruh dunia kepercayaan dan keyakinan bahwa K-LINK benar-benar ‘Your Global Link’.</p>
                <p class="lead">Produk dan bisnis yang kami jalani merupakan yang terbaik di industri ini. ‘Unity is Power’ merupakan landasan yang kami jadikan haluan untuk menjalankan bisnis yang sangat menguntungkan ini. Kami selalu percaya bahwa keberhasilan dapat diraih dengan kerja sama tim yang sangat kuat. Budaya seperti inilah yang selalu kami upayakan untuk tumbuh dalam perusahan kami.</p>
                <p class="lead">Produk kami terdiri atas produk suplemen kesehatan, perawatan tubuh, kecantikan, UIE, serta beberapa produk perawatan kendaraan bermotor dan rumah tangga. Beberapa dari produk kami yang sudah banyak dikenal masyarakat antara lain,<i> K-Liquid Chlorophyll,</i><i> K-OmegaSqua Plus</i> dan <i>Ayurveda Series.</i> </p>
                <p class="lead">K-LINK memiliki sistem yang terbukti mampu menaikan kemampuan para Distributor, agar dapat berhasil di bisnis yang menguntungkan ini. Dengan lebih dari 2,4 juta anggota membuktikan bahwa K-Link Indonesia merupakan salah satu perusahaan Multi Level Marketing terbesar di Indonesia. Kami terus tumbuh dan berkembang dan terus berusaha untuk menjadi perusahaan Multi Level Marketing yang dominan di Indonesia.</p>
                
                <?php
                $realFile = base_url() . "images/K-Link_Company_Profile.pdf.zip";

                echo anchor($realFile, 'Download Here', "class='btn btn-info'");
                ?>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-responsive" src="<?php echo base_url(); ?>images/profile.jpg" alt="logo LBC">
            </div>
        </div>
      