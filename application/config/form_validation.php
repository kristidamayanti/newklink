<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$config = array(
    'storelogin/index' => array(
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required'
        ),
        array(
            'field' => 'captcha',
            'label' => 'Captcha',
            'rules' => 'required'
        )
    ),
    'choose/index' => array(
        array(
            'field' => 'voucherno',
            'label' => 'Voucher No',
            'rules' => 'required'
        ),
        array(
            'field' => 'voucherkey',
            'label' => 'Voucher Key',
            'rules' => 'required'
        )
    ),
    'blog/det' => array(
        array(
            'field' => 'name',
            'label' => 'Nama',
            'rules' => 'required'
        ),
        array(
            'field' => 'bl_comment',
            'label' => 'Comment',
            'rules' => 'required'
        )
    ),
	'adminLogin' => array(
                            array(
                                    'field' => 'username',
                                    'label' => 'Username',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
                            array(
                                    'field' => 'password',
                                    'label' => 'Password',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
                           
                           ), 
     
	 'changePassword' => array(
	 					    array(
                                    'field' => 'username',
                                    'label' => 'Username',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
                            array(
                                    'field' => 'oldPassword',
                                    'label' => 'Old Password',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
						    array(
                                    'field' => 'newPassword',
                                    'label' => 'New Password',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
						    array(
                                    'field' => 'confirmNewPassword',
                                    'label' => 'Confirm New Password',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
	 					   ),
	'saveUser' => array(
	 					    array(
                                    'field' => 'username',
                                    'label' => 'Username',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
                            array(
                                    'field' => 'password',
                                    'label' => 'Password',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
						    array(
                                    'field' => 'fullname',
                                    'label' => 'Fullname',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
						    
	 					   ),
    'saveRootMenu' => array (
                             array(
                                    'field' => 'rootMenuName',
                                    'label' => 'Root Menu Name',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
                            array(
                                    'field' => 'prefix',
                                    'label' => 'Prefix',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
                            array(
                                    'field' => 'orderlist',
                                    'label' => 'Orderlist',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
                            ),
    'saveSubMenu' => array (
                             array(
                                    'field' => 'subMenuName',
                                    'label' => 'Sub Menu Name',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
                             array(
                                    'field' => 'url',
                                    'label' => 'URL',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
                             array(
                                    'field' => 'orderlist',
                                    'label' => 'Orderlist',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
                            ),
    'saveGalleryCat' => array(
                            array(
                                    'field' => 'gid',
                                    'label' => 'Gallery Group ID',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
                             array(
                                    'field' => 'gCatTitle',
                                    'label' => 'Gallery Group Title',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
                             
                                 
                          ),
    'saveGallery' => array(
                            array(
                                    'field' => 'title',
                                    'label' => 'title',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
                             array(
                                    'field' => 'gallery_desc',
                                    'label' => 'description',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
                             
                                 
                          ),
						  
	'saveProductCat' => array(
	                        array(
				    'field' => 'prdcat_name',
                                    'label' => 'Product Code',
                                    'rules' => 'trim|required|xss_clean'
						    )
						  ),
                            
    'saveProduct' => array(
                            array(
                                    'field' => 'prdcd',
                                    'label' => 'Product Code',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
                             array(
                                    'field' => 'title',
                                    'label' => 'Product Title',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
                             array(
                                    'field' => 'category',
                                    'label' => 'Category',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
                                
                                 
                          ),
	'saveRelatedProduct' => array(
								array(
										'field' => 'code',
										'label' => 'Product Code',
										'rules' => 'trim|required|xss_clean'
								)
								
						  ),
    'updateRelatedProduct' => array(
                                array(
                                        'field' => 'id',
                                        'label' => 'Product Code',
                                        'rules' => 'trim|required|xss_clean'
                                )
                                
                          ),    				
    'saveOffice' => array(
                            array(
                                    'field' => 'scode',
                                    'label' => 'Office Code',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
                            array(
                                    'field' => 'sname',
                                    'label' => 'Office Name',
                                    'rules' => 'trim|required|xss_clean'
                                 ),     
                            array(
                                    'field' => 'type',
                                    'label' => 'Type',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
                            array(
                                    'field' => 'country',
                                    'label' => 'Country',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
                             array(
                                    'field' => 'city',
                                    'label' => 'City',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
                             array(
                                    'field' => 'address',
                                    'label' => 'address',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
                             /*array(
                                    'field' => 'zipcode',
                                    'label' => 'zipcode',
                                    'rules' => 'trim|required|xss_clean'
                                 ), */
                             array(
                                    'field' => 'phone',
                                    'label' => 'phone',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
                             array(
                                    'field' => 'city',
                                    'label' => 'City',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
                         ),
    'saveDownload' => array(
                            array(
                                    'field' => 'title',
                                    'label' => 'title',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
                            array(
                                    'field' => 'download_desc',
                                    'label' => 'description',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
                              ),
     'saveStreaming' => array(
                            array(
                                    'field' => 'title',
                                    'label' => 'title',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
                            array(
                                    'field' => 'streaming_desc',
                                    'label' => 'description',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
                            array(
                                    'field' => 'youtube_url',
                                    'label' => 'Youtube URL',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
                            array(
                                    'field' => 'duration',
                                    'label' => 'Duration',
                                    'rules' => 'trim|required|xss_clean'
                                 ),
                              ),
	 'saveSlideShow' => array(
	 							array(
	                                    'field' => 'title',
	                                    'label' => 'title',
	                                    'rules' => 'trim|required|xss_clean'
	                                 ),
	                            array(
	                                    'field' => 'url',
	                                    'label' => 'url',
	                                    'rules' => 'trim|required|xss_clean'
	                                 ),
							    
	 						 ),
	 'savePromo' => array(
	 							array(
	                                    'field' => 'title',
	                                    'label' => 'title',
	                                    'rules' => 'trim|required|xss_clean'
	                                 ),
	                            array(
	                                    'field' => 'url',
	                                    'label' => 'url',
	                                    'rules' => 'trim|required|xss_clean'
	                                 ),
							    array(
	                                    'field' => 'validFrom',
	                                    'label' => 'validFrom',
	                                    'rules' => 'trim|required|xss_clean'
	                                 ),
							    array(
	                                    'field' => 'validTo',
	                                    'label' => 'validTo',
	                                    'rules' => 'trim|required|xss_clean'
	                                 )
	 					 ), 
	 'saveNews' => array(
                                array(
                                        'field' => 'title',
                                        'label' => 'title',
                                        'rules' => 'trim|required|xss_clean'
                                     ),
                                
                                array(
                                        'field' => 'newsArticleDetail',
                                        'label' => 'newsArticleDetail',
                                        'rules' => 'trim|required|xss_clean'
                                     )
                         ), 
                         
     'WebRootMenu' => array(
                                array(
                                        'field' => 'menu_title',
                                        'label' => 'menu_title',
                                        'rules' => 'trim|required|xss_clean'
                                     ),
                                
                                array(
                                        'field' => 'menu_url',
                                        'label' => 'menu_url',
                                        'rules' => 'trim|required|xss_clean'
                                     ),
                                array(
                                        'field' => 'menu_category',
                                        'label' => 'menu_category',
                                        'rules' => 'trim|required|xss_clean'
                                     )     
                           ),
     
     'WebMenu' => array(
                                array(
                                        'field' => 'menu_title',
                                        'label' => 'menu_title',
                                        'rules' => 'trim|required|xss_clean'
                                     ),
                                
                                array(
                                        'field' => 'menu_url',
                                        'label' => 'menu_url',
                                        'rules' => 'trim|required|xss_clean'
                                     ),
                                 
                           ),
    
     'WebSubMenu' => array(
                                array(
                                        'field' => 'menu_title',
                                        'label' => 'menu_title',
                                        'rules' => 'trim|required|xss_clean'
                                     ),
                                
                                array(
                                        'field' => 'menu_url',
                                        'label' => 'menu_url',
                                        'rules' => 'trim|required|xss_clean'
                                     ),
                                
                                array(
                                        'field' => 'menu_parentID',
                                        'label' => 'menu_parentID',
                                        'rules' => 'trim|required|xss_clean'
                                     )
                                 
                           ),
      
      'saveBlog' => array(
                               array(
                                        'field' => 'bl_name',
                                        'label' => 'Blog Name',
                                        'rules' => 'trim|required|xss_clean'
                                     ),
                                
                              array(
                                        'field' => 'bl_content',
                                        'label' => 'bl_content',
                                        'rules' => 'trim|required|xss_clean'
                                     )
                                
                                /*array(
                                        'field' => 'bl_fb',
                                        'label' => 'bl_fb',
                                        'rules' => 'trim|required|xss_clean'
                                     ),
                                array(
                                        'field' => 'bl_twitter',
                                        'label' => 'bl_twitter',
                                        'rules' => 'trim|required|xss_clean'
                                     ) */
                         ),
                         
     
     'saveFaq' => array(
                           array(
                                   'field' => 'question',
                                   'label' => 'Question',
                                   'rules' => 'trim|required|xss_clean'
                                ),
                           array(
                                   'field' => 'category_id',
                                   'label' => 'category_id',
                                   'rules' => 'trim|required|xss_clean'
                                )      
                                
                       ),
                       
      'saveFaqCat' => array(
                           array(
                                   'field' => 'category_name',
                                   'label' => 'category_name',
                                   'rules' => 'trim|required|xss_clean'
                                )
                       ),
     
      'saveFaqAnswer' => array(
                           array(
                                   'field' => 'qid',
                                   'label' => 'Question',
                                   'rules' => 'trim|required|xss_clean'
                                ),
                           array(
                                   'field' => 'answer',
                                   'label' => 'Answer',
                                   'rules' => 'trim|required|xss_clean'
                                )
                       ),
      'saveKaset' => array(
                                
                                array(
                                        'field' => 'title',
                                        'label' => 'title',
                                        'rules' => 'trim|required|xss_clean'
                                     )
                         ), 
                         
      'savePrdBundling' => array(
                                
                                array(
                                        'field' => 'name',
                                        'label' => 'name',
                                        'rules' => 'trim|required|xss_clean'
                                     )
                         ),
      
);
