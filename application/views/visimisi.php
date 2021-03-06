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
                    <h1>Visi & Misi Perusahaan</h1>
                </div>
            </div>
            <div class="col-xs-12 col-md-12">            
                <img class="center-block img-responsive" src="<?php echo base_url(); ?>images/visimisi.jpg" alt="Responsive image">            
            </div> 
            <br>
            <div class="col-xs-12 col-md-12">
                <h3>Visi kami</h3>

                <p>Untuk menjadi perusahaan MLM terkemuka di Indonesia dengan jutaan distributor yang tersebar di berbagai daerah, pulau-pulau dan provinsi di seluruh kepulauan yang luas ini, mencetak ribuan pemasar-pemasar MLM yang memiliki penghasilan di atas rata-rata penghasilan kalangan menengah di Indonesia.</p>

                <h3>Misi kami</h3>
                <p>Untuk memasarkan produk makanan dan minuman kesehatan, produk penunjang dan perawatan kesehatan yang berkualitas dan teruji khasiatnya, dengan harga yang dapat dijangkau bagi masyarakat luas. K-Link menawarkan konsep bisnis multi level marketing yang dapat dijalankan oleh setiap orang dari beragam latar belakang sosial dan pendidikan.</p>

                <h3>Nilai-Nilai Dasar</h3>
                <p>
                <ul>
                    <li>Produk yang berkualitas dan teruji</li>
                    <li>Marketing plan yang adil, mudah dicapai dan pemasaran direct selling murni bersertifikasi syariah</li>
                    <li>Manajemen dan pemegang saham yang berpengalaman di bisnis MLM dan memiliki reputasi yang baik</li>
                    <li> K-System, Sistem Pendukung tunggal yang mengembangkan semua pelatihan dan modul untuk menunjang kelajuan bisnis para usahawan K-Link.</li>
                </ul>
                </p>

                <h3>Filosofi kami</h3>
                <p>Kami memberikan produk makanan dan minuman kesehatan serta penunjang kesehatan sebagai solusi lengkap bagi gaya hidup sehat dan mewah, sekaligus memperkaya masyarakat dengan pengetahuan, keterampilan dan pelatihan untuk menjadi penjual langsung yang sangat terampil.</p>

                <h3>Komitmen kami</h3>
                <p>Sebagai perusahaan multi level marketing yang bersertifikasi syariah, Kami memastikan impian setiap distributor dapat dicapai melalui marketing plan yang adil, mudah dicapai serta produk yang mudah dipasarkan, dilatih oleh para pakar yang berpengalaman.</p>
            </div>  