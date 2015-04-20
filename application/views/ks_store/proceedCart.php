<form id="formUpdCartToSave">
                    <table cellpadding="6" cellspacing="1" style="width:100%" border="1">
                    
                    <tr>
                      <th>QTY</th>
                      <th>Item Description</th>
                      <th style="text-align:right">Item Price</th>
                      <th style="text-align:right">Sub-Total</th>
                    </tr>
                    
                    <?php $i = 1; ?>
                    
                    <?php foreach ($this->cart->contents() as $items): ?>
                    
                        <?php echo form_hidden('rowid[]', $items['rowid']); ?>
                        
                        <tr>
                          <td>
                              <?php echo $items['qty']; ?>
                              <input type="hidden" name="qty[]" value="<?php echo $items['qty']; ?>" />
                              
                          </td>
                          <td>
                            <?php echo $items['name']; ?>
                    
                                <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
                    
                                    <p>
                                        <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
                    
                                            <strong><?php echo $option_name; ?>:</strong> 
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
                      /*echo "Sukses : "; echo $token['sukses']; echo "<br />";
					  echo "saldo : "; echo $token['saldo']; echo "<br />";
					  echo "token : "; echo $token['token']; echo "<br />";
					  echo "responMessage : "; echo $token['responMessage']; */
                      if($token['sukses'] == "0") {
                          echo "<p align=center><font color=red>$token[responseMessage]</font></p>";
                          
                          echo "<p>";
                          echo "<input type=\"button\" id=\"btnUpdCart\" value=\"Back\" onclick=\"backToCartList()\" />";
                          //echo "<input type=\"button\" id=\"btnSaveCart\" value=\"Save\" onclick=\"saveProceedCart()\" />";
                          echo "</p>";
                      
                      } else {
                          
                      
                    ?>
                    <p align=center>
                        <input type="hidden" name="tokenCheck" id="tokenCheck" value="<?php echo $token['token']; ?>" />
                       <br />Token : <input type="text" name="token" id="token" value="" />
                    </p>
                    <p>
                        <input type="button" id="btnUpdCart" value="Back" onclick="backToCartList()" />
                        <input type="button" id="btnSaveCart" value="Save" onclick="saveProceedCart()" />
                        <?php //echo form_submit('', 'Update your Cart'); ?>
                    </p>  
                    <?php
                      }
                      
                      //echo "TOKEN : ";
                      //echo $token['token'];
                    ?>    
                  </form>
                  