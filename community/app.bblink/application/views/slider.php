<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if(empty($series)):
        echo 'Empty Record';
    else:
        $row = $series->row();
    endif;

?>
<body>

<div class="navbar">                    
    <div class="navbar-inner">
        <div class="row">
        <div class="span3">
        <?php
        $logo = array(
              'src' => 'images/score_logo.jpg',
              'alt' => 'Header images',
              'title' => 'K-link Golf Logo',
              'width' => 158,
              'height' => 118,

        );
        echo "<div class=''>";
        echo img($logo);
        echo "</div>"
        ?>
        </div>
        <div class="span6">
            <div class="page-header">
                <center><h2>K-LINK INDONESIA TOURNAMENT SERIES</h2></center>
                <center><h4><?php echo $row->seriesName; ?></h4></center>
            </div>
        </div>
        <div class="span3">
        <?php
        $logo = array(
              'src' => 'images/riverside.jpg',
              'alt' => 'Header images',
              'title' => 'K-link Golf Logo',
        );
        echo "<div class='pull-right'>";
        echo img($logo);
        echo "</div>"
        ?>
        </div>        
        </div>
</div>
    </div>         
<div class="container">
    <table class="table table-bordered table-striped" width="1200">
        <thead>
        <tr>
            <th class ="btn-primary" rowspan="2" scope="col">NO</th>
            <th class ="btn-primary" rowspan="2" scope="col">NAMA</th>
            <th class ="btn-primary" height="44" colspan="19" scope="col">HOLE</th>
            <th class ="btn-primary" rowspan="2" scope="col">GROSS</th>
            <th class ="btn-primary" rowspan="2" scope="col">NETT</th>
        </tr>
        <tr>
            <td class="btn-success" height="47">1</td>
            <td class="btn-success" >2</td>
            <td class="btn-success" >3</td>
            <td class="btn-success" >4</td>
            <td class="btn-success" >5</td>
            <td class="btn-success" >6</td>
            <td class="btn-success" >7</td>
            <td class="btn-success" >8</td>
            <td class="btn-success" >9</td>
            <td class="btn-warning" >OUT</td>
            <td class="btn-success" >10</td>
            <td class="btn-success" >11</td>
            <td class="btn-success" >12</td>
            <td class="btn-success" >13</td>
            <td class="btn-success" >14</td>
            <td class="btn-success" >15</td>
            <td class="btn-success" >16</td>
            <td class="btn-success" >17</td>
            <td class="btn-success" >18</td>
        </tr>
        </thead>
        </table>
<script type="text/javascript">
$(document).ready(function()
	{
		var auto_refresh = setInterval(function(){		
		$('#series tbody').load('<?php echo site_url().'/json/show';?>');
                }, 5000);

                $('.rolling_table').SetScroller({
                                velocity: 30,                                
                                direction: 'vertical',
                                });

                $('.news_ticker').SetScroller({
                                velocity: 30,
                                direction: 'horizontal',
                                startfrom: 'right',
                                });

                $(function(){$("ul#ticker").liScroll();
                            });
                            
	}
);
 </script>
<div class="rolling_table">
    <div class="scrollingtext">
            <table id ="series" class="table table-bordered table-striped" width="1200">
                <tbody>

                </tbody>
            </table>    
    </div>
</div>
</div>
<div class="navbar navbar-fixed-bottom ">
    <div class="navbar-inner">    
        <div class="news_ticker">            
                <ul id="ticker">
                    <?php
                    if(empty($info)):
                        echo "<li><h3>www.k-linkgolf.co.id</h3></li>";
                    else:
                        foreach($info->result() as $row):
                            echo "<li><h3>$row->info_det</h3></li>";
                        endforeach;
                    endif;
                    ?>
                </ul>            
        </div>
    </div>
</div>
</body>