<?php
/*
  Template Name: Articles
 */
?>
<?php get_header(); ?>

<div id="main-body">
    <div class="container main-wrapper">
        <div class="row main-p-articles">
            <div class="col-sm-9 col-xs-12">
            <?php 
                $articles = get_posts(array(
                    'post_type' => 'post',                    
                    'numberposts' => -1,                    
                ));    
                //var_dump($articles);
                foreach($articles as $article){
                    echo '<div class="article row">';
                        echo '<div class="col-sm-2 col-xs-4"><a href="'.get_permalink($article->ID).'"><img src="'.bak_get_thumbnail($article->ID, 400, 300).'" /></a></div>';
                        echo '<div class="col-sm-10 col-xs-8">';
                            echo '<div class="title"><a href="'.get_permalink($article->ID).'">'.$article->post_title.'</a></div>';
                            echo '<div class="des">'.get_post_meta($article->ID, '_yoast_wpseo_metadesc', true) .'</div>';
                        echo '</div>';
                    echo '</div>';
                }
            ?>
            </div>

            <div class="col-sm-3 col-xs-12" id="main-sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>