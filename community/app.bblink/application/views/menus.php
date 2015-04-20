<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id='cssmenu'>
<ul>
   <li class='active '><a href='<?php echo site_url('charity');?>'><span>Charity</span></a></li>
   <li class='has-sub '><a href='<?php echo site_url('scoring/flight_a');?>'><span>Scoring</span></a>
      <ul>
         <li><a href='<?php echo site_url('scoring/flight_a');?>'><span>Live Scoring</span></a></li>
         <li><a href='<?php echo site_url('leaderboard/flight');?>'><span>Leaderboard</span></a></li>
      </ul>
   </li>
   <li class='has-sub '><a href='#'><span>Tournaments</span></a>
      <ul>
         <li><a href='<?php echo site_url('schedule');?>'><span>Complete Schedule</span></a></li>
      </ul>
   </li>
   <li class='has-sub '><a href='#'><span>player</span></a>
      <ul>
         <li><a href='<?php echo site_url('players');?>'><span>find player</span></a></li>
      </ul>
   </li>
   <li class='has-sub '><a href='<?php echo site_url('videos');?>'><span>Video</span></a>
      <ul>
         <li><a href='#'><span>top shot</span></a></li>
         <li><a href='#'><span>top 10</span></a></li>
      </ul>
   </li>
   <li class='has-sub '><a href='<?php echo site_url('news');?>'><span>news</span></a>
      <ul>
         <li><a href='<?php echo site_url('news/archive');?>'><span>news archive</span></a></li>
      </ul>
   </li>
   <li class='has-sub '><a href='<?php echo site_url('course');?>'><span>golf course</span></a>
   </li>
</ul>
</div>