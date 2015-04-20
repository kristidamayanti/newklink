<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if(empty($series)):
	$series = 'No record';
else:

	foreach ($series as $item ):
			$items[$item->seriesID] = $item->seriesName;
	endforeach;

endif;
?>
<div class="container">
    <div class="form">
        <fieldset>
            <legend> Score Board</legend>
           <?php
            echo form_open('slider/add_score')."\n";
            echo "<div class='span4'>"."\n";

            echo form_dropdown('seriesid', $items);
            
            $options = array(
                  'A'  => 'Flight A',
                  'B'    => 'Flight B',
                  'C'   => 'Flight C',
                );

            echo form_dropdown('flight', $options);
            $nama = array(
                          'name'        => 'nama',
                          'maxlength'   => '12',
                          'size'        => '12',
                          'class'       => 'span3',
                          'placeholder' => 'Player Name',
                        );

            echo form_input($nama);

            echo "</div>";
            echo "<div class='span9'>"."\n";
            echo "<div class='form-inline'>"."\n";
                for($i=1; $i <=18; $i++):
                    $data = array(
                          'name'        => 'hole'.$i,
                          'maxlength'   => '2',
                          'size'        => '2',
                          'class'       => 'input-mini',
                          'placeholder' => 'hole '.$i,
                        );

                    echo form_input($data)."\n";
                endfor;
            $gross = array(
                          'name'        => 'gross',
                          'maxlength'   => '2',
                          'size'        => '2',
                          'class'       => 'input-mini',
                          'placeholder' => 'gross',
                        );

            echo form_input($gross)."\n";
            $nett = array(
                          'name'        => 'nett',
                          'maxlength'   => '2',
                          'size'        => '2',
                          'class'       => 'input-mini',
                          'placeholder' => 'nett',
                        );
            
            echo form_input($nett)."\n";
            echo "</div>";
            
            echo "\n";
            echo form_submit('submit','Simpan',"class='btn btn-primary'")."\n";
            echo "</div>";
            echo $mssg;
            echo form_close();
           ?>
        </fieldset>
    </div>
</div>
