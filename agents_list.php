<?php
// Template Name: Agents list
// Wp Estate Pack
get_header();
$options=wpestate_page_details($post->ID);
$col_class=4;
if($options['content_class']=='col-md-12'){
    $col_class=3;
}
?>

<div class="row">
    <?php get_template_part('templates/breadcrumbs'); ?>
    <div class=" <?php print $options['content_class'];?> ">
        <?php get_template_part('templates/ajax_container'); ?>
        <?php 
        while (have_posts()) : the_post(); 
            if ( esc_html (get_post_meta($post->ID, 'page_show_title', true) ) != 'no') { ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php } ?>
            <div class="single-content"><?php the_content();?></div>
            <?php
        endwhile; 
        ?>                 
        
        <div id="listing_ajax_container_agent"> 
        <?php
        $args = array(
                'post_type'         => 'estate_agent',
                'paged'             => $paged,
                'posts_per_page'    => 10 );

        $agent_selection = new WP_Query($args);
        while ($agent_selection->have_posts()): $agent_selection->the_post();
        print '<div class="col-md-'.$col_class.' listing_wrapper">';
            get_template_part('templates/agent_unit'); 
            print '</div>';
        endwhile; 
        
        kriesi_pagination($agent_selection->max_num_pages, $range = 2); ?>         
        </div>
    </div><!-- end 9col container-->
    
<?php  include(locate_template('sidebar.php')); ?>
</div>   
<?php get_footer(); ?>