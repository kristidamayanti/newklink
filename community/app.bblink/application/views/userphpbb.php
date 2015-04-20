<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if(empty($userphpbb)):    
    echo 'Kosong Cuy';
else:
        echo form_open('/userforum/proses')."\n";
        echo "<div class='container-fluid'>";
        echo "<div class='span8'>";
        echo "<table class='table table-bordered table-condensed'>";
        echo '<tr>';
        echo '<th> NO </th>';
        echo '<th> USER ID </th>';
        echo '<th> USERNAME </th>';
        echo '<th> DISTRIBUTOR </th>';
        echo '<th> STATUS </th>';
        echo '<th> APPROVE </th>';
        echo '</tr>';
    foreach ($userphpbb->result() as $rows):
        $i+=1;
        
        echo '<tr>';
        echo '<td>'.$i.'</td>'."\n";
        echo '<td>'.$rows->user_id.'</td>'."\n";
        echo '<td>'.$rows->username.'</td>'."\n";
        echo '<td>'.strtoupper($rows->pf_distributorcode).'</td>'."\n";
        
        if($rows->user_type == 1):
            $status ='Inactive';
        else:
            $status ='Approved';
        endif;
                
        echo '<td>'.$status.'</td>'."\n";
        echo '<td>'.form_checkbox('approve[]', $rows->user_id, FALSE).'</td>'."\n";
        echo '</tr>';        
    endforeach;       
        echo '</table>';
        echo '</div>';
        echo '</div>';
        
        $update = array(
            'name' => 'update',
            'value' => 'Update',
            'class' => 'btn btn-large btn-block btn-primary',
            
        );
        
        $delete = array(
            'name' => 'delete',
            'value' => 'Delete',
            'class' => 'btn btn-large btn-block btn-danger',
            
        );
        
        
        echo "<div class='container'>";
        echo "<div class='span8'>";
        echo form_submit($update);
        echo form_submit($delete);
        echo '</div>';
        echo '</div>';
        
        echo form_close();
endif;

