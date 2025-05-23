<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package SKT Gym Master
 */
get_header(); ?>
<div class="container">
	<div id="content_navigator">
     <div class="page_content">
        <section class="site-main">
			<?php if ( have_posts() ) : ?>
				<div class="blog-post">
                	<div class="blogpost-wrap-wsb">
					<?php /* Start the Loop */ 
						while ( have_posts() ) : the_post(); 
						get_template_part( 'content', get_post_format() ); 
						endwhile;
					?>
                    </div>
                </div>
                <?php  
				// Previous/next post navigation.
				the_posts_pagination( array(
							'mid_size' => 2,
							'prev_text' => esc_html__( 'Back', 'skt-gym-master' ),
							'next_text' => esc_html__( 'Next', 'skt-gym-master' ),
							'screen_reader_text' => esc_html__( 'Posts navigation', 'skt-gym-master' )
				) );
			    else : 
				get_template_part( 'no-results'); 
				endif; ?>
        </section>
       <?php get_sidebar();?>       
        <div class="clear"></div>
    </div><!-- site-aligner -->
    </div>
</div><!-- container -->
<?php get_footer(); ?>