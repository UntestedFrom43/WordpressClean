    <!-- Стартовый шаблон -->
    <?php get_header(); ?>
    <h2>Test</h2>
    <div class="container">
        <div class="row">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <!-- Посты -->
        <div class="col-md-12">
            <div class="card">
            <img src="..." class="card-img-top" alt="Место для миниатюры">
            <!-- Карточки постов -->
                <div class="card-body">            
                <h5 class="card-title">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h5>
                <!-- Линки -->
                <p class="card-text"><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>" class="btn btn-primary">Перейти в статью</a>
                </div>
            </div>
        </div>
            <?php endwhile; ?>
            <!-- Навигация-->
            <?php else: ?>
            <!-- Постов нет -->
            <p>No post in there...</p>
            <?php endif; ?>    
        </div>
    </div>
    <?php get_footer();?>