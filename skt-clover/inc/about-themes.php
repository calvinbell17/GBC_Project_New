<?php
//about theme info
add_action( 'admin_menu', 'skt_clover_abouttheme' );
function skt_clover_abouttheme() {    	
	add_theme_page( esc_html__('About Theme', 'skt-clover'), esc_html__('About Theme', 'skt-clover'), 'edit_theme_options', 'skt_clover_guide', 'skt_clover_mostrar_guide');   
} 
//guidline for about theme
function skt_clover_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
<div class="wrapper-info">
	<div class="col-left">
   		   <div class="col-left-area">
			  <?php esc_html_e('Theme Information', 'skt-clover'); ?>
		   </div>
          <p><?php esc_html_e('SKT Clover is a florist WordPress theme. It is meant for floral shop and boutique or bloom shop. It is ideal for floral designers, flower arrangers, and botanical stylists. It is WooCommerce and Elementor compatible. Whether you are a flower merchant, flower seller, or flower vendor you can use this flexible and scalable template to showcase your products like flowering plants, florets, blossom, buds and posies.','skt-clover'); ?></p>
          <a href="<?php echo esc_url(SKT_CLOVER_SKTTHEMES_PRO_THEME_URL); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="<?php esc_attr_e('Free Vs Pro', 'skt-clover'); ?>" /></a>
	</div><!-- .col-left -->
	<div class="col-right">			
			<div class="centerbold">
				<hr />
				<a href="<?php echo esc_url(SKT_CLOVER_SKTTHEMES_LIVE_DEMO); ?>" target="_blank"><?php esc_html_e('Live Demo', 'skt-clover'); ?></a> | 
				<a href="<?php echo esc_url(SKT_CLOVER_SKTTHEMES_PRO_THEME_URL); ?>"><?php esc_html_e('Buy Pro', 'skt-clover'); ?></a> | 
				<a href="<?php echo esc_url(SKT_CLOVER_SKTTHEMES_THEME_DOC); ?>" target="_blank"><?php esc_html_e('Documentation', 'skt-clover'); ?></a>
                <div class="space5"></div>
				<hr />                
                <a href="<?php echo esc_url(SKT_CLOVER_SKTTHEMES_THEMES); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="<?php esc_attr_e('SKT Themes', 'skt-clover'); ?>" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>