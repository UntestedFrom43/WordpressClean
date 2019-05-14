<?php get_header(); ?>
    <h2>Test</h2>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <!-- Посты -->
        <h4><?php the_title(); ?></h4>
        <?php endwhile; ?>
        <!-- Навигация-->
        <?php else: ?>
        <!-- Постов нет -->
        <p>No post in there...</p>
    <?php endif; ?>

<?php get_footer();?>
