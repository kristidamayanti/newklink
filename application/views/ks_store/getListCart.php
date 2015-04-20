<div class="row">
  <div class="col-xs-12 col-sm-4 col-md-3"> 
       <?php 
        echo audioStoreMenuNoVoucher();
	   ?>   
  </div>
  <div class="col-xs-12 col-sm-8 col-md-9">
     <div id="divListCart">  
            <?php //echo form_open('novoucher/cart/update'); ?>
            <form id="formUpdCart">
            <table cellpadding="6" cellspacing="1" style="width:100%" border="1">
            
            <tr>
              <th>Qty</th>
              <th>Deskripsi Produk</th>
              <th style="text-align:right">Harga per item</th>
              <th style="text-align:right">Sub-Total</th>
            </tr>
            
            <?php $i = 1; ?>
            
            <?php foreach ($this->cart->contents() as $items): ?>
            
                <?php echo form_hidden('rowid[]', $items['rowid']); ?>
                
                <tr>
                  <td>
                      
                      <select name="qty[]">
                          <option value="0">0</option>
                          <option value="<?php echo $items['qty']; ?>" selected="selected"><?php echo $items['qty']; ?></option>
                      </select>
                  </td>
                  <td>
                    <?php echo $items['name']; ?>
            
                        <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
            
                            <p>
                                <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
            
                                    <strong>
                                    	<?php echo $option_name; ?>:
                                    </strong> 
                                        <?php 
                                          $option_value = str_replace("%20", " ", $option_value);
    									  $option_value = str_replace("%E2%80%99", "’", $option_value);
                                          echo $option_value; 
                                        ?><br />
            
                                <?php endforeach; ?>
                            </p>
            
                        <?php endif; ?>
            
                  </td>
                  <td style="text-align:right"><?php echo $items['price']; ?></td>
                  <td style="text-align:right"><?php echo $items['subtotal']; ?></td>
                </tr>
            
            <?php $i++; ?>
            
            <?php endforeach; ?>
            
            <tr>
              <td colspan="2"> </td>
              <td style="text-align:right"><strong>Total</strong></td>
              <td style="text-align:right"><?php echo $this->cart->total(); ?></td>
            </tr>
            
            </table>
            <?php 
              //$res = $this->cart->contents();
              //print_r($res);
            ?>
            <p><font color="red">* Rubah Qty menjadi "0" jika ingin membatalkan, lalu tekan tombol "Update Cart"</font></p>
            <p>
                <input type="button" id="btnUpdCart" value="Update Cart" onclick="updateCart()" />
                <input type="button" id="btnSaveCart" value="Proceed" onclick="proceedCart()" />
                <?php //echo form_submit('', 'Update your Cart'); ?>
            </p>      
          </form>
        </div>
        <div id="divReadyToSave">
            
        </div>
        <div id="afterSave">
            
        </div>
  </div>
</div>    	
