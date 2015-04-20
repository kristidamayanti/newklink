<?php 

?>
<div id="player_header">
    <img src="<?php echo base_url();?>images/scoring.jpg" alt="Tournament & Series Result" />
</div>
<div id ="table_style">
<?php
    if(empty($series)):
        echo "<div class=gallery_header_h1><p>No Series or Tournament Found</p></div>";
        echo "<div class=gallery_page><p>Data Not Available</p></div>";
    else:
        foreach ($series->result() as $rows):
        echo "<div class=gallery_header_h1><p>$rows->seriesName</p></div>";
        echo "<div class=gallery_page><p>Live Scoring $rows->details</p></div>";
        endforeach;
    endif;

    if(empty($series)):
        echo 'Empty Record';
    else:
        $row = $series->row();
    endif;
?>

    <div class=tournament_header><p>LIVE SCORING FOR <?php echo $type ?></p></div>
    <div class="CSSTableGenerator" >
		<table>
			 <tr><td>No</td><td>Nama</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>Gross</td><td>Nett</td></tr>
			 <?php
                         if(empty($flight)):
                             echo "<tr><td>1</td><td>Not Found</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td></tr>";
                         else:
                             $no = 0;
                             foreach ($flight->result() as $rows):
                             
                             if($row->seriesID ==$rows->seriesID ):
                                $no = $no+1;
                                echo "<tr><td>$no</td><td>$rows->nama</td><td>$rows->hole1</td><td>$rows->hole2</td><td>$rows->hole3</td><td>$rows->hole4</td><td>$rows->hole5</td><td>$rows->hole6</td><td>$rows->hole7</td><td>$rows->hole8</td><td>$rows->hole9</td><td>$rows->hole10</td><td>$rows->hole11</td><td>$rows->hole12</td><td>$rows->hole13</td><td>$rows->hole14</td><td>$rows->hole15</td><td>$rows->hole16</td><td>$rows->hole17</td><td>$rows->hole18</td><td>$rows->gross</td><td>$rows->nett</td></tr>";
                             endif;
                             endforeach;
                         endif;
                         ?>
		</table>
    </div>
    <?php echo $links; ?>
    <div class="pagging"> <?php echo 'Nav Link Press For Update : <a class=normal href='.site_url('scoring/flight_a').'> Flight A  </a><a class=normal href='.site_url('scoring/flight_b').'> Flight B  </a><a class=normal href='.site_url('scoring/flight_c').'>Flight C</a>';?></div>
</div>