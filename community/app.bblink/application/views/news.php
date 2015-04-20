<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="container">
    <div class="form">
        <fieldset>
            <legend> Add New News</legend>
           <?php
            echo form_open('news/add');
            echo form_label('News Title')."\n";
            echo form_input('title')."\n";

            echo form_label('Category')."\n";
            $catagory = array(
                  '1'  => 'Syariah',
                  '2'    => 'Other news',
                );

            echo form_dropdown('catagory', $catagory, '1');
            echo form_label('Details')."\n";

            $detail = array(
              'name'        => 'detail',
              'id'          => 'elm1',
              'rows'        => '10',
              'cols'        => '70',
              'styles'      => 'width: 50%',
            );

            echo form_textarea($detail);

            echo br()."\n";
            echo form_submit('submit','Simpan',"class='btn btn-primary'")."\n";
            echo $mssg;
            echo form_close();
           ?>
        </fieldset>
    </div>
</div>
