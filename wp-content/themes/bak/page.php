<?php get_header(); ?>                                                                                                                                     

<div id="main-body">
    <div class="container main-wrapper">
        <div class="row">
            <div class="col-sm-9 col-xs-12">
                 <?php
                            // Start the loop.
                            while ( have_posts() ) : the_post();
                                // Include the page content template.
                                get_template_part( 'content', 'page' );                              
                            // End the loop.
                            endwhile;
                    ?>
            </div>

            <div class="col-sm-3 col-xs-12" id="main-sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
