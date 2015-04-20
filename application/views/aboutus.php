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
                    <h1>About Us</h1>
                </div>
            </div>
            <div class="col-xs-4 col-md-4">
                <img class="img-responsive" src="<?php echo base_url(); ?>images/k-link-tower.jpg" alt="Responsive image">
            </div> 

            <div class="col-xs-8 col-md-8">
                <h3>Tentang K-Link Indonesia</h3>
                <p>K-Link merupakan salah satu perusahaan penjualan langsung terkemuka di Indonesia. Pusat stockist Kami dapat ditemukan hampir di setiap kota besar dan kota-kota di seluruh negeri ini, seiring dengan adanya pembukaan gerai-gerai baru secara terus menerus.</p>

                <p>Produk-produk Kami terdiri dari produk-produk suplemen kesehatan, kecantikan, perawatan tubuh, UIE, serta perawatan mobil dan rumah yang mencakup produk-produk yang sudah cukup dikenal seperti K-Liquid Chlorophyll, K-OmegaSqua dan K-Ayurveda.</p>

                <p>Didirikan pada bulan Mei 2002, K-Link Indonesia telah menerima banyak penghargaan yang membuktikan bahwa orang-orang, produk dan bisnis Kami merupakan yang terbaik di industri ini. Dengan dilandasi oleh nilai-nilai utama serta fokus pada misi dan visi Kami, bagian dari cetak biru kesuksesan Kami terletak pada slogan Kami, 'Unity is Power'. Kami percaya kesuksesan dapat dicapai melalui kerja sama tim yang kuat, dan budaya inilah yang selalu Kami upayakan untuk tumbuh dalam Perusahaan Kami.</p>

                <p>Dengan lebih dari 2,4 juta anggota, disinilah tempat orang-orang menawarkan beragam perspektif, berbagi ide, pengetahuan dan pemahaman yang dapat berfungsi untuk meningkatkan kemampuan masing-masing individu. Ini adalah kunci untuk memastikan K-Link Indonesia terus tumbuh dan berkembang, dengan tujuan menjadi perusahaan Multi Level Marketing yang paling dominan di negeri ini.</p>

                <p>K-Link Indonesia didedikasikan untuk memenuhi tantangan yang akan muncul seiring dengan masyarakat dan bisnis yang  terus berkembang, dan Kami yakin dan bersemangat karena Kami terus mengembangkan produk Kami, yang Kami percaya akan menjadi patokan dalam kualitas produk dan peluang bisnis baik secara nasional maupun global di masa yang akan datang.</p>
            </div>  