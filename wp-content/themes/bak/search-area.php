<div id="search-area">
    <div class="filter">
        <label>Thương hiệu</label>
        <select id="slBrand">    
            <option value="-1">--- Tất cả ---</option>
            <?php 
                $terms = get_terms( 'brand', array(
                    'hide_empty'=>0
                ));                                    

                foreach($terms as $term){                
                    echo '<option value="'.$term->term_id.'">'.$term->name.'</option>';
                }
            ?>
        </select>
    </div>
    
    <div class="filter">
        <label>Model</label> <input type="text" id="txtKey" value="" />
    </div>
    
    <div class="filter">
        <label>Số vùng nấu </label>
        <select id="slNumCook">    
            <option value="-1">--- Tất cả ---</option>
            
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
    </div>

    <div class="filter">        
        <label>Giá:</label> <div id="slider-range"></div>
        <input type="text" id="amount" readonly style="border:0; color:#f7930f; font-weight:bold;">        
    </div>
    <div class="filter">
        <input type="button" id="btnSearch" value="Tìm sản phẩm" />
    </div>
</div>