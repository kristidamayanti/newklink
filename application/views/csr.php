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
                    <h1><i class="fa fa-bar-chart-o"></i> Corporate Social Responsibility</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <h2 class="featurette-heading text-primary"> Corporate Social Responsibility</h2>
                <p class="lead">Posisi sebagai salah satu market leader di industri multi level marketing mendorong K-Link untuk menjadi perusahaan multi level marketing yang berbeda dari yang lain. Tidak hanya sebuah entiti bisnes yang mewujudkan peluang-peluang pekerjaan kepada rakyat Indonesia khasnya, K-Link percaya bahawa sebuah perusahaan dan masyarakat saling memerlukan antara satu sama lain.</p>

                <p class="lead">Kepedulian K-Link terhadap lingkungan serta masalah sosial dan kemanusiaan telah berlangsung sejak masa-masa awal berdirinya. Selain menyalurkan dana perusahaan, K-Link secara rutin membuat pos-pos dana untuk kegiatan sosial dan kemanusiaan. Manajemen K-Link memiliki pandangan bahwa sebagai bagian dari masyarakat Indonesia, K-Link harus berkontribusi terhadap kemajuan kesejahteraan masyarakat Indonesia secara umum. Hal ini yang mendorong K-Link untuk membentuk Yayasan K-Link Peduli atau K-Link Care Foundation pada saat Ulangtahun ke 10 K-Link Indonesia, November 2011, agar kegiatan-kegiatan sosial dan kemanusiaan tersebut dapat lebih terorganisir dengan baik dan dapat menjangkau lebih banyak pihak yang membutuhkan. </p>

                <h2>Misi K-Link Care Foundation</h2>
                <p class="lead">K-Link Care merupakan yayasan nirlaba yang dibentuk oleh K-Link bertujuan sebagai wadah manifestasi Corporate Social Responsibility. K-Link Care Foundation berperan aktif pada bidang sosial, budaya, pendidikan dan kemanusiaan mendukung program pemerintah dalam pembangunan negara dan masyarakat Indonesia yang sejahtera. Aktivitas K-Link Care Foundation</p>

                <p class="lead">Selain keterlibatan K-Link Care Foudation dalam kegiatan sosial dan kemanusiaan termasuk bencana alam seperti gempa dan banjir, terdapat juga program rutin dan berkelanjutan seperti pemberian beasiswa buat pelajar SMP dam SMU berprestasi dari keluarga kurang mampu, santunan rumah anak yatim seperti di Jogjakarta, Bandung dan Bekasi, program donor darah dan acara korban tahunan sempena Eiduladha. Selain itu, K-Link Care Foundation juga dengan kerjasama Rumah Zakat bertindak menyalurkan zakat kepada asnaf-asnaf yang berhak keseluruh Indonesia. </p>

                <?php
                
                echo anchor('http://www.k-linkcarefoundation.com', 'Visit www.k-linkcarefoundation.com', "class='btn btn-info'");
                ?>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-responsive" src="<?php echo base_url(); ?>images/care.jpg" alt="logo LBC">
            </div>
        </div>
      