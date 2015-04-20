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
						echo form_open('Pencarian/cariData', $attributes);
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
                    <h1><i class="fa fa-bar-chart-o"></i> K-Link Around The World</h1>
                </div>
            </div>
        </div>
<!--        <div class="row">
            <div class="col-xs-12 col-md-7">
                <h2 class="featurette-heading text-primary"> Marketing Plan</h2>                
                <p class="lead"> Salah satu alasan mengapa Kami telah begitu sukses adalah Marketing Plan Kami. Disertai dengan imbalan dan insentif bagi semua anggota; pada semua tingkatan. Kami telah membagi Marketing Plan menjadi 2 bagian; Plan A menawarkan 11 insentif yang menguntungkan, dan Plan B termasuk 'Dana Dinamis', 'Bonus Infinity', 'Bonus Jaringan Berlipat Ganda ', dan skema 'Pembagian Bonus Global'. .
                </p>
                <p class="lead">
                    Kami sangat bangga akan Marketing Plan Kami, klik tombol download di bawah ini dan silakan melihat sendiri.
                </p>                
            </div>
            <div class="col-xs-12 col-md-5">
                <img class="featurette-image img-responsive" src="<?php echo base_url(); ?>images/why_pendapatan.jpg" alt="logo LBC">
            </div>
        </div>-->
        <div class="row">
            <br>
            <!--            Start From here-->
            <div class="col-xs-12 col-xs-12 col-md-6">                                
                <div class="panel panel-default panel-height panel-height">
                    <div class="panel-body">
                        <div class="col-xs-4 col-md-4">
                            <!--                            Flag image, the holder.js/120x120 change to where the image stored-->
                            <div class="thumbnails">
                                <img class="img-responsive" src="<?php echo base_url(); ?>images/flag/India.png" alt="India Flag">
                            </div>
                            <!--                            end of flag image-->
                        </div>
                        <div class="col-xs-8 col-md-8">
                            <h4>Stokist Name - K-Link Healthcare (India) Pvt. Ltd.<i class="fa fa-globe text-info"></i></h4>
                            <address>
                                <strong> <i class="fa fa-map-marker"></i> K-Link Healthcare (India) Pvt. Ltd.</strong><br>
                                Door No.103A, 7th Floor,'NAVIN'S PRESIDIUM',<br>
                                Nelson Manickam Road,<br>
                                Aminjikarai,<br>
                                Chennai - 600029,<br>
                                Tamil Nadu, India.<br>
                                <abbr title="Phone"><i class="fa fa-phone"></i> </abbr> 0091-44-42939898
                                <abbr title="Phone"><i class="fa fa-fax"></i> </abbr> 
                            </address>
                        </div>                        
                    </div>
                </div>               
            </div>
            <!--            This is the end-->
            <!--            Start From here-->
            <div class="col-xs-12 col-md-6">                                
                <div class="panel panel-default panel-height">
                    <div class="panel-body">
                        <div class="col-xs-4 col-md-4">
                            <!--                            Flag image, the holder.js/120x120 change to where the image stored-->
                            <div class="thumbnails">
                                <img class="img-responsive" src="<?php echo base_url(); ?>images/flag/Taiwan.png" alt="Taiwan Flag">
                            </div>
                            <!--                            end of flag image-->
                        </div>
                        <div class="col-xs-8 col-md-8">
                            <h4>Stokist Name - K-Link International Corporation Ltd<i class="fa fa-globe text-info"></i></h4>
                            <address>
                                <strong> <i class="fa fa-map-marker"></i> K-Link International Corporation Ltd</strong><br>
                                4F, No.178, Sec. 3,<br>
                                Sinyi Rd,<br>
                                Da-an District,<br>
                                Taipei City 106,<br>
                                Taiwan(R.O.C)<br>
                                <abbr title="Phone"><i class="fa fa-phone"></i> </abbr> 886 2 7729 5567
                                <abbr title="Phone"><i class="fa fa-fax"></i> </abbr> 
                            </address>
                        </div>                        
                    </div>
                </div>               
            </div>
            <!--            This is the end-->
            <!--            Start From here-->
            <div class="col-xs-12 col-md-6">                                
                <div class="panel panel-default panel-height">
                    <div class="panel-body">
                        <div class="col-xs-4 col-md-4">
                            <!--                            Flag image, the holder.js/120x120 change to where the image stored-->
                            <div class="thumbnails">
                                <img class="img-responsive" src="<?php echo base_url(); ?>images/flag/Singapore.png" alt="Singapore">
                            </div>
                            <!--                            end of flag image-->
                        </div>
                        <div class="col-xs-8 col-md-8">
                            <h4>Stokist Name - Knowledge Link Pte. Ltd.<i class="fa fa-globe text-info"></i></h4>
                            <address>
                                <strong> <i class="fa fa-map-marker"></i> Knowledge Link Pte. Ltd.</strong><br>
                                10 Anson Road #36-02,<br>
                                International Plaza,<br>
                                Singapore, 079903.<br>
                                <abbr title="Phone"><i class="fa fa-phone"></i> </abbr> 65 - 6323 3229
                                <abbr title="Phone"><i class="fa fa-fax"></i> </abbr> 
                            </address>
                        </div>                        
                    </div>
                </div>               
            </div>
            <!--            This is the end-->
            <!--            Start From here-->
            <div class="col-xs-12 col-md-6">                                
                <div class="panel panel-default panel-height">
                    <div class="panel-body">
                        <div class="col-xs-4 col-md-4">
                            <!--                            Flag image, the panel-default panel-height change to where the image stored-->
                            <div class="thumbnails">
                                <img class="img-responsive" src="<?php echo base_url(); ?>images/flag/Philippines.png" alt="Stockist Logo">
                            </div>
                            <!--                            end of flag image-->
                        </div>
                        <div class="col-xs-8 col-md-8">
                            <h4>Stokist Name - K-Link Phil. Inc.<i class="fa fa-globe text-info"></i></h4>
                            <address>
                                <strong> <i class="fa fa-map-marker"></i> K-Link Phil. Inc.</strong><br>
                                Unit 2507-2510, 25th Floor,<br>
                                Robinsons - Equitable Tower,<br>
                                ADB Ave. Corner Poveda Street, Ortigas Center,<br>
                                Pasig City, Manila,<br>
                                Philippines.<br>
                                <abbr title="Phone"><i class="fa fa-phone"></i> </abbr> +63 2 633 1918
                                <abbr title="Phone"><i class="fa fa-fax"></i> </abbr> 
                            </address>
                        </div>                        
                    </div>
                </div>               
            </div>
            <!--            This is the end-->
            <!--            Start From here-->
            <div class="col-xs-12 col-md-6">                                
                <div class="panel panel-default panel-height">
                    <div class="panel-body">
                        <div class="col-xs-4 col-md-4">
                            <!--                            Flag image, the holder.js/120x120 change to where the image stored-->
                            <div class="thumbnails">
                                <img class="img-responsive" src="<?php echo base_url(); ?>images/flag/HongKong.png" alt="Stockist Logo">
                            </div>
                            <!--                            end of flag image-->
                        </div>
                        <div class="col-xs-8 col-md-8">
                            <h4>Stokist Name - K-Link (HK) Limited<i class="fa fa-globe text-info"></i></h4>
                            <address>
                                <strong> <i class="fa fa-map-marker"></i> K-Link (HK) Limited</strong><br>
                                12/F Ashley Nine,<br>
                                9 – 11 Ashley road,<br>
                                Tsimshatsui,<br>
                                Kowloon,<br>
                                Hong Kong.<br>
                                <abbr title="Phone"><i class="fa fa-phone"></i> </abbr> +852 2730 2318
                                <abbr title="Phone"><i class="fa fa-fax"></i> </abbr> 
                            </address>
                        </div>                        
                    </div>
                </div>               
            </div>
            <!--            This is the end-->
            <!--            Start From here-->
            <div class="col-xs-12 col-md-6">                                
                <div class="panel panel-default panel-height">
                    <div class="panel-body">
                        <div class="col-xs-4 col-md-4">
                            <!--                            Flag image, the holder.js/120x120 change to where the image stored-->
                            <div class="thumbnails">
                                <img class="img-responsive" src="<?php echo base_url(); ?>images/flag/Thailand.png" alt="Stockist Logo">
                            </div>
                            <!--                            end of flag image-->
                        </div>
                        <div class="col-xs-8 col-md-8">
                            <h4>Stokist Name - K-Link (Thailand) Co. Ltd<i class="fa fa-globe text-info"></i></h4>
                            <address>
                                <strong> <i class="fa fa-map-marker"></i> K-Link (Thailand) Co. Ltd</strong><br>
                                65/125 15 Flr,<br>
                                Chamnan Phenjati Business Center,<br>
                                Rama 9 Rd., Huay-Kwang,<br>
                                Bangkok 10310,<br>
                                Thailand.<br>
                                <abbr title="Phone"><i class="fa fa-phone"></i> </abbr> +662 643 9800 
                                <abbr title="Phone"><i class="fa fa-fax"></i> </abbr> 
                            </address>
                        </div>                        
                    </div>
                </div>               
            </div>
            <!--            This is the end-->
            <!--            Start From here-->
            <div class="col-xs-12 col-md-6">                                
                <div class="panel panel-default panel-height">
                    <div class="panel-body">
                        <div class="col-xs-4 col-md-4">
                            <!--                            Flag image, the holder.js/120x120 change to where the image stored-->
                            <div class="thumbnails">
                                <img class="img-responsive" src="<?php echo base_url(); ?>images/flag/TimorLeste.png" alt="Stockist Logo">
                            </div>
                            <!--                            end of flag image-->
                        </div>
                        <div class="col-xs-8 col-md-8">
                            <h4>Stokist Name - K-Link Timor Leste<i class="fa fa-globe text-info"></i></h4>
                            <address>
                                <strong> <i class="fa fa-map-marker"></i> K-Link Timor Leste</strong><br>
                                JL. Abilio Mointeiro Mandarin,<br>
                                Dili (Samping Distrik Pengadilan Negri Dili)<br>
                                Timor Leste<br>
                                <abbr title="Phone"><i class="fa fa-phone"></i> </abbr> (+670) 331 2936
                                <abbr title="Phone"><i class="fa fa-fax"></i> </abbr> 
                            </address>
                        </div>                        
                    </div>
                </div>               
            </div>
            <!--            This is the end-->
            <!--            Start From here-->
            <div class="col-xs-12 col-md-6">                                
                <div class="panel panel-default panel-height">
                    <div class="panel-body">
                        <div class="col-xs-4 col-md-4">
                            <!--                            Flag image, the holder.js/120x120 change to where the image stored-->
                            <div class="thumbnails">
                                <img class="img-responsive" src="<?php echo base_url(); ?>images/flag/Australia.png" alt="Stockist Logo">
                            </div>
                            <!--                            end of flag image-->
                        </div>
                        <div class="col-xs-8 col-md-8">
                            <h4>Stokist Name - Allied Distribution Pty Ltd (TA) K-Link Australian Distribution<i class="fa fa-globe text-info"></i></h4>
                            <address>
                                <strong> <i class="fa fa-map-marker"></i> Allied Distribution Pty Ltd (TA) K-Link Australian Distribution</strong><br>
                                4/305 St. Kilda Street<br>
                                Brighton,<br>
                                Victoria 3186,<br>
                                Melbourne,<br>
                                Australia.<br>
                                <abbr title="Phone"><i class="fa fa-phone"></i> </abbr> +613 9592 4290
                                <abbr title="Phone"><i class="fa fa-fax"></i> </abbr> 
                            </address>
                        </div>                        
                    </div>
                </div>               
            </div>
            <!--            This is the end-->
            <!--            Start From here-->
            <div class="col-xs-12 col-md-6">                                
                <div class="panel panel-default panel-height">
                    <div class="panel-body">
                        <div class="col-xs-4 col-md-4">
                            <!--                            Flag image, the holder.js/120x120 change to where the image stored-->
                            <div class="thumbnails">
                                <img class="img-responsive" src="<?php echo base_url(); ?>images/flag/Cambodia.png" alt="Stockist Logo">
                            </div>
                            <!--                            end of flag image-->
                        </div>
                        <div class="col-xs-8 col-md-8">
                            <h4>Stokist Name - Angel Boss Group Co. Ltd. (Mr. Koy Le San)<i class="fa fa-globe text-info"></i></h4>
                            <address>
                                <strong> <i class="fa fa-map-marker"></i> Angel Boss Group Co. Ltd. (Mr. Koy Le San)</strong><br>
                                #50-51 Street 154, Sangkat Phsar Thmey 3,<br>
                                Khan Daun Penh,<br>
                                Phnom Penh,<br> 
                                Cambodia.<br>	
                                <abbr title="Phone"><i class="fa fa-phone"></i> </abbr> (855) 23-221172
                                <abbr title="Phone"><i class="fa fa-fax"></i> </abbr> 
                            </address>
                        </div>                        
                    </div>
                </div>               
            </div>
            <div class="col-xs-12 col-md-6">                                
                <div class="panel panel-default panel-height">
                    <div class="panel-body">
                        <div class="col-xs-4 col-md-4">
                            <!--                            Flag image, the holder.js/120x120 change to where the image stored-->
                            <div class="thumbnails">
                                <img class="img-responsive" src="<?php echo base_url(); ?>images/flag/Cyprus.png" alt="Stockist Logo">
                            </div>
                            <!--                            end of flag image-->
                        </div>
                        <div class="col-xs-8 col-md-8">
                            <h4>Stokist Name - K-LINK CYPRUS LTD (Mr. PAMBOS CHARALAMBOUS) <i class="fa fa-globe text-info"></i></h4>
                            <address>
                                <strong> <i class="fa fa-map-marker"></i> K-LINK CYPRUS LTD (Mr. PAMBOS CHARALAMBOUS)</strong><br>
                                32 Spyrou Kyprianou,<br>
                                Office 202, Issa Court,<br>
                                6058 Larnaca,<br>
                                Cyprus.<br>
                                <abbr title="Phone"><i class="fa fa-phone"></i> </abbr> + 357 24 819 525
                                <abbr title="Phone"><i class="fa fa-fax"></i> </abbr> 
                            </address>
                        </div>                         
                    </div>
                </div>               
            </div>
            <div class="col-xs-12 col-md-6">                                
                <div class="panel panel-default panel-height">
                    <div class="panel-body">
                        <div class="col-xs-4 col-md-4">                           
                            <div class="thumbnails">
                                <img class="img-responsive" src="<?php echo base_url(); ?>images/flag/Congo.png" alt="Stockist Logo">
                            </div>                            
                        </div>
                        <div class="col-xs-8 col-md-8">
                            <h4>Stokist Name - Goma Area Stockist (Kamanzi Runigi Emmanuel)<i class="fa fa-globe text-info"></i></h4>
                            <address>
                                <strong> <i class="fa fa-map-marker"></i> Goma Area Stockist</strong><br>
                                DRC, NORD KIVU, GOMA.Q/Les<br> 
                                Volcans,<br>
                                Congo Goma.<br>
                                <abbr title="Phone"><i class="fa fa-phone"></i> </abbr> +243 997752446
                                <abbr title="Phone"><i class="fa fa-fax"></i> </abbr> 
                            </address>
                        </div>                        
                    </div>
                </div>               
            </div>
            <div class="col-xs-12 col-md-6">                                
                <div class="panel panel-default panel-height">
                    <div class="panel-body">
                        <div class="col-xs-4 col-md-4">
                            <!--                            Flag image, the holder.js/120x120 change to where the image stored-->
                            <div class="thumbnails">
                                <img class="img-responsive" src="<?php echo base_url(); ?>images/flag/Netherlands.png" alt="Stockist Logo">
                            </div>
                            <!--                            end of flag image-->
                        </div>
                        <div class="col-xs-8 col-md-8">
                            <h4>Stokist Name - K-Link Europe B.V.<i class="fa fa-globe text-info"></i></h4>
                            <address>
                                <strong> <i class="fa fa-map-marker"></i> K-Link Europe B.V.</strong><br>
                                Nassauplein 30,<br>
                                2585 EC Den Haag,<br>
                                The Netherlands.<br>
                                <abbr title="Phone"><i class="fa fa-phone"></i> </abbr> +31-70 3114 188
                                <abbr title="Phone"><i class="fa fa-fax"></i> </abbr> 
                            </address>
                        </div>                        
                    </div>
                </div>               
            </div>
            <!--            This is the end-->
            <!--            Start From here-->
            <div class="col-xs-12 col-md-6">                                
                <div class="panel panel-default panel-height">
                    <div class="panel-body">
                        <div class="col-xs-4 col-md-4">
                            <!--                            Flag image, the holder.js/120x120 change to where the image stored-->
                            <div class="thumbnails">
                                <img class="img-responsive" src="<?php echo base_url(); ?>images/flag/Greece.png" alt="Stockist Logo">
                            </div>
                            <!--                            end of flag image-->
                        </div>
                        <div class="col-xs-8 col-md-8">
                            <h4>Stokist Name - Stylianos Sp. Katechis<i class="fa fa-globe text-info"></i></h4>
                            <address>
                                <strong> <i class="fa fa-map-marker"></i> Stylianos Sp. Katechis</strong><br>
                                17, G.Theotoki Str.<br>
                                GR185 38, Piraeus,<br>
                                Greece <br>
                                <abbr title="Phone"><i class="fa fa-phone"></i> </abbr> +30-210 451 1375
                                <abbr title="Phone"><i class="fa fa-fax"></i> </abbr> 
                            </address>
                        </div>                        
                    </div>
                </div>               
            </div>
            <!--            This is the end-->
            <!--            Start From here-->
            <div class="col-xs-12 col-md-6">                                
                <div class="panel panel-default panel-height">
                    <div class="panel-body">
                        <div class="col-xs-4 col-md-4">
                            <!--                            Flag image, the holder.js/120x120 change to where the image stored-->
                            <div class="thumbnails">
                                <img class="img-responsive" src="<?php echo base_url(); ?>images/flag/Ghana.png" alt="Stockist Logo">
                            </div>
                            <!--                            end of flag image-->
                        </div>
                        <div class="col-xs-8 col-md-8">
                            <h4>Stokist Name - Ghana Stockist<i class="fa fa-globe text-info"></i></h4>
                            <address>
                                <strong> <i class="fa fa-map-marker"></i> Ghana Stockist</strong><br>
                                P.O.Box 902,<br> 
                                Mamprobi,<br> 
                                Accra,<br> 
                                Ghana.<br>
                                <abbr title="Phone"><i class="fa fa-phone"></i> </abbr> +233 277 481 998
                                <abbr title="Phone"><i class="fa fa-fax"></i> </abbr> 
                            </address>
                        </div>                        
                    </div>
                </div>               
            </div>
            <!--            This is the end-->
            <!--            Start From here-->
            <div class="col-xs-12 col-md-6">                                
                <div class="panel panel-default panel-height">
                    <div class="panel-body">
                        <div class="col-xs-4 col-md-4">
                            <!--                            Flag image, the holder.js/120x120 change to where the image stored-->
                            <div class="thumbnails">
                                <img class="img-responsive" src="<?php echo base_url(); ?>images/flag/Kenya.png" alt="Stockist Logo">
                            </div>
                            <!--                            end of flag image-->
                        </div>
                        <div class="col-xs-8 col-md-8">
                            <h4>Stokist Name - Africa K-Link International Limited (Daniel Wong)<i class="fa fa-globe text-info"></i></h4>
                            <address>
                                <strong> <i class="fa fa-map-marker"></i> Africa K-Link International Limited (Daniel Wong)</strong><br>
                                13th Floor, View Park Tower,<br>
                                Utalii Lane,<br> 
                                Nairobi,<br>
                                Kenya.<br>
                                <abbr title="Phone"><i class="fa fa-phone"></i> </abbr> +254 712 845213
                                <abbr title="Phone"><i class="fa fa-fax"></i> </abbr> 
                            </address>
                        </div>                        
                    </div>
                </div>               
            </div>
            <!--            This is the end-->
            <!--            Start From here-->
            <div class="col-xs-12 col-md-6">                                
                <div class="panel panel-default panel-height">
                    <div class="panel-body">
                        <div class="col-xs-4 col-md-4">
                            <!--                            Flag image, the holder.js/120x120 change to where the image stored-->
                            <div class="thumbnails">
                                <img class="img-responsive" src="<?php echo base_url(); ?>images/flag/Burma.png" alt="Stockist Logo">
                            </div>
                            <!--                            end of flag image-->
                        </div>
                        <div class="col-xs-8 col-md-8">
                            <h4>Stokist Name - U Zaw Myo Aung (Zack) Link & Win Trading Co., Ltd<i class="fa fa-globe text-info"></i></h4>
                            <address>
                                <strong> <i class="fa fa-map-marker"></i> U Zaw Myo Aung (Zack) Link & Win Trading Co., Ltd</strong><br>
                                No.446, Ground Floor,<br> 
                                Thein Phyu Road,<br>
                                Mingalar TaungNyunt Tsp,<br>
                                Yangon,<br> 
                                Myanmar.<br>
                                <abbr title="Phone"><i class="fa fa-phone"></i> </abbr> +95 9421079265
                                <abbr title="Phone"><i class="fa fa-fax"></i> </abbr> 
                            </address>
                        </div>                        
                    </div>
                </div>               
            </div>
            <!--            This is the end-->
            <!--            Start From here-->
            <div class="col-xs-12 col-md-6">                                
                <div class="panel panel-default panel-height">
                    <div class="panel-body">
                        <div class="col-xs-4 col-md-4">
                            <!--                            Flag image, the holder.js/120x120 change to where the image stored-->
                            <div class="thumbnails">
                                <img class="img-responsive" src="<?php echo base_url(); ?>images/flag/NewZealand.png" alt="Stockist Logo">
                            </div>
                            <!--                            end of flag image-->
                        </div>
                        <div class="col-xs-8 col-md-8">
                            <h4>Stokist Name - K-Link Global Health Limited<i class="fa fa-globe text-info"></i></h4>
                            <address>
                                <strong> <i class="fa fa-map-marker"></i> K-Link Global Health Limited</strong><br>
                                23 Taunton Terrace,<br>
                                Blockhouse Bay,<br>
                                0600 Auckland,<br> 
                                New Zealand.<br>
                                <abbr title="Phone"><i class="fa fa-phone"></i> </abbr> +64-9-626 5321
                                <abbr title="Phone"><i class="fa fa-fax"></i> </abbr> 
                            </address>
                        </div>                        
                    </div>
                </div>               
            </div>
            <!--            This is the end-->
            <!--            Start From here-->
            <div class="col-xs-12 col-md-6">                                
                <div class="panel panel-default panel-height">
                    <div class="panel-body">
                        <div class="col-xs-4 col-md-4">
                            <!--                            Flag image, the holder.js/120x120 change to where the image stored-->
                            <div class="thumbnails">
                                <img class="img-responsive" src="<?php echo base_url(); ?>images/flag/Nigeria.png" alt="Stockist Logo">
                            </div>
                            <!--                            end of flag image-->
                        </div>
                        <div class="col-xs-8 col-md-8">
                            <h4>Stokist Name - Prince A Ezeana<i class="fa fa-globe text-info"></i></h4>
                            <address>
                                <strong> <i class="fa fa-map-marker"></i> Prince A Ezeana</strong><br> 
                                Suite 9A,<br> 
                                Patsy Plaza Plot 359,<br>
                                Ebitu Ukiwe Street,<br>
                                Jabi,<br> 
                                Fct Abuja Nigeria.<br> 
                                <abbr title="Phone"><i class="fa fa-phone"></i> </abbr> +234 7052 136 757
                                <abbr title="Phone"><i class="fa fa-fax"></i> </abbr> 
                            </address>
                        </div>                        
                    </div>
                </div>               
            </div>
            <!--            This is the end-->
            <!--            Start From here-->
            <div class="col-xs-12 col-md-6">                                
                <div class="panel panel-default panel-height">
                    <div class="panel-body">
                        <div class="col-xs-4 col-md-4">
                            <!--                            Flag image, the holder.js/120x120 change to where the image stored-->
                            <div class="thumbnails">
                                <img class="img-responsive" src="<?php echo base_url(); ?>images/flag/Norway.png" alt="Stockist Logo">
                            </div>
                            <!--                            end of flag image-->
                        </div>
                        <div class="col-xs-8 col-md-8">
                            <h4>Stokist Name - NOMS01 K-Link Norway AS<i class="fa fa-globe text-info"></i></h4>
                            <address>
                                <strong> <i class="fa fa-map-marker"></i> NOMS01 K-Link Norway AS</strong><br>
                                Industriveien 6,<br>
                                3083 Holmestrand,<br>
                                Norway.<br>
                                <abbr title="Phone"><i class="fa fa-phone"></i> </abbr> +47-33096200
                                <abbr title="Phone"><i class="fa fa-fax"></i> </abbr> 
                            </address>
                        </div>                        
                    </div>
                </div>               
            </div>
            <!--            This is the end-->
            <!--            Start From here-->
            <div class="col-xs-12 col-md-6">                                
                <div class="panel panel-default panel-height">
                    <div class="panel-body">
                        <div class="col-xs-4 col-md-4">
                            <!--                            Flag image, the holder.js/120x120 change to where the image stored-->
                            <div class="thumbnails">
                                <img class="img-responsive" src="<?php echo base_url(); ?>images/flag/PapuaNewGuinea.png" alt="Stockist Logo">
                            </div>
                            <!--                            end of flag image-->
                        </div>
                        <div class="col-xs-8 col-md-8">
                            <h4>Stokist Name - Vixen No.2 Ltd (Peter Allen)<i class="fa fa-globe text-info"></i></h4>
                            <address>
                                <strong> <i class="fa fa-map-marker"></i> Vixen No.2 Ltd (Peter Allen)</strong><br> 
                                Nesian Hair & Beauty,<br>
                                Steamships Compound,<br> 
                                Waigani Drive, Hohola NCD,<br>
                                Port Moresby,<br> 
                                Papua New Guinea<br>
                                <abbr title="Phone"><i class="fa fa-phone"></i> </abbr> +675 323 2877
                                <abbr title="Phone"><i class="fa fa-fax"></i> </abbr> 
                            </address>
                        </div>                        
                    </div>
                </div>               
            </div>
            <!--            This is the end-->
            <!--            Start From here-->
            <div class="col-xs-12 col-md-6">                                
                <div class="panel panel-default panel-height">
                    <div class="panel-body">
                        <div class="col-xs-4 col-md-4">
                            <!--                            Flag image, the holder.js/120x120 change to where the image stored-->
                            <div class="thumbnails">
                                <img class="img-responsive" src="<?php echo base_url(); ?>images/flag/Poland.png" alt="Stockist Logo">
                            </div>
                            <!--                            end of flag image-->
                        </div>
                        <div class="col-xs-8 col-md-8">
                            <h4>Stokist Name - PLS01 K-LINK POLAND<i class="fa fa-globe text-info"></i></h4>
                            <address>
                                <strong> <i class="fa fa-map-marker"></i> PLS01 K-LINK POLAND</strong><br>
                                50-570 Wrocław,<br> 
                                ul.J.Kukuczki 19/5,<br>
                                Poland.<br>
                                <abbr title="Phone"><i class="fa fa-phone"></i> </abbr> +48-713444787
                                <abbr title="Phone"><i class="fa fa-fax"></i> </abbr> 
                            </address>
                        </div>                        
                    </div>
                </div>               
            </div>
            <!--            This is the end-->
            <!--            Start From here-->
            <div class="col-xs-12 col-md-6">                                
                <div class="panel panel-default panel-height">
                    <div class="panel-body">
                        <div class="col-xs-4 col-md-4">
                            <!--                            Flag image, the holder.js/120x120 change to where the image stored-->
                            <div class="thumbnails">
                                <img class="img-responsive" src="<?php echo base_url(); ?>images/flag/Sudan.png" alt="Stockist Logo">
                            </div>
                            <!--                            end of flag image-->
                        </div>
                        <div class="col-xs-8 col-md-8">
                            <h4>Stokist Name - Juba Area Stockist (Ms Margaret Juan Simon)<i class="fa fa-globe text-info"></i></h4>
                            <address>
                                <strong> <i class="fa fa-map-marker"></i> Juba Area Stockist (Ms Margaret Juan Simon)</strong><br> 
                                Melakia(near Konyo-Konyo Market),<br>
                                Juba,<br> 
                                South Sudan.<br>
                                <abbr title="Phone"><i class="fa fa-phone"></i> </abbr> +211 955 210 514
                                <abbr title="Phone"><i class="fa fa-fax"></i> </abbr> 
                            </address>
                        </div>                        
                    </div>
                </div>               
            </div>
            <!--            This is the end-->
            <!--            Start From here-->
            <div class="col-xs-12 col-md-6">                                
                <div class="panel panel-default panel-height">
                    <div class="panel-body">
                        <div class="col-xs-4 col-md-4">
                            <!--                            Flag image, the holder.js/120x120 change to where the image stored-->
                            <div class="thumbnails">
                                <img class="img-responsive" src="<?php echo base_url(); ?>images/flag/Tanzania.png" alt="Stockist Logo">
                            </div>
                            <!--                            end of flag image-->
                        </div>
                        <div class="col-xs-8 col-md-8">
                            <h4>Stokist Name - Dar Es Salaam Area Stockist (Antonia Lekule)<i class="fa fa-globe text-info"></i></h4>
                            <address>
                                <strong> <i class="fa fa-map-marker"></i> Dar Es Salaam Area Stockist (Antonia Lekule)</strong><br> 
                                Mwenge Road, (100 meters from traffic lights),<br>
                                Josam House Ground Floor,<br> 
                                Dar Es Salaam,<br> 
                                Tanzania.<br>
                                <abbr title="Phone"><i class="fa fa-phone"></i> </abbr> +255 713733889
                                <abbr title="Phone"><i class="fa fa-fax"></i> </abbr> 
                            </address>
                        </div>                        
                    </div>
                </div>               
            </div>
            <!--            This is the end-->
            <!--            Start From here-->
            <div class="col-xs-12 col-md-6">                                
                <div class="panel panel-default panel-height">
                    <div class="panel-body">
                        <div class="col-xs-4 col-md-4">
                            <!--                            Flag image, the holder.js/120x120 change to where the image stored-->
                            <div class="thumbnails">
                                <img class="img-responsive" src="<?php echo base_url(); ?>images/flag/Uganda.png" alt="Stockist Logo">
                            </div>
                            <!--                            end of flag image-->
                        </div>
                        <div class="col-xs-8 col-md-8">
                            <h4>Stokist Name - Africa K-Link International Uganda Ltd (Moses Goh)<i class="fa fa-globe text-info"></i></h4>
                            <address>
                                <strong> <i class="fa fa-map-marker"></i> Africa K-Link International Uganda Ltd (Moses Goh)</strong><br>
                                Metropole House, Plot 8/10,<br> 
                                Entebbe Road, P.O.Box 10609,<br> 
                                Kampala,<br> 
                                Uganda.<br>
                                <abbr title="Phone"><i class="fa fa-phone"></i> </abbr> +852 2730 2318
                                <abbr title="Phone"><i class="fa fa-fax"></i> </abbr> 
                            </address>
                        </div>                        
                    </div>
                </div>               
            </div>
            <!--            This is the end-->
            <!--            Start From here-->
            <div class="col-xs-12 col-md-6">                                
                <div class="panel panel-default panel-height">
                    <div class="panel-body">
                        <div class="col-xs-4 col-md-4">
                            <!--                            Flag image, the holder.js/120x120 change to where the image stored-->
                            <div class="thumbnails">
                                <img class="img-responsive" src="<?php echo base_url(); ?>images/flag/Vietnam.png" alt="Stockist Logo">
                            </div>
                            <!--                            end of flag image-->
                        </div>
                        <div class="col-xs-8 col-md-8">
                            <h4>Stokist Name - K-Link Joint Stock Company (Ms. Tran Van Anh)<i class="fa fa-globe text-info"></i></h4>
                            <address>
                                <strong> <i class="fa fa-map-marker"></i> K-Link Joint Stock Company (Ms. Tran Van Anh)</strong><br>
                                K-Link Joint Stock Company (Ms. Tran Van Anh)
                                100 Nguy Nhu Kon Tum Street,<br> 
                                Nhan Chinh Ward,<br>
                                Thanh Xuan District,<br> 
                                Hanoi,<br>
                                Vietnam.<br>
                                <abbr title="Phone"><i class="fa fa-phone"></i> </abbr> 04 628 54098
                                <abbr title="Phone"><i class="fa fa-fax"></i> </abbr> 
                            </address>
                        </div>                        
                    </div>
                </div>               
            </div>
            <!--            This is the end-->
            <!--            Start From here-->
            <div class="col-xs-12 col-md-6">                                
                <div class="panel panel-default panel-height">
                    <div class="panel-body">
                        <div class="col-xs-4 col-md-4">
                            <!--                            Flag image, the holder.js/120x120 change to where the image stored-->
                            <div class="thumbnails">
                                <img class="img-responsive" src="<?php echo base_url(); ?>images/flag/HongKong.png" alt="Stockist Logo">
                            </div>
                            <!--                            end of flag image-->
                        </div>
                        <div class="col-xs-8 col-md-8">
                            <h4>Stokist Name - K-Link (HK) Limited<i class="fa fa-globe text-info"></i></h4>
                            <address>
                                <strong> <i class="fa fa-map-marker"></i> K-Link (HK) Limited</strong><br>

                                <abbr title="Phone"><i class="fa fa-phone"></i> </abbr> +852 2730 2318
                                <abbr title="Phone"><i class="fa fa-fax"></i> </abbr> 
                            </address>
                        </div>                        
                    </div>
                </div>               
            </div>

        </div>
       