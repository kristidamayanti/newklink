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
                    <h1>General Manager <small>PT. K-Link Indonesia</small></h1>
                </div>
            </div>           
            <br>
            <div class="col-xs-12 col-md-12">
                <h3>Ir. Djoko Komara - General Manager K-Link Indonesia</h3>            
                <p><img class="img-caption img-icon img-circle" src="<?php echo base_url() . '/images/gmpict.jpg'; ?>" alt="GM">Ir. Djoko Komara bergabung di K-Link Indonesia pada bulan Januari 2004 sebagai Senior Marketing Manager. Setelah menunjukkan kemampuan luar biasa di bidang ini, beliau diberikan posisi General Manager yang dia pegang saat ini.</p> 

                <p>Sebagai orang yang bertanggung jawab atas pemasaran dan operasional; Bapak Djoko bekerja sama dengan Presiden Direktur K-Link Indonesia Dato' DR. H. Md. Radzi Saleh dan semua pemimpin afiliasi K-Link Indonesia untuk mendorong kinerja bisnis dan pertumbuhan strategis secara terus menerus di wilayah Indonesia. </p>                
                <p>Pengetahuan yang luar biasa dalam industri penjualan langsung, khususnya di kawasan ASEAN dan karakter yang mengagumkan adalah dua alasan mengapa Bapak Djoko memenangkan pemilihan sebagai ketua APLI (Asosiasi Penjualan Langsung Indonesia). Dalam perannya ini, beliau telah berhasil mendorong Pemerintah untuk mengesahkan UU Perdagangan tahun 2014 pada tanggal 11 Februari 2014, dimana pemerintah mengakui dan melindungi industri MLM/DS (Multi Level Marketing/Direct Selling) sementara skema piramida dilarang.  Melalui UU ini, diharapkan masyarakat Indonesia dapat melihat perbedaan antara MLM/DS yang benar dan Money Game yang berkedok MLM. Tidak hanya itu, terobosan lain yang dilakukannya adalah merubah dan membenahi AD/ART APLI.</p>               
                <blockquote>
                    <p>Dalam perannya ini, beliau telah berhasil mendorong Pemerintah untuk mengesahkan UU Perdagangan tahun 2014 pada tanggal 11 Februari 2014, dimana pemerintah mengakui dan melindungi industri MLM/DS (Multi Level Marketing/Direct Selling)</p>            
                </blockquote>
                <p>Beliau juga memegang peran sebagai ketua Klub Golf K-Link, yang merupakan aspek penting dari program CSR perusahaan dimana beberapa acara penggalangan dana diselenggarakan oleh klub ini setiap tahunnya. </p>
            </div>  