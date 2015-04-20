<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="container">
    <div class="form">
        <fieldset>
            <legend> Event</legend>
           <?php
            echo form_open('slider/add_event');
            echo form_label('Event Name')."\n";
            echo form_input('event')."\n";
            echo br()."\n";
            echo form_submit('submit','Simpan',"class='btn btn-primary'")."\n";
            echo $mssg;
            echo form_close();
           ?>
        </fieldset>
    </div>
</div>
