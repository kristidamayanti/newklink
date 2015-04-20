<?php /*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ ?>
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
                        <p class="text-info">Service | <a href="<?php echo site_url() . '/blog'; ?>">Blog </a> | <a href="<?php echo site_url() . '/contact'; ?>">Contact us </a> | Community | <a href="<?php echo site_url() . '/stockist'; ?>">Locate Stockist</a> | Distributor Login</p>
                    </div>
                    <div class="col-xs-8 col-md-8 pull-right">                   
                        <div class="pull-right">                     
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action Action Action Action <span class="label label-info">3 items</span></a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                                <li role="presentation" class="divider"></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                            </ul>

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
                    <h1>Products</h1>
                </div>
            </div>
            <div class="col-xs-12 col-md-12">
                <br>                    
                <div class="col-xs-8 col-md-8">
                    <?php
                    if (count($prodDet) > 0):
                        $row = $prodDet;
                    endif;
                    ?>
                    <h3 class="text-center text-success"><?php echo $row->title; ?></h3>
                    <div class="thumbnail thumbnail-product">
                        <?php
                        if(isset($row->image)):
                            echo "<img class=\"img-responsive\" src=".  base_url().'upload/product/original/'.$row->image.">";
                        else:
                            echo "<img class=\"img-responsive\" src=\"holder.js/418x360\">";
                        endif;
                        
                        ?>                        
                    </div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#desc" role="tab" data-toggle="tab">Product Description</a></li>
                        <li><a href="#testi" role="tab" data-toggle="tab">Testimonies</a></li>
                        <li><a href="#image" role="tab" data-toggle="tab">Gallery</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="desc">
                            <br>
                            <?php
                            echo $row->description;
                            ?>
                        </div>
                        <div class="tab-pane" id="testi">
                            <br>
                            <ol>
                                <?php
                                if (count($testiGrp) > 0):
                                    foreach ($testiGrp as $testi):
                                        if ($row->id == $testi->pid):
                                            ?>                                        
                                            <li><?php echo $testi->testimonial . " - " . $testi->name; ?></li>                                        
                                            <?php
                                        endif;
                                    endforeach;
                                endif;
                                ?>
                            </ol>
                        </div>
                        <div class="tab-pane" id="image">Image</div>
                    </div>
                </div> 

                <div class="col-xs-4 col-md-4">
                    <h3 class="text-center">Other Customer Also Bought</h3> 
                    <div class="row">
                        <?php
                        if (count($prodRel) > 0):
                            foreach ($prodRel as $prdRow):
                                if ($row->code == $prdRow->code):                                    
                                    foreach ($prodGrup as $prdGroupRow):
                                        if ($prdRow->rel_code == $prdGroupRow->code):
                                            ?>
                                            <div class="thumbnail thumbnail-product">
                                                <?php 
                                                if(isset($prdGroupRow->image)):
                                                    echo "<img src=".  base_url().'upload/product/thumbnail/'.$prdGroupRow->image." alt=\"$prdGroupRow->title\">";
                                                else:
                                                    echo "<img src=\"holder.js/209x180\" alt=\"No Image Displayed\">";
                                                endif;
                                                ?>                                                
                                                <div class="caption">
                                                    <h3 class="text-center"><?php echo $prdGroupRow->title;?></h3>                      
                                                    <p><a href="<?php echo site_url().'/product/det/'.$prdGroupRow->id; ?>" class="btn btn-info center-block" role="button">View This Product</a></p>
                                                </div>
                                            </div>
                                            <?php
                                        endif;
                                    endforeach;
                                endif;
                            endforeach;
                        endif;
                        ?>
                    </div>                    
                </div>   
            </div>
        </div>
        