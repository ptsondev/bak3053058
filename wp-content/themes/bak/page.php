<?php                                                                                                                                        
<div id="breadcrumb">
    <div class="container">
        <ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a href="" itemscope="" itemtype="http://schema.org/Thing" itemprop="item">
                    <span itemprop="name">Bếp An Khang</span>
                </a> ›
                <meta itemprop="position" content="2">
            </li>
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a href="" itemscope="" itemtype="http://schema.org/Thing" itemprop="item">
                    <span itemprop="name">Dòng ABC</span>
                </a>
                <meta itemprop="position" content="3">
            </li>
        </ol>
    </div>
</div>



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
