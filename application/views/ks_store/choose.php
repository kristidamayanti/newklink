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
                        <p class="text-info">Service | <a href="<?php echo site_url() . '/blog'; ?>">Blog </a> | <a href="<?php echo site_url() . '/contact'; ?>">Contact us </a> | Community | <a href="<?php echo site_url() . '/stockist'; ?>">Locate Stockist</a> | Distributor Login | <a href="<?php echo site_url() . '/store/logout'; ?>">Logout</a></p>
                    </div>
                    <div class="col-xs-8 col-md-8 pull-right">                   
                        <div class="pull-right">
                            <button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-user"></span> Welcome, <?php echo $username; ?></button>
                             
                            <button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span>My Chart <span class="caret"></span></button>
                            <!--<button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-user"></span> Logout</button>-->
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
                    <h1>Pilih jenis berlangganan</h1>
                </div>
            </div>

            <div class="col-xs-12 col-md-12">
                <br>
                <div class="col-xs-3 col-md-3"> 
                    <!-- size 3 -->
                    <div class="panel panel-success">
                        <!--<div class="panel-heading"><p class="text-uppercase">Informasi</p></div>
                        <div class="panel-body">
                            <p>Silahkan anda memilih jenis berlangganan anda, jika ingin berlangganan maka anda dapat membeli Kartu berlangganan di Stokist terdekat</p>                  
                        </div>-->
                        <div class="list-group">
                        <a href="#" class="list-group-item active">
                            Audio Categories
                        </a>
                        <a href="<?php echo base_url('store/history/novoucher'); ?>" class="list-group-item">History Transaction</a>
                        
                    </div> 
                        
                    </div>

                </div>              
                <div class="col-xs-8 col-md-8">
                    <?php echo validation_errors(); ?>
                    <?php if (isset($mssg)): echo $mssg;
                    endif; ?>
                    <!-- size 8 -->
                    <div role="form">
<?php echo form_open('voucher/check'); ?>
                        <div class="form-group">
                            <label for="voucherno">Berlangganan dengan Voucher</label>
                            <input name="voucherno" autofocus required type="text" class="form-control" id="voucherno" placeholder="Masukan Voucher No Anda">
                        </div>
                        <div class="form-group">                  
                            <input name="voucherkey" required type="password" class="form-control" id="voucherkey" placeholder="Masukan Voucher Key Anda">
                        </div>
                        <div class="form-group">                  
                            <input type="checkbox" name="nonvoucher" id="nonvoucher" value="checked"> Non Voucher, bayar melalui Saldo K-Wallet
                        </div>                               
                        <?php
                        echo form_submit('submit', 'Submit', 'class="btn btn-default"');
                        echo form_close();
                        ?>
                    </div>
                    <div>
                        <?php
                          if(isset($err_message)) {
                              echo "<font color=red>$err_message</font>";
                          }
                        ?>
                    </div>   
                </div>              
            </div>

            <div class="col-xs-12 col-md-12">
                <div class="col-xs-12 col-md-8">
                    <h3>Sign up to our e-mail </h3>
                    <form class="form-inline" role="form">
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputEmail2">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
                            <button type="button" class="btn btn-primary">Next</button>
                        </div>
                    </form>
                </div>
                <div class="col-xs-12 col-md-4">
                    <h3>Get Social, Follow us on </h3>
                    <ul class="icons">
                        <li class="myicon-facebook"></li>
                        <li class="myicon-twitter"></li>
                        <li class="myicon-youtube"></li>
                    </ul> 
                </div>            
            </div>
            <br>

            <div class="col-xs-12 col-md-12">
                <div class="col-xs-3 col-md-3">
                    <p><a href="<?php echo site_url() . '/contact'; ?>">Hubungi kami</a></p>
                </div>
                <div class="col-xs-3 col-md-3">
                    <p><a href="<?php echo site_url() . '/community'; ?>">Community</a></p>
                </div>
                <div class="col-xs-3 col-md-3">
                    <p><a href="<?php echo site_url() . '/stockist'; ?>">Locate Stockist</a></p>
                </div>
                <div class="col-xs-3 col-md-3">
                    <p><a href="<?php echo site_url() . '/howdo'; ?>">How do i join? </a></p>
                </div>
            </div>
        </div> <!-- End rows -->

        <hr>

        <footer>
            <p>Copyright &copy; PT K-Link Indonesia 2014</p>
        </footer>
    </div>  --><!-- /container

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/holder.js"></script>
</body>
</html>
