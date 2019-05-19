<!-- Single-шаблон для статьи -->
<?php get_header(); ?>
    <!-- <h2>Test</h2> -->
    <div class="container">
        <div class="row">
            <!-- Оборачивание для сайдбара и виджетов в сингле -->
            <div class="col">
            <div class="row">
            <!-- Отдельный пост -->
            <?php while ( have_posts() ) : the_post(); ?>
            <!-- Посты -->
            <div class="col-md-12">
            <div class="card">
            <!-- Вывод миниатюры в single -->
            <?php if (has_post_thumbnail()) : ?>
            <!-- Функция вывода -->
                <?php the_post_thumbnail('full'); ?>
            <!-- Проверяем -->
                <?php else: ?>
                <!-- По умолчанию при отсутствии full-версии -->
                <img src="https://picsum.photos/id/1/1024/768" alt="demo_img">
            <?php endif; ?>
            <!-- <img src="..." class="card-img-top" alt="Место для миниатюры"> -->
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
            <!-- Конец цикла -->
            <?php endwhile; ?>
            </div>
            </div>
            <!-- Колонки sidebar -->
            <?php get_sidebar(); ?>
        </div>
    </div>
<?php get_footer();?>
