<?php//add_action( 'wpforms_process_entry_save',array(new UpiCRMwpforms,'save_lead'),10,3);class UpiCRMwpforms {       function save_lead($forms,$fields,$form_id){        //save lead         global $SourceTypeID;        $UpiCRMLeads = new UpiCRMLeads();                $content_arr= array();        foreach($forms as $key => $form){            $content_arr[$form['id']] = $form['value'];        }        $UpiCRMLeads->add($content_arr,$SourceTypeID['wpforms'],$form_id);    }        function get_all_form() {        //get all form as array        $args = [            'post_type' => 'wpforms',            'posts_per_page' => -1,        ];        $the_query = new WP_Query($args);        $arr = [];        // The Loop        if ( $the_query->have_posts() ) {                while ($the_query->have_posts()) {                   $the_query->the_post();                   $arr[get_the_ID()] = get_the_title();                }            wp_reset_postdata();        }        return $arr;    }        function get_all_form_fields($source_id){        //get all form fields by form id        $form = wpforms()->form->get(absint($source_id));        $form_data = !empty( $form->post_content ) ? wpforms_decode( $form->post_content ) : '';        $fields = $form_data['fields'];        if ($fields) {            foreach ($fields as $key => $arr) {                //if ($fields[$key]['type'] != "button" && $fields[$key]['type'] != "html")                 $inputs[$fields[$key]['id']] = $fields[$key]['label'];            }        } else {            return [];        }                  return $inputs;    }        function form_name($source_id) {        //get form name        $form = wpforms()->form->get(absint($source_id));        return $form->post_title;    }        function is_active() {        //is plugin active        return is_plugin_active('wpforms-lite/wpforms.php');    }        /*function import_all() {        //get all ninja form leads and save it to UpiCRM leads        global $SourceTypeID;        $UpiCRMLeads = new UpiCRMLeads();                foreach ($this->get_all_form() as $key => $value) {            $args = array('form_id'   => $key);            // This will return an array of sub objects.            $subs = Ninja_Forms()->subs()->get( $args );            foreach ($subs as $obj) {                if (isset($obj->fields)) {                    $UpiCRMLeads->add($obj->fields,$SourceTypeID['ninja'],$key,false);                }            }        }        }*/}?>