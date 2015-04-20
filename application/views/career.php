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
                    <h1><i class="fa fa-bar-chart-o"></i> Careers</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <h2 class="featurette-heading text-primary"> Careers</h2>                
                <p class="lead">Sebagai salah satu perusahaan Multinasional Terbesar dan beroperasi lebih dari 10 Tahun yang bergerak dibidang Multilevel Marketing, PT. K-Link Nusantara membutuhkan tenaga ahli dengan posisi sebagai berikut</p>                
		<h2>PRODUCT EXECUTIVE (PE)</h2>               
                <h3>Tanggung Jawab Pekerjaan :</h3>
			<ul>
			<li>Membuat &amp; Merencanakan Program Promosi</li>
			<li>Memberikan Training</li>
			<li>Membuat Tools Promosi</li>
			<li>Meningkatkan Penjualan</li>
			</ul>
			<h3>Persyaratan:</h3>
			<ul>
			<li>Pria / Wanita, usia maksimum 30 tahun</li>
			<li>Berpenampilan menarik</li>
			<li>Min. lulusan S1 dari program farmasi, nutrisi atau kedokteran IPK minimum 3,00</li>
			<li>Min. 2 tahun pengalaman di bidang yang sama</li>
			<li>Berkemampuan untuk memberikan training / presentasi</li>
			<li>Bersedia untuk dinas keluar kota</li>
			<li>Mempunyai interpersonal skill yang baik, mudah beradaptasi dengan berbagai </li>
			<li>perubahan dan proaktif </li>
			<li>Bertanggungjawab, rajin, memiliki inisiatif, jujur, dan teliti.</li>
			<li>Cepat tanggap, dan memiliki kemampuan berkomunikasi yang baik</li>
			<li>Menguasai bahasa Inggris lisan dan tulisan</li>
			<li>Dapat mengoperasikan komputer (MS Words, Excel, dll).</li>
			<li>Mampu bekerja dalam tim dan bekerja dibawah tekanan &amp; target waktu.</li>
			<li>Memiliki komitmen yang tinggi untuk memberikan pelayanan yang terbaik</li>
			</ul>
			
			<h2>SUPERVISOR SALON (SS)</h2>
			<h3>Tanggung Jawab Pekerjaan :</h3>
			<ul>
			<li>Membuat &amp; Merencanakan Program Promosi</li>
			<li>Mengontrol Keluar &amp; Masuk Stok Produk</li>
			<li>Mengawasi &amp; Mengevaluasi Kinerja Terapis</li>
			<li>Membuat Laporan Penjualan</li>
			</ul>
			<h3>Persyaratan:</h3>
			<ul>
			<li>Wanita, usia maksimum 30 tahun</li>
			<li>Berpenampilan menarik</li>
			<li>Min. lulusan D1 minimum 3,00</li>
			<li>Min. 1 tahun pengalaman di bidang yang sama</li>
			<li>Mempunyai interpersonal skill yang baik, mudah beradaptasi dengan berbagai perubahan dan proaktif</li>
			<li>Bertanggungjawab, rajin, memiliki inisiatif, jujur, dan teliti.</li>
			<li>Cepat tanggap, dan memiliki kemampuan berkomunikasi yang baik</li>
			<li>Menguasai bahasa Inggris lisan dan tulisan</li>
			<li>Dapat mengoperasikan komputer (MS Words, Excel, dll).</li>
			<li>Mampu bekerja dalam tim dan bekerja dibawah tekanan &amp; target waktu.</li>
			<li>Memiliki komitmen yang tinggi untuk memberikan pelayanan yang terbaik</li>
			</ul>

			<h2>ADVERTISING PROMOTION STAFF (A & P)</h2>
			<h3>Tanggung Jawab Pekerjaan :</h3>
			<ul>
			<li>Membuat desain materi promosi maupun desain materi lainnya</li>
			<li>Melakukan dokumentasi pada setiap acara perusahaan</li>
			</ul>
			<h3>Persyaratan:</h3>
			<ul>
			<li>Pria, usia maksimum 30 tahun</li>
			<li>Berpenampilan menarik</li>
			<li>Min. Lulusan D3 Jurusan Desain Grafis dengan IPK minimum 3,00</li>
			<li>Min. 5 tahun pengalaman di bidang Desain Grafis &amp; Photography</li>
			<li>Memiliki pengalaman bekerja di Perusahaan MLM &plusmn; 3 Tahun</li>
			<li>Bersedia untuk dinas keluar kota</li>
			<li>Mempunyai interpersonal skill yang baik, mudah beradaptasi dengan berbagai perubahan dan proaktif</li>
			<li>Bertanggungjawab, rajin, memiliki inisiatif, jujur, dan teliti.</li>
			<li>Cepat tanggap, dan memiliki kemampuan berkomunikasi yang baik</li>
			<li>Menguasai bahasa Inggris lisan dan tulisan</li>
			<li>Mampu bekerja dalam tim dan bekerja dibawah tekanan &amp; target waktu.</li>
			<li>Memiliki komitmen yang tinggi untuk memberikan pelayanan yang terbaik</li>
			</ul>
		
			<h2>WEB AUTHOR (WA)</h2>
			<h3 >Tanggung Jawab Pekerjaan :</h3>
			<ul>
			<li>Pembuatan dan penulisan konten website yang menarik dan sesuai dengan promosi, produk, tematis dan kegiatan perusahaan</li>
			<li>Memperbaharui konten website secara periodik</li>
			<li >Memaintain Social Network Perusahaan secara teratur</li>
			<li>Bekerjasama dengan antar Departemen untuk pembuatan konten </li>
			</ul>
			<h3>Persyaratan :</h3>
			<ul>
			<li>Pria / Wanita, usia maksimum 28 tahun</li>
			<li>Min. lulusan S1 Marketing/Komunikasi dari Jurusan Jurnalistik/Advertising &amp; Media</li>
			<li>Memiliki antusias dalam bidang menulis &amp; membaca</li>
			<li>Memiliki kemampuan dalam keakuratan penulisan, pengejaan dan tata bahasa yang baik dan benar pada Bahasa Indonesia Bahasa Inggris</li>
			<li>Memiliki kepekaan terhadap trend yang berjalan dalam Advertising &amp; Digital </li>
			<li>Marketing - Memiliki pengetahuan mendalam mengenai platform media sosial (Facebook, Twitter,Youtube, Forum, dll) dan bagaimana penggunaan berbagai media sosial tersebut dalam berbagai kondisi. </li>
			<li>Memiliki pengalaman minimal 1 tahun dalam Social Media Marketing Campaign dan konten media online terutama website.</li>
			<li>Mempunyai interpersonal skill yang baik, mudah beradaptasi dengan berbagai Perubahan, kreatif dan proaktif </li>
			<li>Dapat mengoperasikan program Microsoft Office (MS Words, Excel, dll)</li>
			<li>Bertanggungjawab, rajin, dan teliti.</li>
			<li>Mampu bekerja dalam tim dan bekerja dibawah tekanan &amp; target waktu.</li>
			<li>Memiliki komitmen yang tinggi untuk memberikan pelayanan yang terbaik</li>
			</ul>

			<h2>WEB DESIGNER (WD)</h2>
			<h3>Tanggung Jawab Pekerjaan :</h3>
			<ul>
			<li>Merencanakan website yang menarik dan dinamis</li>
			<li>Mengidentifikasikan dan membuat website sesuai dengan kebutuhan Perusahaan</li>
			<li>Mendesain website dan web pages dalam bentuk desain grafis, animasi dan dalam bentuk HTML</li>
			<li>Bekerjasama dengan Web Front End Developer untuk pembuatan website sesuai dengan jalannya program</li>
			<li>Terus memperbaharui tampilan website sesuai dengan trends secara periodic</li>
			<li>Membantu Web Author untuk menyiapkan gambar/animasi untuk konten yang akan diterbitkan (publish)</li>
			</ul>
			<h3>Persyaratan:</h3>
			<ul>
			<li>Pria/Wanita, usia maksimum 28 tahun</li>
			<li>Min. lulusan D3 s/d S1 Manajemen Informatika ( dengan IPK 3,00 (tiga) )</li>
			<li>Min. 1 tahun pengalaman di bidang yang sama namun fresh graduate dipersilahkan untuk melamar</li>
			<li>Menguasai CSS, Javascript baik dalam bentuk framework atau native</li>
			<li>Menguasai Adobe Photoshop, Adobe Ilustrator, Corel Draw dan Dream Weaver</li>
			<li>Mempunyai interpersonal skill yang baik, mudah beradaptasi dengan berbagai perubahan dan proaktif</li>
			<li>Bertanggungjawab, rajin, memiliki inisiatif, jujur, dan teliti.</li>
			<li>Cepat tanggap, dan memiliki kemampuan berkomunikasi yang baik</li>
			<li>Menguasai bahasa Inggris lisan dan tulisan</li>
			<li>Mampu bekerja dalam tim dan bekerja dibawah tekanan &amp; target waktu.</li>
			<li>Memiliki komitmen yang tinggi untuk memberikan pelayanan yang terbaik</li>
			</ul>
				
			<h2>WEB FRONT END DEVELOPER (WFED)</h2>
			<h3>Tanggung Jawab Pekerjaan :</h3>
			<ul>
			<li>Merancang dan membuat website sesuai dengan kebutuhan program dan sesuai dengan jadwal</li>
			<li>Membuat mock-up dan prototype Website dari Web Designer</li>
			<li>Melakukan maintenance serta perbaikan website</li>
			</ul>
			<h3>Persyaratan:</h3>
			<ul>
			<li>Pria/Wanita, usia maksimum 28 tahun</li>
			<li>Min. lulusan D3 s/d S1 Manajemen Informatika ( dengan IPK 3,00 (tiga) )</li>
			<li>Min. 1 tahun pengalaman di bidang yang sama namun fresh graduate dipersilahkan untuk melamar</li>
			<li>Menguasai PHP Framework (Codeigniter,Laravel,dll), MySQL, MSSQL atau RDBMS lainnya</li>
			<li>Menguasai penggunaan dan pembuatan Web Service atau API Programming</li>
			<li>Memiliki pemahaman yang baik di bidang programming</li>
			<li>Mempunyai interpersonal skill yang baik, mudah beradaptasi dengan berbagai perubahan dan proaktif</li>
			<li>Bertanggungjawab, rajin, memiliki inisiatif, jujur, dan teliti.</li>
			<li>Cepat tanggap, dan memiliki kemampuan berkomunikasi yang baik</li>
			<li>Menguasai bahasa Inggris lisan dan tulisan</li>
			<li>Mampu bekerja dalam tim dan bekerja dibawah tekanan &amp; target waktu.</li>
			<li>Memiliki komitmen yang tinggi untuk memberikan pelayanan yang terbaik</li>
			</ul>


                <p>Bagi Anda yang memenuhi kriteria di atas, kirimkan surat lamaran, posisi pekerjaan dengan dituliskan kode PE, SS , ANP, WA, WFED serta WD dan foto terbaru Anda ke alamat berikut :</p>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>PT. K-LINK NUSANTARA</h4>          
                        <address>K-LINK TOWER, JL.Gatot Subroto Kav. 59 A, Jakarta Selatan 12950 - Indonesia
                            <ul class="address">
                                <li><span class="glyphicon glyphicon-earphone"></span> Tel. 021.290.27.000</li>
                                <li><span class="glyphicon glyphicon-phone-alt"></span> Fax. 021.290.27.001 - 290.27.010 </li>            
                                <li><span class="fa fa-envelope"></span> hrd.klink[at]gmail.com dgn “Subject” kode PE, SS , ANP, WA, WFED serta WD</li>
                            </ul>
                        </address>
                    </div>
                </div>                

            </div>
            <div class="col-md-5">
                <img class="featurette-image img-responsive" src="<?php echo base_url(); ?>images/careers.jpg" alt="logo LBC">
            </div>
        </div>
        