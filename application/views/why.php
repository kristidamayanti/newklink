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
                    <h1>Why Choose K-Link</h1>
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
                <h2 class="featurette-heading text-primary">Mengapa memilih K-Link ?</h2>
                <p class="lead">K-Link saat ini telah menjadi salah satu penjual langsung terbesar di Indonesia, sehingga dengan menjadi distributor K-Link berarti anda menjual merek nasional yang mapan dan terpercaya di seluruh negeri ini. Pengalaman kami dalam industri penjualan langsung memberikan jaminan bahwa kami adalah pilihan yang tepat</p>
                <p class="lead">Setiap anggota memiliki upline yang akan memberikan pendampingan, pelatihan dan mendukung setiap langkah anda menuju sukses dengan kami. Modul pelatihan standar kami dijelaskan secara sederhana, mudah dipelajari dan dimengerti, serta mudah dilakukan dan diajarkan</p>

            </div>
            <div class="col-md-5">
                <img class="featurette-image img-responsive" src="<?php echo base_url(); ?>images/why_building.jpg" alt="K-Link Tower">
            </div>

            <hr class="featurette-divider">
            <div id="houseofbeauty" class="row featurette">
                <div class="col-md-5">
                    <img class="featurette-image img-responsive" src="<?php echo base_url(); ?>images/why_pendapatan.jpg" alt="Pendapatan">
                </div>
                <div class="col-md-7">
                    <h2 class="featurette-heading text-primary">Peluang pendapatan yang luar biasa</h2>
                    <p class="lead">Rencana pemasaran (Marketing Plan) kami sangat bermanfaat dalam menguraikan potensi yang ditawarkan kepada seluruh Distributor K-link. Tidak hanya distributor mendapatkan uang dari penjualan produk, mereka juga menerima pembayaran bonus dari jumlah point BV ( Business Value/ Nilai Bisnis) yang diperoleh melalui penjualan itu. Selain PBV yang merupakan penjualan pribadi dari distributor itu sendiri, ada juga PGBV (Personal Group Business Value/ Nilai Bisnis Grup Personal), yang merupakan pembayaran bonus berdasarkan persentasi penjualan jaringan distributor tersebut. Maka, semakin besar jaringan distributornya, semakin besar pula pembayaran bonusnya, hal ini membuka kesempatan mendapatkan penghasilan yang benar-benar tak terbatas</p>        
                </div>
            </div>