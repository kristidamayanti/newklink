<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="container">
    <div class="form">
        <fieldset>
            <legend> News Information</legend>
            <div class="span10">
            <table class="table table-bordered">
                <tr><th>NO.</th><th>TITLE</th><th>ACTION</th></tr>
           <?php
                $i = 1;
                if(empty ($news)):
                    echo "<tr><td>".$i++."</td><td>Record Not Found</td><td><a class='btn btn-danger' href='#'><i class='icon-remove'></i></a></td></tr>";
                else:
                    foreach ($news->result() as $row):
                        echo "<tr><td>".$i++."</td><td>".$row->title."</td><td><a class='btn btn-danger' href=".  site_url().'/news/remove/'.$row->news_id."><i class='icon-remove'></i></a></td></tr>";
                    endforeach;
                endif;
           ?>
           </table>
            <?php
            if($mssg != NULL):
                echo $mssg;
            else:
                echo NULL;
            endif;
            ?>
           </div>
        </fieldset>
    </div>
</div>