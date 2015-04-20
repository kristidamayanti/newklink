<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($blogDet)):
    $row = $blogDet;
    $desc = strip_tags(word_limiter($row->bl_content, 20));
    $title = strip_tags(word_limiter($row->bl_title, 30));
endif;
?>
<!DOCTYPE html>
<html lang="id,en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">    
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?php if (isset($desc)): echo $desc;endif; ?>">
        <meta name="author" content="<?php echo site_url() . "/contact" ?>">
        <link rel="shortcut icon" href="../../favicon.ico">

        <!-- Twitter Card data -->
        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="@anpklinkindo">
        <meta name="twitter:title" content="PT K-Link Indonesia">
        <meta name="twitter:image:src" content="<?php echo base_url().'images/oglogo.jpg'; ?>" />
        <meta name="twitter:description" content="Perusahaan MLM Pertama yang mendapatkan sertifikasi Syariah">        

        <!-- Open Graph data -->
        <meta property="og:title" content="Website Resmi PT K-Link Indonesia" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="<?php echo current_url(); ?>"/>     
        <meta property="og:image" content="<?php echo base_url().'images/oglogo.jpg'; ?>" />
        <meta property="og:description" content="Dalam rentang lebih dari 1 dekade kami telah menjangkau pasar di seluruh Indonesia dan Asia Tenggara sebagai perusahaan pemasaran langsung berjenjang dalam menyediakan produk-produk penunjang kesehatan dan kecantikan. Mitra kami telah mengembangkannya menjadi jaringan persebaran bisnis yang luas. Kami secara kontinyu melakukan pengawasan perkembangan bisnis serta memfasilitasi kebutuhan para mitra kami di area pemasaran K-LINK di seluruh Indonesia." />
        <meta property="og:site_name" content="PT K-Link Indonesia" />        

        <title>K-Link Indonesia - <?php echo "Mitra Anda Untuk Masa Depan"; ?></title>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
               
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Custom styles for this template -->    
    </head>
