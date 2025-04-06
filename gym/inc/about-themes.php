<?php
//about theme info
add_action( 'admin_menu', 'skt_gym_master_abouttheme' );
function skt_gym_master_abouttheme() {    	
	add_theme_page( esc_html__('About Theme', 'skt-gym-master'), esc_html__('About Theme', 'skt-gym-master'), 'edit_theme_options', 'skt_gym_master_guide', 'skt_gym_master_mostrar_guide');   
} 
//guidline for about theme
function skt_gym_master_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
<div class="wrapper-info">
	<div class="col-left">
   		   <div class="col-left-area">
			  <?php esc_html_e('Theme Information', 'skt-gym-master'); ?>
		   </div>
          <p><?php esc_html_e('Elevate your fitness center, health club, or exercise studio with our dynamic WordPress theme. Designed for personal trainers, athletic facilities, and wellness hubs, this theme offers sleek design, intuitive customization, and responsive layouts. Engage your clients with powerful class schedules, membership options, and trainer profiles. Whether you run a sports facility, training center, or a fitness studio, this theme is perfect for building a strong online presence. Boost your brand and keep clients motivated with the ideal website for your workout space, health and wellness center, or active lifestyle community.','skt-gym-master'); ?></p>
          <a href="<?php echo esc_url(SKT_GYM_MASTER_SKTTHEMES_PRO_THEME_URL); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="<?php esc_attr_e('Free Vs Pro', 'skt-gym-master'); ?>" /></a>
	</div><!-- .col-left -->
	<div class="col-right">			
			<div class="centerbold">
				<hr />
				<a href="<?php echo esc_url(SKT_GYM_MASTER_SKTTHEMES_LIVE_DEMO); ?>" target="_blank"><?php esc_html_e('Live Demo', 'skt-gym-master'); ?></a> | 
				<a href="<?php echo esc_url(SKT_GYM_MASTER_SKTTHEMES_PRO_THEME_URL); ?>"><?php esc_html_e('Buy Pro', 'skt-gym-master'); ?></a> | 
				<a href="<?php echo esc_url(SKT_GYM_MASTER_SKTTHEMES_THEME_DOC); ?>" target="_blank"><?php esc_html_e('Documentation', 'skt-gym-master'); ?></a>
                <div class="space5"></div>
				<hr />                
                <a href="<?php echo esc_url(SKT_GYM_MASTER_SKTTHEMES_THEMES); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="<?php esc_attr_e('SKT Themes', 'skt-gym-master'); ?>" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>