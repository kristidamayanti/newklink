
  </div>
     </div> 
    </div> <!--END container-fluid -->   
    <footer>
        <hr>
        <!-- Purchase a site license to remove this link from the footer: http://www.portnine.com/bootstrap-themes -->
        <p class="pull-right">A K-System Application by EDP K-Link</p>
        
        
        <p>&copy; 2013</p>
    </footer>
    

    

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>
    $(".ss").click( function() {
             var isi = $(this).attr('id');
             $("#content").html('<center><img src=http://www.k-linkmember.co.id/ksystemx/images/ajax-loader2.gif ></center>');  
             //$.preload('<center><img src=http://www.k-linkmember.co.id/ksystem/images/ajax-loader2.gif ></center>');
			 $("#content").load(isi, function(response, status, xhr) {
              if (status == "error") {
                alert("The page you are requesting is not found, Error status :" +xhr.status);
              }
            });
             
		}); 
    
    
    </script>
   <input type="hidden" id="tab_qty" value="0"/>
  </body>
</html>