<div class="mainForm">
  <form class="form-horizontal" id="formInputProductCat">
    <fieldset>      
      <div class="control-group">
       <?php
		  $onchange = "onchange=\"Product.getListProductCatByParam('prdcat_name',this.value)\"";
		  echo inputTextWithHiddenID("Product Category Title", "prdcat_name", "span7 typeahead", placeholderCheck(), $onchange);
		  echo selectFlagActive();
		  $arr = array(
             "inputAction"  => "Product.saveInputProductCat()",
             "updateAction" => "Product.saveUpdateProductCat()",
             "cancelUpdate" => "Product.cancelUpdateProductCat()",
             "listAction"   => "All.getListData('admProduct/getListProductCat')",
            );
            echo buttonInputAndUpdate($arr);
		?>
      </div> <!-- end control-group -->
     </fieldset>
  </form>   
  <div class="result"></div>
</div><!--/end mainForm-->
