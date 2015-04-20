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
                    <h1>Presiden Direktur <small>PT. K-Link Indonesia</small></h1>
                </div>
            </div>
            <div class="col-xs-12 col-md-12">
                <h3>Dato' DR. H. Md. Radzi Saleh - Presiden Direktur K-Link Indonesia</h3>            
                <br>
                <p><img class="img-caption img-icon img-circle" src="<?php echo base_url() . '/images/presdir.jpg'; ?>" alt="Pres Dir"> Sebagai Presiden Direktur dari K-Link Indonesia yang berdiri pada Mei 2002, Dato' DR. H. Md. Radzi Saleh mengawasi kegiatan operasional harian perusahaan. Bapak Radzi mendapatkan peran tersebut dari K-Link International Group Managing Director - Dato' DR. Darren Goh.</p>

                <p>Pesan Dato' Darren cukup singkat; pergi ke Indonesia dan membangun merek K-Link di sana. Indonesia adalah negara kepulauan terbesar di dunia, dengan lebih dari 17.000 pulau dan tempat bagi budaya yang sangat beragam; Menemukan cara untuk menaklukkan tempat yang luas ini tentulah tidak mudah.</p>            
                <p>Bapak Radzi, yang memiliki pengalaman lebih dari 25 tahun dalam industri penjualan langsung, mengatur  tugasnya. Dengan kemampuan manajemen sumber daya manusia yang luar biasa, keyakinan tak terkalahkan dan antusiasme, serta mata yang jeli untuk hal-hal detail dan pandangan visionernya, beliau telah membantu K-Link Indonesia tumbuh menjadi salah satu perusahaan multi level marketing terbesar di Indonesia. Kemampuannya mendorong pengusaha di seluruh negeri ini tercermin dalam pertumbuhan angka penjualan perusahaan.</p>
                <blockquote>
                    Visi Bapak Radzi dalam menciptakan komunitas K-Link yang penuh kasih dan kepedulian, didukung oleh pelaksanaan program-program CSR perusahaan
                </blockquote>
                <p>Visi Bapak Radzi dalam menciptakan komunitas K-Link yang penuh kasih dan kepedulian, didukung oleh pelaksanaan program-program CSR perusahaan, telah membantu meningkatkan kehidupan masyarakat yang tak terhitung jumlahnya di seluruh Indonesia. Selain itu, ia juga menulis buku ‘Breaking Fee’, yang sangat memotivasi dan inspiratif, serta harus dimiliki semua pengusaha pemula.</p>
                <p>Melihat jauh ke depan, Bapak Radzi mempredikisi bintang K-Link Indonesia akun terus bertambah, ia menambahkan, “Dengan produk-produk yang lebih inovatif, berkualitas tinggi yang ditambahkan ke dalam katalog Kami, pasar Kami akan terus bertambah luas di seluruh negeri ini. Sebagai perusahaan Kami secara aktif memantau bagaimana masyarakat berubah, yang selalu membuat Kami selangkah lebih maju. Dengan akses ke sarana informasi yang tersedia dari begitu banyak sumber, baik tatap muka maupun online adalah penting bahwa K-Link menawarkan metode up-to-date yang terbaru, untuk melayani semua member Kami secara lebih cepat dan efisien. Bisnis, seperti kehidupan, selalu berkembang, dan ini adalah saat yang menyenangkan untuk diri Saya sendiri dan semua orang yang terhubung ke K-Link Indonesia seiring dengan langkah Kami untuk mulai menetapkan standar bagi industri MLM di Indonesia.</p>
            </div>  
