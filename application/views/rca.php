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
                    <h1>Our Royal Crown Ambassadors</h1>
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
                <h2 class="featurette-heading text-primary">Mari bertemu <span class="text-muted">Royal Crown Ambassadors Kami</span></h2>
                <p class="lead">Sementara beberapa distributor memutuskan untuk menjual produk K-Link hanya untuk memiliki sedikit uang tambahan, sedangkan yang lainnya, seperti Royal Crown Ambassador kami, telah membangun perusahaan raksasa yang membentang diseluruh Indonesia dan beberapa negara lainnya.</p>
                <p class="lead">Royal Crown Ambassador ini serta ratusan lainnya seperti mereka telah mengambil keuntungan dari pendapatan fantastis yang diberikan oleh K-Link</p>
                <p class="lead">Berikut adalah Royal Crown Ambassador K-Link Indonesia. Silahkan membaca kisah-kisah mereka dan terinspirasilah untuk membuat sendiri cerita pengalaman anda di K-Link</p>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-responsive" src="<?php echo base_url(); ?>images/rca.png" alt="RCA">
            </div>

            <!--        start-->
            <hr class="featurette-divider">
            <div id="houseofbeauty" class="row featurette">
                <div class="col-md-5">
                    <img class="featurette-image img-responsive" src="<?php echo base_url(); ?>images/CALVIN.jpg" alt="Calvin">
                </div>
                <div class="col-md-7">
                    <h2 class="featurette-heading text-primary">Calvin</h2>
                    <p class="lead">Tekad mengubah kehidupan membawa lajang kelahiran Pematang Siantar, Sumatera Utara ini merantau ke Yogyakarta. Saat kuliah di semester tujuh Calvin mulai mengenal MLM. Enam tahun tidak mengubah kehidupan finansialnya. Sisi positifnya pembawaan Calvin menjadi lebih terbuka, dari yang sebelumnya introvert.</p>
                    <p class="lead">Calvin memutar haluan, kembali menggeluti bisnis konvensional, hasilnya lumayan. Dampak negatifnya bisnis itu membuatnya stres. “Banyak yang mesti diperhitungkan dan dipikirkan, mulai dari ongkos produksi, bahan baku, gaji karyawan dan banyak lagi yang lain yang membuat kita tidak berhenti untuk memutar otak untuk mencari solusinya,” tutur Calvin.</p>
                    <p class="lead">Calvin bergabung dengan K-LINK pada 2002. “Awalnya saya tertarik dengan bisnis K-LINK karena produknya yang luar biasa, karena itu saya berani datang ke Jakarta dan menjual mobil untuk modal mendirikan mobile stockist,” kisahnya.</p>
                    <p class="lead">Akibat tidak mengikuti sistem, bisnisnya tidak berkembang. Berangkat dari kesadaran itulah perlahan-lahan Calvin masuk ke dalam sistem, “Ketika masuk dalam sistem K-System, saya menyadari bahwa inilah support system yang saya cari. Support system tunggal dan mudah diduplikasi oleh mitra-mitra kerja saya, sejak saat itulah bisnis saya perlahan-lahan berkembang pesat.”</p>
                    <p class="lead">Belajar dari pengalaman dan melakukan apa yang diajarkan K-System membuat bisnisnya berkembang luas hingga ke pelosok-pelosok nusantara, “Memang banyak tantangan dalam menjalankan bisnis ini, namum jika Anda yakin, percaya kepada upline, fokus dan jangan berhenti, Anda pasti akan sukses,” ujarnya membagi resep sukses.</p>
                </div>
            </div>
            <hr class="featurette-divider">
            <div id="houseofbeauty" class="row featurette">            
                <div class="col-md-7">
                    <h2 class="featurette-heading text-primary">ENTIN Y. H. HARTOYO</h2>
                    <p class="lead">Saat lulus dari SMKK sebetulnya bungsu dari 7 bersaudara ini ingin melanjutkan kuliah, tapi apa daya ternyata orang tua tidak punya biaya. Akhirnya setiap pulang ngantor di sebuah perusahaan elektronik ia mengikuti kursus untuk menambah pengetahuan. Kesibukan seringkali memaksanya pulang larut sehingga ibu dua putri ini memutuskan untuk kos.</p>
                    <p class="lead">Di tempat kos itulah ia berkenalan dengan pria yang sekarang menjadi suami tercinta, Santoso Nyotokusumo, “Darinya saya melihat walaupun mungkin pendidikan kami terbatas, namun ada yang bisa membatasi kemauan dan semangat untuk menjadi lebih baik.”</p>
                    <p class="lead">Kerja keras suami rupanya memberi inspirasi besar. Tahun 2002 Santoso bergabung dengan K-LINK. Jujur, pada mulanya Entin tidak yakin dengan MLM karena pernah menjalaninya, tapi lambut laun kerja keras dan keuletan suami memperlihatkannya pada hasil yang berbeda. “Saya banyak belajar untuk melakukan sesuatu dengan sungguh-sungguh dan maksimal,” tuturnya. Filosofinya, semut saja tidak akan menyerah sebelum apa yang menjadi tujuannya berhasil. Entin pun harus begitu.</p>
                    <p class="lead">la putuskan untuk bergabung di K-LINK dan melakukan usaha sekeras kerja suami yang ia lihat selama ini. Meski sudah mencapai peringkat Royal Crown Ambassador sampai hari ini ia masih terus belajar untuk mensyukuri dan menikmati hidup. Baginya tiada kesuksesan tanpa usaha dan kerja keras.</p>
                    <p class="lead">“Satu yang harus selalu diingat adalah jangan letakkan keberhasilan di atas kepala sebagai atap tapi letakkan itu di depan kita sebagai pintu untuk menolong banyak orang. Saya berharap keluarga saya juga bisa menjadi saluran berkat dan memotivasi banyak orang.</p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-responsive" src="<?php echo base_url(); ?>images/ENTIN.jpg" alt="ENTIN">
                </div>
            </div>
            <hr class="featurette-divider">
            <div id="houseofbeauty" class="row featurette">
                <div class="col-md-5">
                    <img class="featurette-image img-responsive" src="<?php echo base_url(); ?>images/ERWIN.jpg" alt="ERWIN">
                </div>
                <div class="col-md-7">
                    <h2 class="featurette-heading text-primary">H. ERWIN</h2>
                    <p class="lead">“Banyak faktor yang memotivasi saya bergabung di K-LINK. Faktor utamanya adalah produk yang istimewa,” ujar Erwin. Marketing Plan yang menganut sistem break away, support system tunggal yaitu K-System dan pemimpin perusahaan yang sudah berpengalaman di dunia Multi Level Marketing (MLM) merupakan keunggulan lain yang semakin membulatkan niatnya untuk bergabung.</p>
                    <p class="lead">Saat diperkenalkan pada bisnis K-LINK pada tahun 2002, Erwin tidak langsung memutuskan bergabung. Pria asal Medan ini punya segudang pengalaman di bisnis MLM, dan tak ingin gagal lagi. Butuh waktu hampir satu tahun untuk mempelajari semua hal tentang K-LINK. Setelah menghadiri beberapa pertemuan K-LINK akhirnya April 2003 Erwin memutuskan bergabung.</p>
                    <p class="lead">Berbekal pengalaman dari perusahaan-perusahaan MLM sebelumnya, Erwin banyak belajar untuk membangun bisnisnya di K-LINK. Berkat komitmen terhadap impian dan setia pada prosesnya, Erwin mampu meraih peringkat Emerald Manager hanya dalam 70 hari.</p>
                    <p class="lead">Saat ini jaringan yang dimiliki ayah satu putra ini terbentang dari ujung barat hingga timur Indonesia. Dua peringkat tertinggi di K-LINK, yaitu Royal Crown Ambassador dan anggota Executive Leaders Club pun sudah diraihnya.</p>
                </div>
            </div>
            <hr class="featurette-divider">
            <div id="houseofbeauty" class="row featurette">           
                <div class="col-md-7">
                    <h2 class="featurette-heading text-primary">H. HENDRI RIKIANTO</h2>
                    <p class="lead">Berlatar pendidikan sarjana teknik industri dan terakhir bekerja sebagai Senior FC di sebuah bank swasta asing terkemuka. “Saya meninggalkan profesi lama karena tidak bisa memperoleh apa yang ternyata mampu diberikan oleh bisnis K-LINK. Jika harus mulai dari awal lagi, saya akan bekerja sepuluh kali lebih keras, karena apa yang kami dapatkan seribu kali lebih besar dari apa yang kami harapkan,” ujar ayah dari Rainer Murad ini.</p>
                    <p class="lead">Didukung sikap yang positif sedari awal tahap demi tahap bisnis ini mampu ia lampaui dengan cepat. Kini jaringan usahanya telah berkembang dengan pesat di seluruh Indonesia bahkan mancanegara. Bisnis yang juga membawa ribuan orang berhasil memiliki kehidupan yang lebih baik.</p>
                    <p class="lead">Melalui usaha K-LINK, kita diajak melihat sisi lain dari kehidupan, selain rutinitas ternyata ada yang lebih baik, positif dan berkualitas, yaitu dengan memiliki kebebasan.</p>
                    <p class="lead">Hendri Rikianto berhasil meraih peringkat Executive Leaders Club dan telah menikmati kemapanan finansial dan keleluasaan waktu, plus pensiun di usia muda bersama sang istri Triana Kurniati dan putra tercinta di rumah indahnya di kawasan Pondok Indah, Jakarta.</p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-responsive" src="<?php echo base_url(); ?>images/HENDRI.jpg" alt="HENDRI">
                </div>
            </div>
            <hr class="featurette-divider">
            <div id="houseofbeauty" class="row featurette">
                <div class="col-md-5">
                    <img class="featurette-image img-responsive" src="<?php echo base_url(); ?>images/TUBAGUS.jpg" alt="TUBAGUS">
                </div>
                <div class="col-md-7">
                    <h2 class="featurette-heading text-primary">H. TUBAGUS AGUS YUSUF</h2>
                    <p class="lead">Bisnis konvensional yang dijalankan hampir selama sepuluh tahun akhirnya kandas dan meninggalkan hutang bertumpuk. Tanpa patah semangat, Ayah empat anak ini berusaha melunasi hutang-hutangnya. la mencoba terjun ke dalam bisnis MLM namun lagi-lagi kegagalan yang ditemuinya.</p>
                    <p class="lead">Saat seorang temannya mempresentasikan bisnis K-LINK dan mengajaknya bergabung timbul keraguan dalam hatinya. Namun tuntutan kebutuhan keluarga dan prospek passive income dari produk istimewa mengubah keputusannya. Pria asal Banten ini bertekad untuk menjalani bisnis K-LINK dengan serius. “Saya harus berhasil!” tekadnya dalam hati.</p>
                    <p class="lead">Penolakan dan diremehkan orang lain menjadi cerita getir dalam perjalanannya menuju kesuksesan, “Tapi bukan masalah karena saya sangat yakin bisnis ini akan menjadi jalan keluar bagi kehidupan kami saat itu dan tentu harapan untuk masa yang akan datang.”</p>
                    <p class="lead">Keyakinannya bertambah setelah menghadiri pertemuan K-LINK. “Dari seringnya menghadiri pertemuan, mendengarkan kaset dan CD juga membaca buku banyak hal yang saya dapatkan. Bisnis ini tidak hanya mengajarkan bagaimana mencari nafkah, tetapi juga nilai-nilai yang sangat positif dalam menjalani kehidupan,” paparnya.</p>
                </div>
            </div>
            <hr class="featurette-divider">
            <div id="houseofbeauty" class="row featurette">

                <div class="col-md-7">
                    <h2 class="featurette-heading text-primary">Ir. H. IRWANSYAH</h2>
                    <p class="lead">Irwansyah pernah masuk dalam jajaran “Penjual Terkaya” berpenghasilan Rp. 150 juta per bulan pada tahun 2001 versi sebuah majalah marketing di Indonesia. Padahal ia baru dua tahun menggeluti bisnis MLM.</p>
                    <p class="lead">Kehidupan keras Jakarta dirasakannya ketika pria kelahiran Palembang ini memutuskan untuk hijrah dari kampung halamannya untuk mengadu nasib.</p>
                    <p class="lead">Irwansyah bergabung di bisnis K-LINK sejak Juni 2003. Ketidakpuasan terhadap perusahaan tempat ia dulu bekerja memicunya hengkang dan harus rela kehilangan penghasilan yang sudah cukup besar.</p>
                    <p class="lead">Lantas, mengapa memilih K-LINK? “K-LINK memiliki visi dan misi yang sangat jelas dan global. Selain itu K-LINK juga punya K-System, satu-satunya support system yang dapat memandu kita meraih kesuksesan yang lebih besar lagi,” terangnya.</p>
                    <p class="lead">Bisnis ini bisa dilakukan oleh semua orang, tanpa melihat status sosial, atau latar belakang pendidikan tertentu, semuanya memiliki kesempatan sukses yang sama. Membantu orang lain untuk sukses, itu arti sukses sesungguhnya.</p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-responsive" src="<?php echo base_url(); ?>images/IRWANSYAH.jpg" alt="IRWANSYAH">
                </div>
            </div>
            <hr class="featurette-divider">
            <div id="houseofbeauty" class="row featurette">
                <div class="col-md-5">
                    <img class="featurette-image img-responsive" src="<?php echo base_url(); ?>images/PRADIPTA.jpg" alt="PRADIPTO">
                </div>
                <div class="col-md-7">
                    <h2 class="featurette-heading text-primary">PRADIPTO KUSWANTORO</h2>
                    <p class="lead">Pernah mengikuti Short Course Neuro Linguistik Programing (NLP) yang dibawakan oleh Prof. Richard Blende yang diadakan di California University, Amerika Serikat, Pradipto Kuswantoro pun membuka bisnis yang bergerak di bidang outbound dan massive training.</p>
                    <p class="lead">Banyak perusahaan besar yang menggunakan jasa motivator handal ini untuk memberikan pelatihan motivasi pada karyawannya, salah satunya perusahaan telekomunikasi terbesar di Indonesia. Di tengah kesibukannya, musibah besar datang. Istri tercinta harus pergi menghadap Sang Pencipta akibat kecelakaan lalu lintas. Tepat tiga bulan selepas kepergian istrinya, Pradipto juga mengalami kecelakaan lalu lintas yang menyebabkan dirinya koma selama dua minggu di rumah sakit.</p>
                    <p class="lead">Saat berada pada masa penyembuhan seorang teman menawarkan produk K-LINK. “Khasiatnya yang istimewa terbukti mempercepat kesembuhan saya. Saat itu saya berpikir bahwa produk yang hebat dan didukung marketing plan yang luar biasa akan menjadi sebuah bisnis yang sangat menguntungkan. Saya memutuskan untuk bergabung dan berusaha kembali membangun ekonomi keluarga,” kisahnya.</p>
                    <p class="lead">Didukung kehandalannya sebagai motivator dan trainer, peringkat Royal Crown Ambassador, peringkat tertinggi di K-LINK saat ini, mampu diraihnya dalam waktu yang relatif singkat.</p>
                </div>
            </div>
            <hr class="featurette-divider">
            <div id="houseofbeauty" class="row featurette">            
                <div class="col-md-7">
                    <h2 class="featurette-heading text-primary">SANTOSO NYOTOKUSUMO</h2>
                    <p class="lead">Prestasi Santoso Nyotokusumo sebagai sales manager yang membawahi lima cabang di sebuah perusahaan otomotif memang patut dibanggakan. Penghasilannya cukup tinggi dan beberapa kali mendapatkan incentive trip ke luar negeri. Tidak puas dengan kondisi itu Santoso menginginkan pekerjaan dengan waktu yang fleksibel tapi bisa menghasilkan pendapatan tinggi dan mendatangkan passive income di masa pensiun.</p>
                    <p class="lead">la memilih bisnis Multi Level Marketing sebagai wahana untuk mengejar impiannya. Tidak butuh waktu lama bagi pria asal Surabaya untuk beradaptasi dengan bisnis ini. Hambatan justru datang dari keluarga yang awalnya kurang mendukung dan teman-temannya yang melecehkan keputusannya.</p>
                    <p class="lead">Kesulitan lain menurutnya adalah memilih perusahaan yang tepat. Beberapa perusahaan MLM pernah dicobanya namun hasil yang diperoleh jauh dari memuaskan. Santoso bersyukur bisa mengenal K-LINK. “K-LINK memiliki paket lengkap untuk mewujudkan impian saya: produk berkualitas, marketing plan yang sangat menguntungkan, dan K-System, support system yang telah terbukti banyak melahirkan orang sukses,” paparnya.</p>
                    <p class="lead">Bila dulu waktu luang adalah barang mewah baginya. Kini RCA Santoso Nyotokusumo bisa menikmatinya bersama keluarga tercinta, “Banyak orang punya uang tapi tidak punya waktu atau sebaliknya, tapi sekarang saya punya keduanya.” Jangan takut berubah dan jangan pernah takut bermimpi.</p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-responsive" src="<?php echo base_url(); ?>images/SANTOSO.jpg" alt="SANTOSO">
                </div>
            </div>
            <hr class="featurette-divider">
            <div id="houseofbeauty" class="row featurette">
                <div class="col-md-5">
                    <img class="featurette-image img-responsive" src="<?php echo base_url(); ?>images/SUCIPTO.jpg" alt="SUCIPTO">
                </div>
                <div class="col-md-7">
                    <h2 class="featurette-heading text-primary">SUCIPTO, SE.</h2>
                    <p class="lead">Keadaan ekonomi keluarga yang tidak berkecukupan tidak menghalanginya untuk ikut dalam kegiatan-kegiatan positif. Kepergian ayah menghadap Sang Khalik menempa pria tinggi besar ini menjadi mandiri di samping didikan kakak yang sangat disiplin. Banyak usaha yang ia lakukan demi meringankan beban Ibunda mencukupi nafkah keluarga.</p>
                    <p class="lead">Selesai kuliah pada Desember 2001 Sucipto sempat ditawari untuk menjadi PNS dan mengajar di sebuah universitas negeri oleh kakaknya namun ia tolak karena keseriusannya menjalankan bisnis MLM. Awalnya niat Sucipto tidak mendapat dukungan dari pihak keluarga yang skeptis pada bisnis MLM.</p>
                    <p class="lead">Sucipto dikenalkan pada K-LINK oleh salah satu teman lamanya RCA Ir. Irwansyah dan memutuskan bergabung pada akhir tahun 2003. Awal bergabung dengan K-LINK ia sempat merasakan penolakan demi penolakan dari prospek dan berbagai rintangan lainnya, namun berkat kesabaran, kerja keras, keteguhan hati dan bimbingan dari upline perlahan-lahan bisnis Sucipto berkembang dengan seringnya waktu.</p>
                    <p class="lead">Enam bulan pertama setelah bergabung di K-LINK ia berhasil mengembangkan jaringan di Bengkulu dengan downline mencapai 500 orang. la juga membangun jaringan di beberapa daerah dan saat ini downline-nya mencapai lebih dari 29.000 orang yang tersebar di berbagai kota seperti Bali, Padang, Jakarta, Bandung dan Lombok. Saat ini Sucipto termasuk salah satu leader K-LINK yang cukup berpengaruh dengan peringkat Executive Leaders Club, sebuah peringkat paling bergengsi di bisnis K-LINK dengan penghasilan tertinggi.</p>
                </div>
            </div>
            <hr class="featurette-divider">
            <div id="houseofbeauty" class="row featurette">            
                <div class="col-md-7">
                    <h2 class="featurette-heading text-primary">H. RIVAI DJATMIKA</h2>
                    <p class="lead">Rivai Djatmika adalah pria asal Gombong Jawa Tengah yang hijrah ke Yogyakarta di tahun 1992. Di kota Pelajar ini awalnya beliau ingin melanjutkan ke pendidikan tinggi selepas lulus SMA, tetapi keadaan perekonomian keluarga yang tidak mendukung untuk itu, hingga akhirnya cita citanya kandas untuk menjadi seorang sarjana.</p>
                    <p class="lead">Beliau mengadu nasib dengan berjualan kerajianan di Jalan Malioboro. Pernah bekerja di sebuah perusahaan pembiayaan sebagai kolektor, di perusahaan ini juga beliau mendapatkan kesempatan untuk belajar menjadi seorang pemasar. Ingin merubah nasib lebih baik lagi Rivai kemudian mencoba menjalankan beberapa usaha mulai dari berdagang Handphone, Elektronik dan juga Genteng Metal. Tetapi semua berujung pada kebangkrutan. Rumah, kendaraan serta semua aset yang pernah dimilikinya terjual habis untuk menutup kerugian usaha bahkan masih menyisakan banyak hutang. </p>
                    <p class="lead">Hingga akhirnya bersama anak dan istrinya tetap bertahan hidup di Yogyakarta dengan berjualan ikan bakar kaki lima di jalan Monjali, dan hidup di rumah kost ukuran 3x4 meter. Keberuntungan berpihak di tahun 2003 memutuskan bergabung dengan Bisnis K-Link ditengah tengah kesibukannya berjualan ikan bakar. Dibantu Istri tercintanya, Solekhatun, tahun 2004 Rivai full time menjalankan bisnis ini.</p>
                    <p class="lead">Sejak saat itu kehidupannya mulai berubah, tidak hanya bisa membayar hutang hutangnya, tetapi juga bisa menata masa depan lebih baik lagi. Prestasi yang diraihnya dimulai tahun 2005 sebagai CA, 2006 sebagai SCA dan 2010 sebagai RCA. Saat ini Rivai memiliki gaya hidup yang sangat berkualitas dan dikelilingi ratusan orang Sukses di Bisnis K-link di dalam organisasi Bisnisnya.</p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-responsive" src="<?php echo base_url(); ?>images/RIVAI.jpg" alt="SUCIPTO">
                </div>
            </div>
            <hr class="featurette-divider">
            <div id="houseofbeauty" class="row featurette">
                <div class="col-md-5">
                    <img class="featurette-image img-responsive" src="<?php echo base_url(); ?>images/ANDANG.jpg" alt="SUCIPTO">
                </div>
                <div class="col-md-7">
                    <h2 class="featurette-heading text-primary">ANDANG PRIYADI</h2>
                    <p class="lead">Berawal dari tekad yang sederhana yaitu ingin usaha mandiri dan tidak terikat kerja pada orang lain. Namun keputusan tersebut membawa konsekuensi yang cukup berat karena kurangnya pengalaman dan bukan berlatarbelakang keluarga pebisnis. "Saya modal nekad aja" akunya. Akhirnya tidak ada satupun usaha yang digeluti memberi hasil yang optimal malah sebaliknya bangkrut dan meninggalkan hutang. "Padahal saya selalu serius dan totalitas dalam mengerjakan sesuatu. Tp mungkin ini perjalanan yang harus saya lalui supaya saya memiliki mental Juara" ungkap Andang yang lahir di Temanggung dan besar di Kebumen ini.</p>
                    <p class="lead">Jatuh bangun dalam usaha membuatnya semakin berani dan di tahun 2003 saat keuangannya terpuruk dia ketemu bisnis K-link. "Bisnis ini datang tepat pada waktunya, saat saya memerlukan dan saat saya siap memperjuangkannya" katanya penuh semangat.</p>
                    <p class="lead">Namun bukan perkara mudah saat itu karena belum ada bukti sukses, testimoni produk juga masih jarang, stockis di Jogja juga belum ada. Andang banyak mengalami penolakan, disepelekan, ditertawakan, diragukan, dsb sehingga membuatnya tertekan. Tapi tekad besar ingin membahagiakan kedua orangtuanya Bapak Rahardjo dan Ibu Oemiyati, membuatnya kuat dan terus bersemangat meneruskan perjuangannya. "Impian saya untuk Orangtua lebih kuat dari penolakan, hinaan dsb" kata mantan Penjual Roti Bakar ini ber api-api.</p>
                    <p class="lead">Bonus bulan pertama yang hanya Rp 10.000 justru menjadikan dia terpacu untuk bekerja lebih "gila" lagi. Karena meyakini suatu ketika angka itu akan jadi sejarah dalam perjalanan suksesnya.</p>
                    <p class="lead">Kini Andang sudah menjadi Royal Crown Ambassador K-link peringkat tertinggi di dunia dan Executive Leaders Club penghargaan tertinggi dari K-System atas kepemimpinannya.</p>
                    <p class="lead">Bersama istri tercinta Lidya Tiolemba, anak-anak Derril dan Keiko mereka hidup bahagia tinggal di Jogjakarta dan menikmati apa yang selama ini diyakini dengan perjuangan dan doa. Anda juga pasti BISA!!!</p>
                </div>               
            </div>
            <hr class="featurette-divider">
            <div id="houseofbeauty" class="row featurette">
                 <div class="col-md-7">
                    <h2 class="featurette-heading text-primary">KARTA FILLER</h2>
                    <p class="lead">Beliau pernah merasakan pahitnya kehidupan dengan penghasilan pas-pasan dan hanya bisa menikmati hidup sebatas gaji yang diterima. Belum lagi besarnya biaya pendidikan anaknya yang kala itu masih duduk di Sekolah Dasar. Sampai suatu ketika beliau dipanggil oleh Kepala Sekolah karena belum membayar SPP sang buah hati. Apabila tidak bisa membayar, rapor anaknya tidak akan diberikan.</p>
                    <p class="lead">Hal ini tentu membuat hatinya seolah teriris dan akhirnya tergugah untuk mengubah nasib menjadi lebih baik untuk bisa membahagiakan keluarga yang dicintainya. Pernah terjun di perusahaan MLM lain, namun merasa belum ada yang bisa mengubah nasibnya ke arah kehidupan yang lebih baik.</p>
                    <p class="lead">Pada sebuah kesempatan, Karta diperkenalkan dengan bisnis K-LINK. Setelah mempelajari sistem dan belajar dari orang-orang yang telah sukses di K-LINK, ia memutuskan terjun ke dalam bisnis K-LINK. Bermodalkan kerja keras, pantang menyerah, keyakinan yang kuat dan percaya diri, daerah demi daerah, pulau demi pulau dilaluinya untuk mengembangkan jaringan yang ia miliki.</p>
                    <p class="lead">Dalam jangka waktu singkat, Karta berhasil meraih kesuksesan. Mencapai peringkat Crown Ambassador, memiliki jaringan solid yang tersebar di Indonesia, pendapatan di atas rata-rata setiap bulannya, dapat berpergian ke luar negeri, dan tentu saja membuat keluarganya menjadi bahagia dan sejahtera.</p>
                    <p class="lead">“K-LINK telah terbukti memberikan kesempatan masa depan yang gemilang. Sampai jumpa di puncak sukses. Jadilah pemenang, ambil kesempatan. Pemenang bukanlah mereka yang tidak pernah gagal, melainkan mereka yang tidak pernah berhenti mencoba.”</p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-responsive" src="<?php echo base_url(); ?>images/KARTA.jpg" alt="SUCIPTO">
                </div>                            
            </div>
            <!--        End-->  