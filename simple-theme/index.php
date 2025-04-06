<?php get_header(); ?>

<div class="container">
    <h1>Welcome to My Simple Theme!</h1>
    <p>This is a simple WordPress theme.</p>

    <!-- Start WordPress Loop -->
    <?php if(have_posts()) : ?>
        <?php while(have_posts()) : the_post(); ?>
            <div class="post">
                <h2><?php the_title(); ?></h2>
                <p><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>">Read More</a>
            </div>
        <?php endwhile; ?>
    <?php else : ?>
        <p>No posts found.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
