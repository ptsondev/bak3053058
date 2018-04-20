<?php
/*
  Template Name: Services
 */
?>
<?php get_template_part('sherhead'); ?>


<div id="main-area">		
	    <div id="main-content" class="page-services container" role="main">
                <?php echo get_template_part('breadcrumb'); ?>
                <h1>Các dịch vụ của SNH</h1>  
                <p>Dịch vụ của SNH bao gồm tất cả các giải pháp nhằm xây dựng thương hiệu từ những bước đầu tiên, cho đến quảng bá và nâng cao giá trị thương hiệu cho doanh nghiệp đến từng khách hàng tiềm năng của họ.</p>
            </div>
                
                <div id="service-design" class="p-service">
                    <div class="container"><div class="row">                        
                        <div class="col-sm-4 col-xs-12">
                            <img src="<?php echo IMG_PATH?>s1.png" />
                        </div>
                        <div class="col-sm-8 col-xs-12">                            
                            <h2>Thiết kế quảng cáo</h2>
                            <div class="service-des">
                                <?php
                                    $term = get_term(TID_DESIGN, 'service-category'); 
                                    echo $term->description;
                                ?>                               
                            </div>
                            <div class="service-tag">
                                <?php display_list_child_service(TID_DESIGN); ?> 
                            </div>
                        </div>                        
                    </div></div>
                </div>
                
                <div id="service-online" class="p-service">
                      <div class="container"><div class="row">                        
                            <div class="col-sm-8 col-xs-12">
                                <h2>Giải pháp online</h2>
                                <div class="service-des">
                                <?php
                                    $term = get_term(TID_ONLINE, 'service-category'); 
                                    echo $term->description;
                                ?>     
                                </div>
                                <div class="service-tag">
                                    <?php display_list_child_service(TID_ONLINE); ?> 
                                </div>
                            </div> 
                            <div class="col-sm-4 col-xs-12">
                                <img src="<?php echo IMG_PATH?>s2.png" />
                            </div>                        
                          </div></div>
                </div>
                
                  <div id="service-media" class="p-service">
                      <div class="container"><div class="row">                        
                    
					<div class="col-sm-8 col-xs-12">
                        <h2>Media</h2>
                        <div class="service-des">
                          <?php
                                    $term = get_term(TID_MEDIA, 'service-category'); 
                                    echo $term->description;
                                ?>     
                        </div>
                         <div class="service-tag">
                                    <?php display_list_child_service(TID_MEDIA); ?> 
                                </div>
                    </div>
					
                    <div class="col-sm-4 col-xs-12">
                        <img src="<?php echo IMG_PATH?>s3.png" />
                    </div>          
                    
                    
                          </div>     </div>     
                </div>
            </div>
            
        
        
</div>

	
<?php get_footer(); ?>
