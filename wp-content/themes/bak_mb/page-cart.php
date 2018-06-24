<?php
/*
  Template Name: Cart
 */
?>
<?php get_header(); ?>

<div id="main-body">
    <div class="container main-wrapper">
        <div class="row" id="order-confirm">
            <div class="col-sm-7 col-xs-12" id="order-products">
                <div class="block">
                    <h3><span class="step">1</span>Sản phẩm đặt mua</h3>
                    <?php 
                        if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
                            $cart = $_SESSION['cart'];
                            $i=1;
                            $total = 0;
                            foreach($cart as $pid){
                                $product = get_post($pid);
                                $s_price = get_post_meta($pid, 'wpcf-product_sell_price', true);
                                $giaSell = is_numeric($s_price)? bak_display_money($s_price):'Liên Hệ';
                                $total += $s_price;
                                echo '<div class="item">';
                                    echo '<div class="index col-sm-1">'.$i++.'</div>';
                                    echo '<div class="thumb col-sm-2">'.get_the_post_thumbnail($product).'</div>';                            
                                    echo '<div class="title col-sm-5">'.$product->post_title.'</div>';                                    
                                    echo '<div class="price col-sm-3">';
                                        echo '<input type="hidden" class="txtPrice" value="'.$s_price.'" />'.$giaSell;
                                    echo '</div>';
                                    echo '<div class="remove col-sm-1"><i data-pid="'.$pid.'" class="btnRemoveItem far fa-times-circle" title="Xóa khỏi giỏ hàng"></i></div>';
                                echo '</div>';
                            }
                            echo '<div class="row total">';
                                echo '<div class="col-sm-8 btitle">Tổng</div>';
                                echo '<div class="col-sm-4 total-price">';
                                    echo bak_display_money($total);
                                echo '</div>';
                            echo '</div>';
                        }else{
                            echo 'Bạn hiện chưa chọn mua sản phẩm nào, xin tham khảo qua các dòng <a href="/san-pham">sản phẩm</a> trước khi đặt hàng nhé';
                        }
                    ?>
                </div>
            </div>
            
            <div class="col-sm-5 col-xs-12" id="order-info">
                <div class="block">
                    <h3><span class="step">2</span>Thông tin khách hàng</h3>
                    <div id="order-form">
                        <?php echo do_shortcode('[contact-form-7 id="132" title="Đặt hàng"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>