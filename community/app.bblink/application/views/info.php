<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="container">
    <div class="form">
        <fieldset>
            <legend> Information</legend>
           <?php
            echo form_open('slider/add_info')."\n";

            $info = array(
                          'name'        => 'info',
                          'maxlength'   => '100',
                          'size'        => '100',
                          'placeholder' => 'Information Detail',
                          'id'          =>  'appendedDropdownButton',

                        );
            echo "<div class='input-append'>";
            echo form_input($info)."\n";
            echo "<div class='btn-group'>";
            echo "<button class='btn dropdown-toggle' data-toggle='dropdown'>";
            echo "<i class='icon-list'> </i>";
            echo "<span class='caret'></span></button>";
            echo "<ul class='dropdown-menu'>";
            echo "<li><a href=".  site_url().'/slider/list_info'.">View Information</a></li>";
            echo "</ul>";
            echo "</div>";
            echo "</div>";
            echo br()."\n";
            echo form_submit('submit','Simpan',"class='btn btn-primary'")."\n";            
            echo $mssg;
            echo form_close();
           ?>
        </fieldset>
    </div>
</div>