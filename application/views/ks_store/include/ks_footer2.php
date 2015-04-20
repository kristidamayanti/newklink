
    <footer>
      <div class="row">

        <div class="col-xs-12 col-sm-3">
          <h3>Sign up to our e-mail </h3>
          <form class="" role="form">
            <div class="form-group">
              <label class="sr-only" for="exampleInputEmail2">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
            </div>
            <button type="button" class="btn btn-primary">Submit</button>
          </form>
        </div>

        <div class="col-xs-12 col-sm-3">
          <ul class="footer-nav">
            <li><a href="<?php echo site_url() . '/contact'; ?>">Hubungi kami</a></li>
            <li><a href="<?php echo site_url() . '/community'; ?>">Community</a></li>
            <li><a href="<?php echo site_url() . '/stockist'; ?>">Locate Stockist</a></li>
            <li><a href="<?php echo site_url() . '/howdo'; ?>">How do i join? </a></li>
          </ul>
        </div>

        <div class="col-xs-12 col-sm-3">
          <ul class="footer-nav">
            <li>Service</li>
            <li><a href="<?php echo site_url() . '/blog'; ?>">Blog</a></li>
            <li><a href="<?php echo site_url() . '/contact'; ?>">Contact us</a></li>
            <li>Community</li>
            <li><a href="<?php echo site_url() . '/stockist'; ?>">Locate Stockist</a></li>
            <li>Distributor Login</li>
          </ul>
        </div>
        
        <div class="col-xs-12 col-sm-3">
          <h3>Get Social, Follow us on </h3>
          <ul class="icons">
            <li class="myicon-facebook"></li>
            <li class="myicon-twitter"></li>
            <li class="myicon-youtube"></li>
          </ul> 
        </div>

      </div><!-- End rows -->
      <div class="row">
        <div class="col-md-12 text-center">
          <p class="top-bordered">Copyright &copy; PT K-Link Indonesia 2014</p>
        </div>
      </div><!-- End rows -->
      
    </footer>
  </div> <!-- /container

  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>js/holder.js"></script>
  <script src="<?php echo base_url(); ?>js/global.js"></script>
    <script>
        /*function addCart(theX) {
            var x = theX.id;
            $.ajax({
                url: x ,
                type: 'GET',
                dataType: 'json',
                success:
                function(data){
                   alert(data.message);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                     alert(thrownError + ':' +xhr.status);
                     All.set_enable_button();
                }
            });
        }*/
        
        function addCart(param) {
            var prdcd = $("#prdcd" +param).text();
            var title = $("#title" +param).text();
            var price = $("#westPrice" +param).text();
            var file = $("#file" +param).text();
            
            $.ajax({
                url: All.get_url('novoucher/cart/add') ,
                type: 'POST',
                data: {prdcd:prdcd, title:title, price:price, file:file},
                dataType: 'json',
                success:
                function(data){
                   alert(data.message);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                     alert(thrownError + ':' +xhr.status);
                     All.set_enable_button();
                }
            }); 
        }
        
        
		
		function updateCart() {
            $("input[type=button]").attr('disabled', 'disabled');
            $.post(All.get_url("novoucher/cart/update2") , $("#formUpdCart").serialize(), function(data)
            {  
                $("input[type=button]").removeAttr('disabled');
                $("#divListCart").html(null);
                $("#divListCart").html(data);   
            }).fail(function() { 
                alert("Error requesting page"); 
                //All.set_enable_button();
                $("input[type=button]").removeAttr('disabled');
            });  
        }
        
        function proceedCart() {
            $("input[type=button]").attr('disabled', 'disabled');
            $.post(All.get_url("novoucher/cart/proceed") , $("#formUpdCart").serialize(), function(data)
            {  
                $("input[type=button]").removeAttr('disabled');
                $("#divListCart").hide();
                $("#divReadyToSave").html(null);   
                $("#divReadyToSave").html(data);
            }).fail(function() { 
                alert("Error requesting page"); 
                //All.set_enable_button();
                $("input[type=button]").removeAttr('disabled');
            }); 
        }
        
        function backToCartList() {
            $("#divReadyToSave").html(null);
            $("#divListCart").show(); 
        }
        
        function saveProceedCart() {
            $("input[type=button]").attr('disabled', 'disabled');
            $.post(All.get_url("novoucher/cart/save") , $("#formUpdCartToSave").serialize(), function(data)
            {  
                $("input[type=button]").removeAttr('disabled');
                $("#divReadyToSave").hide();
                $("#afterSave").html(null);
                $("#afterSave").html(data);
            }).fail(function() { 
                alert("Error requesting page"); 
                //All.set_enable_button();
                $("input[type=button]").removeAttr('disabled');
            }); 
        }
        
        $(".inpoh").on("click", function() {
		   var ss = $(this).attr("id");
		   //$('#imagepreview').attr('src', ss); // here asign the image to the modal when the user click the enlarge link
		   //$('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
		   //alert("ID :" +ss);
		   $.ajax({
                url: "<?php echo base_url('ks_store/getLanggananByID'); ?>" + "/" +ss,
                type: 'GET',
                dataType: 'json',
                success:
                function(data){
                   
                   var urlx = All.get_url('upload/kaset/thumbnail/');
                   var desc = data.arrayData[0].descript;
                   var img = urlx + data.arrayData[0].cover_kaset;
                   $('#imagepreview').attr('src', img); // here asign the image to the modal when the user click the enlarge link
		           $('#title_kaset').html('<p class=miniinfo>' + desc + '</p>');
		           $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
                },
                error: function (xhr, ajaxOptions, thrownError) {
                     alert(thrownError + ':' +xhr.status);
                     All.set_enable_button();
                }
            });
		});
    </script>
</body>
</html>
