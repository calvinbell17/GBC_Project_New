<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package SKT Clover
 */
?>
<div id="sidebar">    
    <?php if ( ! dynamic_sidebar( 'fc-dcr-sidebar' ) ) : ?>
        <aside id="categories" class="widget"> 
        	<div class="wp-block-group">	
	        <h2 class="wp-block-heading"><?php esc_html_e( 'Categories', 'skt-clover' ); ?></h2>
            <ul>
                <?php wp_list_categories('title_li=');  ?>
            </ul>
            </div>
        </aside>
         <aside id="meta" class="widget">    
         	<div class="wp-block-group">
         	<h2 class="wp-block-heading"><?php esc_html_e( 'Meta', 'skt-clover' ); ?></h2>
            <ul>
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <?php wp_meta(); ?>
            </ul>
            </div>
        </aside>
    <?php endif; // end sidebar widget area ?>	
</div><!-- sidebar -->