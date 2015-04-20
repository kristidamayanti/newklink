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
            <div class="col-xs-3 col-md-3">
                <img src="<?php echo base_url(); ?>images/logo4.png" alt="K-Link Logo">            
            </div>
            <div class="col-xs-8 col-md-8">
                <div class="row">
                    <div class="col-xs-8 col-md-8">
                        <p class="text-info"> </p>
                    </div>
                    <div class="col-xs-8 col-md-8 pull-right">
                        <p class="text-info"><a href="<?php echo site_url() . '/store'; ?>"><i class="fa fa-shopping-cart"></i> Web Store </a>|<?php echo anchor('http://k-cashonline.com', 'Service'); ?> | <a href="<?php echo site_url() . '/blog'; ?>">Blog </a> | <a href="<?php echo site_url() . '/contact'; ?>">Contact us </a> | <?php echo anchor('http://www.k-link.co.id/community/', 'Community'); ?> | <a href="<?php echo site_url() . '/stockist'; ?>">Locate Stockist</a> | <?php echo anchor('https://www.k-linkindo.com/', 'Distributor Login'); ?> | <a href="<?php echo site_url() . '/career'; ?>">Career |</a><a class="" href="<?php echo site_url() . '/rss_feeds'; ?>">RSS <i class="fa fa-rss"></i> </a></p>
                    </div>
                    <div class="col-xs-8 col-md-8 pull-right">
                        <form class="form-inline" role="form">
                            <div class="form-group">
                                <label class="sr-only" for="search-articel">Look for..</label>
                                <input type="email" class="form-control" id="search-articel" placeholder="Articel / Item">
                                <button type="button" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
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
                    <h1><i class="fa fa-bell-o"></i> Disclaimer</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h2 class="featurette-heading text-primary"> Disclamer untuk K-link Indonesia </h2>                                
                    <p>Jika Anda memerlukan informasi lebih lanjut atau memiliki pertanyaan tentang disclaimer website Kami, jangan ragu untuk menghubungi Kami melalui email di info customer_service[at]k-link.co.id</a> . <br />
                    <h3>Disclaimer untuk <?php echo anchor('http://www.k-link.co.id','www.k-link.co.id');?> : </h3>
                    <p>Website ini adalah website resmi dari PT. K-Link Indonesia, semua informasi di website ini diterbitkan dengan itikad baik dan bertujuan sebagai informasi umum dan Distributor K-Link khususnya. Dari website Kami, Anda dapat mengunjungi situs-situs lain dengan mengikuti hyperlink ke site eksternal tersebut.</p><p>Kami hanya memberikan link berkualitas ke site yang berguna dan beretika, Kami tidak memiliki kontrol atas isi dan sifat site tersebut. Link ke site lain ini bukan merupakan rekomendasi untuk semua konten yang ditemukan di site tersebut. Pemilik site dan isi dapat berubah tanpa pemberitahuan dan dapat terjadi sebelum Kami memiliki kesempatan untuk menghapus link yang mungkin sudah tidak dapat diakses lagi.</p>
                    <p>Perlu juga Anda ketahui bahwa ketika Anda meninggalkan website Kami, site lain mungkin memiliki kebijakan privasi yang berbeda dan istilah yang berada di luar kendali Kami . Pastikan untuk memeriksa Kebijakan Privasi dari site-site tersebut serta " Ketentuan Layanan ".</p>
                    <h3>Persetujuan </h3>
                    <p>Dengan menggunakan website Kami, maka dengan ini Anda menyetujui isi disclaimer Kami dan segala ketentuan-ketentuannya .</p> 
                    <h3>Update</h3> website disclaimer ini terakhir diperbaharui pada : Rabu, September 3, 2014 <br/> <p>Kami akan terus memperbaharui untuk kelengkapan informasi Anda</p> <br/>
            </div>            
        </div>
        <hr class="featurette-divider">                
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="col-xs-12 col-md-8">
                    <h3>Sign up to our e-mail </h3>
                    <form action="//k-link.us9.list-manage.com/subscribe/post?u=47314fe9f13048a3b7ae50701&amp;id=98e8200075" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate form-inline" target="_blank" novalidate>                        
                        <div class="form-group">
                            <input class="form-control" type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required >
                            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        </div>
                        <div class="form-group">
                            <div style="position: absolute; left: -5000px;"><input type="text" name="b_47314fe9f13048a3b7ae50701_98e8200075" class="form-control" tabindex="-1" value=""></div>
                            <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-primary"></div>
                        </div>
                    </form>
                </div>
                <div class="col-xs-12 col-md-4">
                    <h3>Get Social, Follow us on </h3>
                    <ul class="list-unstyled list-inline">                    
                        <li><?php echo anchor('https://www.facebook.com/pages/AP-K-Link-Indonesia/154582434691756', '<i class="fa fa-2x fa-facebook-square text-info"></i>'); ?></li>
                        <li><?php echo anchor('https://twitter.com/anpklinkindo', '<i class="fa fa-2x fa-twitter-square text-primary"></i>'); ?></li>
                        <li><?php echo anchor('http://www.youtube.com/channel/UC1YLBuEkJLzocmc_yp5Pgvw', '<i class="fa fa-2x fa-youtube-square text-danger"></i>'); ?></li>                    
                        <li><?php echo anchor('http://instagram.com/klink_indonesia_official?ref=badge', '<i class="fa fa-2x fa-instagram text-primary"></i>'); ?></li>
                        <li><script src="//platform.linkedin.com/in.js" type="text/javascript">
                            lang: in_ID
                            </script>
                            <script type="IN/FollowCompany" data-id="3876026" data-counter="none"></script></li>

                    </ul> 
                </div>            
            </div>
            <br>

            <div class="col-xs-12 col-md-12">
                <div class="col-xs-3 col-md-3">
                    <p><a href="<?php echo site_url() . '/contact'; ?>">Hubungi kami</a></p>
                </div>
                <div class="col-xs-3 col-md-3">
                    <?php echo anchor('http://www.k-link.co.id/community/', 'Community'); ?>
                </div>
                <div class="col-xs-2 col-md-2">
                    <p><a href="<?php echo site_url() . '/stockist'; ?>">Locate Stockist</a></p>
                </div>
                <div class="col-xs-2 col-md-2">
                    <p><a href="<?php echo site_url() . '/howdo'; ?>">How do i join? </a></p>
                </div>
                <div class="col-xs-2 col-md-2">
                    <p><a href="<?php echo site_url() . '/career'; ?>">Career </a></p>
                </div>
            </div>

        </div>
        <hr>
        <footer>
            <p style="text-align: center;" >Copyright &copy;2014 -  PT K-Link Indonesia - <?php echo anchor('/syariah', 'MLM Bersistem Syariah') ?> -<?php echo anchor('/disclaimer', 'Disclaimer') ?> - <?php echo anchor('http://www.apli.co.id', 'APLI Register No:0069/04/03'); ?></p>
        </footer>
    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-54221164-1', 'auto');
        ga('send', 'pageview');

    </script>
</body>
</html>
