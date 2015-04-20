<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if(empty($flight)):
             echo "<tr><td>1</td><td>Not Found</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td></tr>";
        else:            
             $no = 0;
             foreach ($flight->result() as $rows):
                $no = $no+1;
                echo "<tr><td width=40>$no</td><td width=67>$rows->nama</td><td width=20>$rows->hole1</td><td width=20>$rows->hole2</td><td width=20>$rows->hole3</td><td width=20>$rows->hole4</td><td width=20>$rows->hole5</td><td width=20>$rows->hole6</td><td width=20>$rows->hole7</td><td width=20>$rows->hole8</td><td width=20>$rows->hole9</td><td width=50>-</td><td>$rows->hole10</td><td>$rows->hole11</td><td>$rows->hole12</td><td>$rows->hole13</td><td>$rows->hole14</td><td>$rows->hole15</td><td>$rows->hole16</td><td>$rows->hole17</td><td>$rows->hole18</td><td width=83>$rows->gross</td><td width=60>$rows->nett</td></tr>";             
             endforeach;            
         endif;
?>
