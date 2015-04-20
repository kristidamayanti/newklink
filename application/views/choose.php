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
                <img src="<?php echo base_url(); ?>images/logo.png" alt="K-Link Logo">            
            </div>
            <div class="col-xs-8 col-md-8">
                <div class="row">
                    <div class="col-xs-8 col-md-8">
                        <p class="text-info"> </p>
                    </div>
                    <div class="col-xs-8 col-md-8 pull-right">
                        <p class="text-info"><a href="<?php echo site_url() . '/storelogin'; ?>"><i class="fa fa-shopping-cart"></i> Web Store </a>|<?php echo anchor('http://k-cashonline.com', 'Service'); ?> | <a href="<?php echo site_url() . '/blog'; ?>">Blog </a> | <a href="<?php echo site_url() . '/contact'; ?>">Contact us </a> | <?php echo anchor('http://www.k-link.co.id/community/', 'Community'); ?> | <a href="<?php echo site_url() . '/stockist'; ?>">Locate Stockist</a> | <?php echo anchor('https://www.k-linkindo.com/', 'Distributor Login'); ?> | <a href="<?php echo site_url() . '/career'; ?>">Career |</a><a class="" href="<?php echo site_url() . '/rss_feeds'; ?>">RSS <i class="fa fa-rss"></i> </a></p>
                    </div>
                    <div class="col-xs-8 col-md-8 pull-right">                   
                        <div class="pull-right">
                            <button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-user"></span> Welcome, <?php echo $username; ?> </button>
                            <button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span>My Cart <span class="caret"></span></button>
                        </div>           
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
                    <a class="navbar-brand" href="<?php echo site_url(); ?>">Back To Home</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="page-header">
                    <h1>Pilih jenis berlangganan</h1>
                </div>
            </div>

            <div class="col-xs-12 col-md-12">
                <br>
                <div class="col-xs-3 col-md-3"> 
                    <!-- size 3 -->
                    <div class="panel panel-success">
                        <div class="panel-heading"><p class="text-uppercase">Informasi</p></div>
                        <div class="panel-body">
                            <p>Silahkan anda memilih jenis berlangganan anda, jika ingin berlangganan maka anda dapat membeli Kartu berlangganan di Stokist terdekat</p>                  
                        </div>
                        <div class="panel-footer">Info Hub CS 021-29027000</div>
                    </div>

                </div>              
                <div class="col-xs-8 col-md-8">
                    <?php echo validation_errors(); ?>
                    <?php
                    if (isset($mssg)): echo $mssg;
                    endif;
                    ?>
                    <!-- size 8 -->
                    <div role="form">
<?php echo form_open('choose'); ?>
                        <div class="form-group">
                            <label for="voucherno">Berlangganan dengan Voucher</label>
                            <input name="voucherno" autofocus  type="text" class="form-control" id="voucherno" placeholder="Masukan Voucher No Anda">
                        </div>
                        <div class="form-group">                  
                            <input name="voucherkey"  type="password" class="form-control" id="voucherkey" placeholder="Masukan Voucher Key Anda">
                        </div>
                        <div class="form-group">                  
                            <input type="checkbox" name="nonvoucher" id="nonvoucher" value="checked"> Non Voucher, bayar melalui Saldo K-Wallet
                        </div>                               
                        <?php
                        echo form_submit('submit', 'Submit', 'class="btn btn-default"');
                        echo form_close();
                        ?>
                    </div>
                </div>              
            </div>

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
                        <li><div class="g-follow" data-href="https://plus.google.com/115183062087900017478" data-annotation="vertical-bubble" data-height="20"></div></li>
                    </ul> 
                </div>            
            </div>
            <br>

            <div class="col-xs-12 col-md-12">
                <<div class="col-xs-3 col-md-3">
                    <p><a href="<?php echo site_url() . '/contact'; ?>">Hubungi kami</a></p>
                </div>
                <div class="col-xs-3 col-md-3">
<?php echo anchor('http://www.k-link.co.id/community/', 'Community'); ?>
                </div>
                <div class="col-xs-3 col-md-3">
                    <p><a href="<?php echo site_url() . '/stockist'; ?>">Locate Stockist</a></p>
                </div>
                <div class="col-xs-2 col-md-2">
                    <p><a href="<?php echo site_url() . '/howdo'; ?>">How do i join? </a></p>
                </div>  
            </div>
        </div> <!-- End rows -->

        <hr>

        <footer>
            <p>Copyright &copy; PT K-Link Indonesia 2014</p>
        </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/holder.js"></script>
</body>
</html>
