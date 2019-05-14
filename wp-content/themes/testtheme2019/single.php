<!-- Single-шаблон для статьи -->
<?php get_header(); ?>
    <h2>Test</h2>
    <div class="container">
        <div class="row">
            <?php while ( have_posts() ) : the_post(); ?>
        <!-- Посты -->
        <div class="col-md-12">
            <div class="card">
            <img src="..." class="card-img-top" alt="Место для миниатюры">
            <!-- Карточки постов -->
                <div class="card-body">            
                <h2 class="card-title">
                    <?php the_title(); ?>
                </h2>
                <!-- Линки -->
                <p class="card-text"><?php the_content(''); ?></p>
                </div>
            </div>
        </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php get_footer();?>
