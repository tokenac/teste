<div class="header_media">
<?php 
$show_adv_search_status     =   get_option('wp_estate_show_adv_search','');
$header_type                =   get_post_meta ( $post->ID, 'header_type', true);
$global_header_type         =   get_option('wp_estate_header_type','');


if(!is_404()){
    $custom_image               =   esc_html( esc_html(get_post_meta($post->ID, 'page_custom_image', true)) );  
    $rev_slider                 =   esc_html( esc_html(get_post_meta($post->ID, 'rev_slider', true)) ); 
    
    if (!$header_type==0){  // is not global settings
        
          switch ($header_type) {
            case 1://none
                break;
            case 2://image
                print '<img src="'.$custom_image.'"  class="img-responsive" alt="header_image"/>';
                break;
            case 3://theme slider
                wpestate_present_theme_slider();
                break;
            case 4://revolutin slider
                putRevSlider($rev_slider);
                break;
            case 5://google maps
                get_template_part('templates/google_maps_base'); 
                break;
          }
          
         
            
    }else{    // we don't have particular settings - applt global header
          
          switch ($global_header_type) {
            case 0://image
                break;
            case 1://image
                $global_header  =   get_option('wp_estate_global_header','');
                print '<img src="'.$global_header.'"  class="img-responsive" alt="header_image"/>';
                break;
            case 2://theme slider
                wpestate_present_theme_slider();
                break;
            case 3://revolutin slider
                 $global_revolution_slider   =  get_option('wp_estate_global_revolution_slider','');
                 putRevSlider($global_revolution_slider);
                break;
            case 4://google maps
                get_template_part('templates/google_maps_base'); 
                break;
          }
          
           
    
    } // end if header
    

    
}// end if 404                       
?>
    
<?php
$show_adv_search_general    =   get_option('wp_estate_show_adv_search_general','');
$header_type                =   get_post_meta ( $post->ID, 'header_type', true);
$global_header_type         =   get_option('wp_estate_header_type','');
$show_adv_search_slider     =   get_option('wp_estate_show_adv_search_slider','');
$show_mobile                =   0;  

if($show_adv_search_general ==  'yes' && !is_404() ){
    if($header_type == 1){
      //nothing  
    }else if($header_type == 0){ 
        if($global_header_type==4){
            $show_mobile=1;
            get_template_part('templates/advanced_search');  
        }else if( $global_header_type==0){
           //nonthing 
        }else{
            if($show_adv_search_slider=='yes'){
                $show_mobile=1;
                get_template_part('templates/advanced_search');  
            }
        }

    }else if($header_type == 5){
            $show_mobile=1;
            get_template_part('templates/advanced_search');  
    }else{
         if($show_adv_search_slider=='yes'){
            $show_mobile=1;
            get_template_part('templates/advanced_search');  
        }
    }       
}
?>   
</div>

<?php 

if( $show_mobile == 1 ){
    get_template_part('templates/adv_search_mobile');
}
?>