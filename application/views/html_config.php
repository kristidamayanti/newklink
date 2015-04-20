<?php
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
        <meta name="description" content="<?php if (isset($desc)): echo str_replace('&#8230;', '', $desc);endif; ?>" />
        <meta name="author" content="<?php echo site_url() . "/contact" ?>">
        <link rel="shortcut icon" href="../../favicon.ico">

        <!-- Twitter Card data -->
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="@anpklinkindo" />
        <meta name="twitter:title" content="<?php if (isset($title)): echo $title; endif; ?>" />
        <meta name="twitter:image:src" content="<?php echo base_url().'images/oglogo.jpg'; ?>" />
        <meta name="twitter:description" content="<?php if (isset($desc)): echo str_replace('&#8230;', '', $desc);endif; ?>" />        

        <!-- Open Graph data -->        
        <meta property="og:title" content="<?php if (isset($title)): echo $title; endif; ?>" />
        <meta property="og:type" content="article" />        
        <meta property="og:url" content="<?php echo current_url(); ?>"/>
        <meta property="og:image" content="<?php echo base_url().'images/oglogo.jpg'; ?>" />
        <?php 
        if(isset($allPict)):
            foreach ($allPict as $pictRow):
        ?>
        <meta property="og:image" content="<?php echo base_url() . 'upload/blog/thumbnail/' . $pictRow->image;?>" />
        <?php        
            endforeach;
        endif;        
        ?>
    <!--     <?php 
        if(isset($newsDet)):
            $rowImgNews = $newsDet;
        ?>        
        <meta property="og:image" content="<?php echo base_url() . 'upload/news/thumbnail/' . $rowImgNews->image; ?>" />
        <meta property="og:image:width" content="200" />
        <meta property="og:image:height" content="200" />
        <?php
        endif;        
        ?>     -->    
        
        <meta property="og:description" content="<?php if (isset($desc)): echo str_replace('&#8230;', '', $desc);endif; ?>" />                                       
        <meta property="og:site_name" content="PT K-Link Indonesia" />        

        <title>K-Link Indonesia - <?php if (isset($title)): echo $title; endif; ?></title>

        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/magic-bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
        <link id="toggleCSS" href="<?php echo base_url(); ?>css/alertify.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/fwa/css/font-awesome.css">
        <link href="<?php echo base_url(); ?>css/lightbox.css" rel="stylesheet">        


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Custom styles for this template -->    
    </head>
