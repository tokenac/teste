<?php
// Template Name: User Dashboard
// Wp Estate Pack
if ( !is_user_logged_in() ) {   
     wp_redirect(  home_url() );
} 



global $current_user;
get_currentuserinfo();
$userID                         =   $current_user->ID;
$user_login                     =   $current_user->user_login;
$user_pack                      =   get_the_author_meta( 'package_id' , $userID );
$user_registered                =   get_the_author_meta( 'user_registered' , $userID );
$user_package_activation        =   get_the_author_meta( 'package_activation' , $userID );   
$paid_submission_status         =   esc_html ( get_option('wp_estate_paid_submission','') );
$price_submission               =   floatval( get_option('wp_estate_price_submission','') );
$submission_curency_status      =   esc_html( get_option('wp_estate_submission_curency','') );
$edit_link                      =   get_dasboard_add_listing();
$processor_link                 =   get_procesor_link();


if( isset( $_GET['delete_id'] ) ) {
    if( !is_numeric($_GET['delete_id'] ) ){
          exit('you don\'t have the right to delete this');
    }else{
        $delete_id=$_GET['delete_id'];
        $the_post= get_post( $delete_id); 

        if( $current_user->ID != $the_post->post_author ) {
            exit('you don\'t have the right to delete this');;
        }else{
         
           
            // delete attchaments
            $arguments = array(
                'numberposts' => -1,
                'post_type' => 'attachment',
                'post_parent' => $delete_id,
                'post_status' => null,
                'exclude' => get_post_thumbnail_id(),
                'orderby' => 'menu_order',
                'order' => 'ASC'
            );
            $post_attachments = get_posts($arguments);
            
            foreach ($post_attachments as $attachment) {
               wp_delete_post($attachment->ID);                      
             }
           
            wp_delete_post( $delete_id ); 
         
        }  
        
    }
    
    
}  
  


get_header();
$options=wpestate_page_details($post->ID);
?> 
  


<div class="row">
    <?php get_template_part('templates/breadcrumbs'); ?>
    
    <div class="col-md-3">
       <?php  get_template_part('templates/user_menu');  ?>
    </div>  
    
    <div class="col-md-9 dashboard-margin">
        
        <?php get_template_part('templates/ajax_container'); ?>
        
         <?php if (esc_html( get_post_meta($post->ID, 'page_show_title', true) ) != 'no') { ?>
                <h1 class="entry-title"><?php the_title(); ?></h1>
          <?php } ?>
          <?php
          $args = array(
                     'post_type'        =>  'estate_property',
                     'author'           =>  $current_user->ID,
                     'posts_per_page'   =>  -1 ,
                     'post_status'      =>  array( 'any' )
                 );


          $prop_selection = new WP_Query($args);
          if( !$prop_selection->have_posts() ){
                print '<h4>'.__('You don\'t have any properties yet!','wpestate').'</h4>';
          }

          while ($prop_selection->have_posts()): $prop_selection->the_post();          
                 get_template_part('templates/dashboard_listing_unit'); 
          endwhile;           
          ?>    
    </div>
    
   
  
</div>  



<?php get_footer(); ?>