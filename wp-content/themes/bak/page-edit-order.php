<?php
/*
  Template Name: Edit Order
 */
?>
<?php get_header(); ?>

<?php 
    global $wpdb;
    $order = get_order_by_id($_REQUEST['oid']);
    $arrOrderStatus = bk_get_list_order_status();
    $arrUser = bk_get_list_user();
?>
<main id="p-edit-order">	
    <div class="inner main-wrapper container">   
        <div class="col-sm-7 col-xs-12">
            <div id="group-order-detail" class="group">
                <h3 class="group-title">Chi tiết đơn hàng</h3>
                <div id="list-details">
                    <?php 
                        $details = get_detail_by_order($_REQUEST['oid']);
                        $arrDetailStatus = bk_get_list_detail_status();
                        $i=0;
                        foreach($details as $detail){
                            ?>
                            <div class="detail old" data-did="<?php echo $detail->did;?>">
                                <div class="num"><?php echo ($i+1);?></div>                    
                                <div class="btnRemove"></div>
                                <div class="row">
                                    <div class="col-sm-4"><label>Nội dung</label> <input type="text" class="txtDtitle" value="<?php echo $detail->title;?>"/></div>
                                    <div class="col-sm-4"><label>Phí</label> <input type="text" class="txtDcost" value="<?php echo bk_display_money($detail->cost);?>" /> <div class="btnQuestion"></div></div>
                                    <div class="col-sm-4"><label>Status</label> 
                                        <select class="slDstatus">
                                            <?php 
                                            foreach($arrDetailStatus as $k=>$v){
                                                 if($detail->status==$k){
                                                    echo '<option value="'.$k.'" selected>'.$v.'</option>';
                                                }else{
                                                    echo '<option value="'.$k.'">'.$v.'</option>';
                                                }
                                            }
                                            ?>                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="inline">Chi tiết</label>
                                        <textarea class="txtDdes"><?php echo $detail->des;?></textarea>
                                    </div>
                                </div>
                            </div> 

                    <?php 
                        }
                    ?>
                </div>
                <div id="max">1</div>
                <div id="btnAddMoreDetail">+ Thêm chi tiết khác</div>
            </div>    
        </div>
        
        <div class="col-sm-5 col-xs-12">
            <div id="group-customer" class="group">
                <h3 class="group-title">Khách Hàng</h3>
                <div class="row">
                    <?php $customer = get_customer_by_id($order->cid);?>
                    <!--
                    <div class="col-xs-6"><input type="radio" name="rdC" value="new" id="rdNewC" checked="checked"> Khách mới</div
                    <div class="col-xs-6"><a id="btnShowOldCustomers" href="#old-customers"></a> <input type="radio" name="rdC" value="old" id="rdOldC"> Khách Cũ<div id="oldCid"></div></div>
                    -->
                    <div id="old-customers" style="display: none">
                        <?php require_once('search_customer.php');?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6"><label>Tên khách: </label><input type="text" id="txtCName" value="<?php echo $customer->name?>" ></div>
                    <div class="col-xs-6"><label>Công ty: </label><input type="text" id="txtCCompany" value="<?php echo $customer->company?>" ></div>
                </div>
                <div class="row">
                    <div class="col-xs-6"><label>Điện thoại: </label><input type="text" id="txtCPhone" value="<?php echo $customer->phone?>"  ></div>
                    <div class="col-xs-6"><label>Email: </label><input type="text" id="txtEmail" value="<?php echo $customer->email?>"  ></div>
                </div>
            </div>     
            
            <div id="group-order" class="group">
                <h3 class="group-title">Đơn hàng</h3>
                <div class="row">
                    <div class="col-sm-12"><h4>Mã đơn hàng: <b><?php echo $order->ma; ?></b></h4></div>
                    <?php  $current_user = wp_get_current_user();                    ?>
                    <div class="col-xs-6"><label>Phụ trách: </label><input disabled type="text" id="txtUName" value="<?php echo $arrUser[$order->uid];?>"></div>
                    <div class="col-xs-6"><label>Ngày tạo: </label><input disabled type="text" id="txtOcreated" value="<?php echo date('d-m-Y', $order->created);?>"></div>
                </div>
                <div class="row">
                    <div class="col-xs-6"><label>Tổng phí: </label><input disabled type="text" id="txtOprice" value="<?php echo bk_display_money($order->price); ?>"></div>
                    <div class="col-xs-6"><label>Tình trạng: </label>
                        <select id="slOstatus">
                            <?php 
                            foreach($arrOrderStatus as $k=>$v){
                                    if($order->status==$k){
                                        echo '<option value="'.$k.'" selected>'.$v.'</option>';
                                    }else{
                                        echo '<option value="'.$k.'">'.$v.'</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>                
            </div>    
            
            <div id="group-order" class="group">
                <h3 class="group-title">Thanh toán</h3>
                <div class="row">
                    <div class="col-sm-12">Thanh toán lần 1</div>
                    <?php 
                        $time1 = ($order->p1_datetime!='') ?  date('d-m-Y',$order->p1_datetime):'';
                        $time2 = ($order->p2_datetime!='') ?  date('d-m-Y',$order->p2_datetime):'';
                    ?>
                    <div class="col-sm-4"><label>Số tiền</label><input type="text" id="txtP1Price" value="<?php echo bk_display_money($order->p1_price);?>"/></div>
                    <div class="col-sm-4"><label>Ngày giờ</label><input type="text" id="txtP1DateTime" value="<?php echo $time1;?>"/></div>
                    <div class="col-sm-4"><label>Note</label><input type="text" id="txtP1Note" value="<?php echo $order->p1_note; ?>"/></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">Thanh toán lần 2</div>
                    <div class="col-sm-4"><label>Số tiền</label><input type="text" id="txtP2Price" value="<?php echo bk_display_money($order->p2_price);?>"/></div>
                    <div class="col-sm-4"><label>Ngày giờ</label><input type="text" id="txtP2DateTime" value="<?php echo $time2; ?>"/></div>
                    <div class="col-sm-4"><label>Note</label><input type="text" id="txtP2Note" value="<?php echo $order->p2_note; ?>"/></div>
                </div>
            </div>
            
            <div id="btnUpdateOrder" data-cid="<?php echo $order->cid; ?>" data-oid="<?php echo $order->oid;?>"><i class="fa fa-floppy-o" aria-hidden="true"></i> Cập nhật đơn hàng</div>
        </div>
                
    </div>
</main>
	
<?php get_footer(); ?>
