<?php
 
/**
 * Handles primary sidebar structure.
 * handles the html5 sidebar tags
*/
  
?><aside id="sidebar" class="sidebar sidebar-primary widget-area" itemtype="http://schema.org/WPSideBar" itemscope="" role="complementary">
<?php
    genesis_structural_wrap( 'sidebar' );
    do_action( 'genesis_before_sidebar_widget_area' );
    do_action( 'genesis_sidebar' );
    do_action( 'genesis_after_sidebar_widget_area' );
    genesis_structural_wrap( 'sidebar', 'close' );
?>
    </aside>