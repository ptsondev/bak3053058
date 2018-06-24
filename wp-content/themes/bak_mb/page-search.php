<?php
/*
  Template Name: Custom Search
 */
?>
<?php get_header(); ?>

<div id="main-body">
    <div class="container main-wrapper">
        <div class="row main-p-products">            
            <div class="col-sm-9 col-xs-12">
                <h1>Kết quả tìm kiếm</h1>
                <?php searchProduct(); ?>
            </div>
            
            <div class="col-sm-3 col-xs-12">
                 <?php get_sidebar(); ?>
            </div>
            
        </div>
    </div>
</div>


<?php get_footer(); ?>