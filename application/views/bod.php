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
                    <h1>Board Of Directors <small>Dato’ Darren Goh</small></h1>
                </div>
            </div>
            <div class="col-xs-12 col-md-12">
                <img class="center-block img-responsive" src="<?php echo base_url() . '/images/bod.jpg'; ?>" alt="Responsive image">
            </div> 
            <br>
            <div class="col-xs-12 col-md-12">
                <h3>A message from our Group Managing Director – Dato’ Darren Goh</h3>
                <p>Prinsip dan falsafah K-LINK International adalah mewariskan rasa kasih sayang dan kemanusiaan dari abad yang telah lalu. Kemanusiaan dan teknologi maju dari dua abad tersebut akan bersatu dan menghasilkan manfaat-manfaat yang luar biasa, di mana kami ingin memimpin para usahawan agar dapat membangun perekonomian pada abad ke-21 ini. Ini akan membantu membangun usaha antara bangsa yang kokoh serta membangun perniagaan kami di seluruh dunia.</p>

                <p>Pertimbangan kami dalam membina bisnis global adalah jelas. Kami memberi arahan dan dukungan penuh kepada para usahawan untuk mengembangkan K-LINK International ke pasar internasional. Selain memberikan kesadaran tentang arti kesehatan dan kecantikan, kami juga berharap K-LINK International dapat memainkan peranan penting dalam bisnis penjualan langsung secara global untuk memenuhi wawasan menjadi perusahaan penjual langsung yang bertaraf internasional. Kita perlu menanamkan semangat bermurah hati, keberanian, ketekunan dan perencanaan yang baik.</p>

                <blockquote>
                    <p>Pertimbangan kami dalam membina bisnis global adalah jelas. Kami memberi arahan dan dukungan penuh kepada para usahawan untuk mengembangkan K-LINK International ke pasar internasional.</p>
                    <footer>Dato’ Darren Goh</footer>
                </blockquote>

                <p>Sebagai perusahaan penjual langsung yang bersemangat kuat, unggul dan berstrategi, K-LINK International juga dilengkapi dengan wawasan yang luas dan manajemen yang berkonsepkan profesionalisme. Manajemen dan para usahawan bergandeng tangan dalam mencapai budaya 3 "I" yaitu Inisiatif, Informatif dan Inovatif. Bersama itu, kami juga memenuhi 5 prinsip yaitu misi, wawasan, pengakuan, penghargaan, dan keanggotaan untuk membina keluarga dari seluruh pelosok dunia.</p>

                <p>Salah satu sumber utama wawasan menjadi kenyataan ialah rangkaian produk-produk yang unggul, harga produk yang terjangkau dan produk-produk kesehatan yang berkhasiat. Dalam menyebarkan konsep kesehatan dan kecantikan ke seluruh dunia, kami berharap lebih banyak orang bergabung bersama K-LINK International untuk saling bantu-membantu dalam mengekalkan gaya hidup yang sehat.</p>

                <p>Falsafah K-LINK International akan diselaraskan berdasarkan budaya, bangsa, adat, agama, usia dan latar belakang pendidikan. Kami membangun budaya saling mengasihi di antara para usahawan dan pihak manajemen dengan menanamkan sifat keikhlasan, keyakinan dan kemauan. K-LINK International memberikan kaedah "Win-win" yang akan menjadikan para usahawan menjadi pemimpin yang terpandang di pentas internasional. K-LINK International telah membuktikan bahwa K-LINK International telah banyak meningkatkan taraf hidup banyak orang.</p>
            </div>  
           