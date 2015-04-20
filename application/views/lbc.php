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
                <img class="img-responsive" src="<?php echo base_url(); ?>images/ladies-header.jpg" alt="Stockist Logo">
            </div>
        </div>
        
        <hr class="featurette-divider">
        
        <div class="row">
        	<div class="col-xs-12 col-md-9">            
            <div class="panel panel-success" style="border-radius:40px 0px 2px 2px; border-color:#ffadc8"> 
            <div class="panel-lbc">
                	<img class="img-responsive" src="<?php echo base_url() . 'images/header-lbc.jpg' ?>" alt="K-Link Indonesia">
                </div>               
                <div class="panel-body">
                    <img class="thumbnail img-responsive" style="float:left; margin-right:10px;" src="<?php echo base_url(); ?>images/logo_lbc.jpg" alt="logo LBC">                    
                    <h4 style="color:#ef5387;"><p>LADIES BEAUTY CLUB</p></h4>
                    <p>Ladies Beauty Club merupakan Klub yang terbentuk pada September 2013 dengan beranggotakan seluruh Crown Ambassador (CA) Ladies dan member ladies yang telah memenuhi persyaratan menjadi anggota LBC. Sebagai pelindung dari Klub ini adalah Dato' DR. H. MD. Radzi Saleh sementara Product Manager (PM) Fatma Dwi Amartani bertugas sebagai sekretaris dari LBC. </p>
                    <p>Saat ini telah ada 4 (empat) orang wanita sukses yang duduk sebagai dewan LBC yaitu, Senior Crown Ambassador Triana Kurniati, CA Annisa Permatasari, CA Solekhatun, dan CA Dr. Nila Farahdiba Daulay. Seluruh istri dari Royal Crown Ambassador yang telah memiliki peringkat CA dan diatasnya, dapat otomatis menjadi dewan LBC. Dewan LBC inilah yang dapat memberikan saran mengenai kegiatan-kegiatan LBC, bentuk-bentuk promosi untuk para member LBC serta hal-hal lainnya yang berkaitan dengan LBC. </p>
                </div>                
            </div>            
        	</div>
            
            <div class="col-xs-12 col-md-3">            
            <div class="panel panel-success" style="border-radius:2px 0px 2px 2px; border-color:#ffadc8;">                
                <div class="panel-body">
                    <h4 style="color:#ef5387;"><p class="text-center">Syarat Menjadi Anggota LBC</p></h4>
                    <ol style="padding-left:10px;">
                        <li>Wanita</li>
                        <li>Semua Peringkat</li>
                        <li>Belanja 3 Bulan berturut-turut 400 BV.</li>
                        <li>Keanggotaan berlaku selama setahun dan perlu diperbaharui, dimana setiap anggotanya mendapatkan kartu keanggotaan LBC.</li>
                	</ol>
                    <img class="img-responsive" src="<?php echo base_url(); ?>images/join-lbc.jpg" alt="join LBC">
                </div>                
            </div>            
        	</div>
        
        </div>
        
        <hr class="featurette-divider" style="border-color:#F06;">
        
        <div id="houseofbeauty" class="row">
        
        	<div class="col-xs-12 col-md-3">            
            <div class="panel panel-success" style="border-radius:2px 0px 2px 2px; border-color:#ffadc8;">                
                <div class="panel-body">
                    <h4 style="color:#ef5387;"><p class="text-center">K-LINK TOWER lantai 7</p></h4>
                    <address>
                    JL.Gatot Subroto Kav. 59 A, Jakarta Selatan 12950 - Indonesia<br><br>
                    <ul class="address" style="padding-left:5px;">
                        <li><span class="glyphicon glyphicon-earphone"></span> Tel. 021 290 27 000</li>                        
                    </ul>
                    <p>Business Hour</p>
                    <ul class="address" style="padding-left:5px;">            
                        <li><span class="glyphicon glyphicon-time"></span> Monday - Friday :<br> <span style="padding-left:15px; margin-bottom:10px;">08:00am - 19:00pm</span></li>
                        <li><span class="glyphicon glyphicon-time"></span> Saturday : <br><span style="padding-left:15px; margin-bottom:10px;">08:00am - 16:00pm</span></li>
                        <li><span class="glyphicon glyphicon-time"></span> Sunday We Are Close</li>
                    </ul> 
                </address>
                    <img class="img-responsive" src="<?php echo base_url(); ?>images/location-icon.jpg" alt="join LBC">
                </div>                
            </div>            
        	</div>
            
            <div class="col-xs-12 col-md-9">            
            <div class="panel panel-success" style="border-radius:40px 0px 2px 2px; border-color:#ffadc8"> 
            <div class="panel-lbc">
                	<img class="img-responsive" src="<?php echo base_url() . 'images/header-hob.jpg' ?>" alt="K-Link Indonesia">
                </div>               
                <div class="panel-body">
                    <img class="thumbnail img-responsive" style="float:right; margin-left:10px;" src="<?php echo base_url(); ?>images/logo_houseofbeautys.jpg" alt="logo LBC">
                    <h4 style="color:#ef5387;"><p>HOUSE OF BEAUTY</p></h4>
                    <p>Untuk memenuhi kebutuhan akan perawatan kesehatan dan kecantikan, K-Link membuka salon yang menyediakan berbagai perawatan yang penting bagi wanita dan pria serta terbuka untuk umum (Member K-Link dan Non Member). Dengan menggunakan beragam produk yang menjadi produk andalan K-Link serta para terapis berpengalaman, K-Link House of Beauty hadir dengan menawarkan salon beratmosfir nyaman dan modern.</p>
                    <p>House of Beauty ini buka setiap harinya kecuali hari Minggu dari Senin sampai Jumat mulai pukul 08.00 hingga pukul 19.00 WIB dan Sabtu mulai pukul 08.00 hingga pukul 16.00 WIB. Sambil berbelanja di K-Link Tower, Anda dapat menikmati berbagai macam perawatan yang tersedia di K-Link House of Beauty. Bagi para wanita berhijab yang ingin mendapatkan perawatan dengan nyaman, House of Beauty terbuka khusus untuk ladies pada hari Selasa dan Kamis. </p><br>


                    <h4 style="color:#ef5387;"><p>Other Article</p></h4>
                    <ol> 
						<?php
                        if (count($houseOfBeauty) > 0):
                            foreach ($houseOfBeauty as $hoB):
                                echo "<li>" . anchor('/blog/house_of_beauty/' . $hoB->id . '/' . url_title($hoB->bl_title), $hoB->bl_title) . "</li>";
                            endforeach;
                        endif;
                        ?> 
                	</ol>
                </div>                
            </div>            
        	</div>
        
        </div>
        
        <hr class="featurette-divider" style="border-color:#F06;">
        
        <div id="beautytips" class="row">
        	<div class="col-xs-12 col-md-6">            
            <div class="panel panel-success" style="border-radius:40px 0px 2px 2px; border-color:#ffadc8"> 
            <div class="panel-lbc">
                	<img class="img-responsive" src="<?php echo base_url() . 'images/header-beauty.jpg' ?>" alt="K-Link Indonesia">
                </div>               
                <div class="panel-body">
                    <img class="img-responsive" style="float:left;" src="<?php echo base_url(); ?>images/beauty-tips-lbc.jpg" alt="beauty tips">                    
                    <h4 style="color:#ef5387; display:none;"><p>BEAUTY TIPS</p></h4>
                    <p>Penampilan yang menarik tentunya dapat menambah rasa percaya diri Anda. Dengan merawat tubuh secara baik dan benar, Anda bisa mendapatkan tubuh yang sehat, cantik dan menarik tanpa perlu mengeluarkan biaya yang mahal. Mau tahu caranya? Beberapa tips kecantikan dan informasi perawatan kecantikan mulai dari perawatan wajah, kulit, rambut, kuku dan lainnya tersedia disini. Simak tips kecantikan kali ini: </p>
                    <ol>
                    <?php
                    if (count($beautyTips) > 0):
                        foreach ($beautyTips as $tipsRow):
                            echo "<li>" . anchor('/blog/tips/' . $tipsRow->id . '/' . url_title($tipsRow->bl_title), $tipsRow->bl_title) . "</li>";
                        endforeach;
                    endif;
                    ?> 
                </ol>
                </div>                
            </div>            
        	</div>   
            
            <div id="recipes" class="col-xs-12 col-md-6">            
            <div class="panel panel-success" style="border-radius:40px 0px 2px 2px; border-color:#ffadc8"> 
            <div class="panel-lbc">
                	<img class="img-responsive" src="<?php echo base_url() . 'images/header-recipes.jpg' ?>" alt="K-Link Indonesia">
                </div>               
                <div class="panel-body">
                    <img class="img-responsive" src="<?php echo base_url(); ?>images/recipes-lbc.jpg" alt="recipes">                    
                    <h4 style="color:#ef5387; display:none;"><p>RECIPES</p></h4>
                    <p>Tahukah Anda bahwa produk-produk K-Link pun ada yang bisa diolah menjadi makanan lezat dan minuman yang menyegarkan? Mari lihat lebih jauh untuk resep-resep yang disajikan berikut ini</p>
                    <ol>
                    <?php
                    if (count($resep) > 0):
                        foreach ($resep as $resepRow):
                            echo "<li>" . anchor('/blog/recipe/' . $resepRow->id . '/' . url_title($resepRow->bl_title), $resepRow->bl_title) . "</li>";
                        endforeach;
                    endif;
                    ?> 
                </ol>
                </div>                
            </div>            
        	</div> 
        </div>
