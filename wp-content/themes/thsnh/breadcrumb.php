<div id="breadcrumb">
<?php
    echo '<ol itemscope itemtype="http://schema.org/BreadcrumbList">';
        /*
        echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
			echo '<a href="'. get_site_url().'" itemscope itemtype="http://schema.org/Thing" itemprop="item">';
				echo '<span itemprop="name">'; 
					echo 'Trang Chủ';
				echo '</span>';
			echo '</a> › ';  
			echo '<meta itemprop="position" content="1" />';
		echo '</li>';*/ 
		$count=1;
        $queried_object = get_queried_object();
        if(is_page()){
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
			echo '<a href="'.  get_permalink($queried_object->ID).'" itemscope itemtype="http://schema.org/Thing" itemprop="item">';
						echo '<span itemprop="name">'; 
							echo $queried_object->post_title;
						echo '</span>';
					echo '</a>';      
					echo '<meta itemprop="position" content="'.$count++.'" />';
		    echo '</li>';
        }
        if(is_single()){
            if ($queried_object->post_type == 'article'){
				echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
					echo '<a href="'.  get_permalink(PID_ARTICLES).'" itemscope itemtype="http://schema.org/Thing" itemprop="item">';
						echo '<span itemprop="name">'; 
							echo 'Bài Viết';
						echo '</span>';
					echo '</a> › ';      
					echo '<meta itemprop="position" content="'.$count++.'" />';
					echo '</li>';
            }
			else if($queried_object->post_type == 'service'){
				echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
                echo '<a href="'.  get_permalink(PID_SERVICES).'"  itemscope itemtype="http://schema.org/Thing" itemprop="item">';
                    echo '<span itemprop="name">'; 
                        echo 'Dịch Vụ';
                    echo '</span>';
                echo '</a> › ';      
				echo '<meta itemprop="position" content="'.$count++.'" />';
				echo '</li>';
            }
            // last level
            echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
			echo '<a href="'.  get_permalink($queried_object->ID).'" itemscope itemtype="http://schema.org/Thing" itemprop="item">';
						echo '<span itemprop="name">'; 
							echo $queried_object->post_title;
						echo '</span>';
					echo '</a>';      
					echo '<meta itemprop="position" content="'.$count++.'" />';
		    echo '</li>';
        }
        if(is_tax()){            
            if($queried_object->taxonomy=='article-category'){
				echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
                echo '<a href="'.  get_permalink(PID_ARTICLES).'" itemscope itemtype="http://schema.org/Thing" itemprop="item">';
                    echo '<span itemprop="name">'; 
                        echo 'Kiến Thức';
                    echo '</span>';
                echo '</a> › ';    
				echo '<meta itemprop="position" content="'.$count++.'" />';
				echo '</li>';
            }else if($queried_object->taxonomy=='service-category'){
				echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
                echo '<a href="'.  get_permalink(PID_SERVICES).'" itemscope itemtype="http://schema.org/Thing" itemprop="item">';
                    echo '<span itemprop="name">'; 
                        echo 'Dịch Vụ';
                    echo '</span>';
                echo '</a> › ';    
				echo '<meta itemprop="position" content="'.$count++.'" />';
				echo '</li>';
            }
			// last level
            echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
			echo '<a href="'.  get_permalink($queried_object->ID).'" itemscope itemtype="http://schema.org/Thing" itemprop="item">';
						echo '<span itemprop="name">'; 
							echo $queried_object->post_title;
						echo '</span>';
					echo '</a>';      
					echo '<meta itemprop="position" content="'.$count++.'" />';
		    echo '</li>';
        }       
    echo '</ol>';
?>
</div>