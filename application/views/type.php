<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (count($detail) > 0):
    $rowD = $detail;
endif;
?>
<body>
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Landing Page Creator</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Settings</a></li>
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- sidebar -->
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li class="active"><a href="#">Sumber Daya</a></li>
                    <li><a href="<?php echo site_url() . "/landing/set_default" ?>">Mengset <i>Landing Page</i></a></li>
                    <li><a href="<?php echo site_url() . "/landing/list_art" ?>">Daftar <i>Landing Page</i></a></li>
                    <li><a href="<?php echo site_url() . "/contributor" ?>">Membuat Artikel</a></li>
                    <li><a href="<?php echo site_url() . "/contributor/bank_list" ?>">Bank Artikel</a></li>
                </ul>         
                <ul class="nav nav-sidebar">
                    <li class="active"><a href="#">Parameter</a></li>
                    <li><a href="<?php echo site_url() . "/landing/setup" ?>">Mengset <i>Parameter</i></a></li>                    
                    <li><a href="<?php echo site_url() . "/landing/ftp_setup" ?>">FTP <i>Parameter</i></a></li>
                    <li><a href="<?php echo site_url() . "/contributor/account" ?>">Membuat User</a></li>
                </ul>
            </div>
            <!-- end sidebar -->
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header"><?php echo $page_title ?></h1>

                <div class="row placeholders">
                    <div class="col-xs-12 col-sm-8">
                        <?php
                        if (isset($rowD->id)):
                            $idR = $rowD->id;
                        else:
                            $idR = null;
                        endif;

                        $hiddenField = array(
                            'id' => $idR
                        );
                        ?>
                        <?php echo form_open('landing/type', '', $hiddenField) ?>
                        <div class="form-horizontal">                            
                            <div class="form-group">
                                <label for="ld_title" class="col-sm-2 control-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="ld_title" class="form-control" placeholder="Nama Artikel" value="<?php if (isset($rowD->ld_title)) echo $rowD->ld_title ?>">
                                </div>
                            </div>                             
                            <div class="form-group">
                                <input name="submit" class="btn btn-lg btn-primary btn-block" type="submit" value="Save"/>
                            </div>
                        </div>
                        <?php echo form_close() ?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Article Name</th>
                                        <th class="text-center">Update</th>
                                        <th class="text-center">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($param)):
                                        foreach ($param as $row):
                                            ?>
                                            <tr>
                                                <td><?php echo $row->id ?></td>
                                                <td><?php echo $row->ld_title ?></td>
                                                <td><?php echo $row->id ?></td>
                                                <td><?php echo $row->id ?></td>
                                            </tr>
                                            <?php
                                        endforeach;
                                    endif;
                                    ?>                                
                                </tbody>
                            </table>
                        </div>
                    </div>                    
                </div>

            </div>
        </div>
    </div>
