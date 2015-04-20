	
        <?php //if(!isset($no_visible_elements) || !$no_visible_elements)	{ ?>
			<!-- content ends -->
			</div><!--/#content.span10-->
		<?php //} ?>
		</div><!--/fluid-row-->
		<?php //if(!isset($no_visible_elements) || !$no_visible_elements)	{ ?>
		<hr/>
    
		<footer>
			<p class="pull-left">All Right Reserved &copy; K-SYSTEM ADMIN</a> <?php echo date('Y') ?></p>
			<p class="pull-right">Build by K-link IT Dept</a></p>
		</footer>
		<?php //} ?>

	</div><!--/.fluid-container-->
	
	<?php //Google Analytics code for tracking my demo site, you can remove this.
		//if($_SERVER['HTTP_HOST']=='usman.it') { ?>
		<script>
	/*		var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-26532312-1']);
			_gaq.push(['_trackPageview']);
			(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ga);
			})();*/
		</script>
	<?php //} ?>
		<script>
    $(".ss").click( function() {
             var isi = $(this).attr('id');
             $("#content").load(isi);
             return false;
		});
    </script>
   
</body>
</html>
