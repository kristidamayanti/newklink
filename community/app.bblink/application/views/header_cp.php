<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="navbar">
    <div class="navbar-inner">
        <a class="brand" href="<?php echo site_url($uri ='controlpanel'); ?>">Control Panel</a>
        <ul class="nav">
            <li class="divider-vertical"></li>            
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> User Manager <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo site_url($uri ='userforum'); ?>"> Approve User </a></li>
                  <li><a href="<?php echo site_url($uri ='news/list_news'); ?>">View News</a></li>
                  <li class="divider"></li>                  
                </ul>
            </li>
        </ul>
        <ul class="nav">
            <li class="divider-vertical"></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Information <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo site_url($uri ='news/add_info'); ?>"> Add Information</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-info-sign"></i> Credit</a></li>
                    <li><a href="<?php echo site_url($uri ='auth/logout'); ?>"><i class="icon-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
