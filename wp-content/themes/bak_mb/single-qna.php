<?php get_header(); ?>

<div id="main-body">
    <div class="container main-wrapper">
        <div class="row">
            <div class="col-sm-9 col-xs-12">
                <?php
                    while ( have_posts() ) : the_post();
                        echo '<h1>'.get_the_title().'</h1>';
                        echo '<div class="post-date created">'.get_the_date().'</div>';                        
                        echo '<div id="main-content">'.get_the_content().'</div>';
                        echo bak_social_share();
                        echo '<div class="fb-comments" data-href="'.get_permalink().'" data-numposts="5"></div>';
                    endwhile;
                
                    echo '<div id="related-qnas">';                            
                                    $curID = get_the_ID();                                                                    
                                    $qnas = get_posts(array(
                                      'post_type' => 'qna',
                                      'post__not_in' => array($curID),
                                      'numberposts' => 5,                                      
                                     ));                                    
                                                         
                            
                                echo '<h3>Tìm hiểu thêm</h3>';
                                
                                    foreach ($qnas as $qna){ 
                                            echo '<li class="item"><a href="'.get_permalink($qna->ID).'">';
                                                 echo $qna->post_title;
                                            echo '</a></li>';
                                        
                                    }                                
                    echo '</div>';
                ?>                
            </div>

            <div class="col-sm-3 col-xs-12" id="main-sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
