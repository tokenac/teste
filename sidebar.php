<!-- begin sidebar -->
<div class="clearfix visible-xs"></div>
<?php  //print $options['sidebar_name'].' / '.$options['sidebar_class']  ;
if( ('no sidebar' != $options['sidebar_class']) && ('' != $options['sidebar_class'] ) && ('none' != $options['sidebar_class']) ){
?>    
    <div class="col-xs-12 <?php print $options['sidebar_class'];?> widget-area-sidebar" id="primary" >

        <ul class="xoxo">
            <?php 
            generated_dynamic_sidebar( $options['sidebar_name'] ); ?>
        </ul>

    </div>   

<?php
}
?>
<!-- end sidebar -->