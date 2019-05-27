<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package clean
 */

	get_header();
?>

<!-- <span>FRONT</span> -->

<?php if( /*is_front_page()*/ /*&&*/ get_theme_mod('clean_home_category', $default) ): ?>
	<!-- //Отработка секции// -->
	<div id="fh5co-portfolio">
		<!-- Передаем рубрику -->
		<?php $query = new WP_Query(array(
			'category_name' => get_theme_mod('clean_home_category', $default),
			//Чтобы выводилось больше записей в обход условия админки
			'posts_per_page' => 4,
		));?>
		<!-- Запуск цикла постов -->
		<?php if ( $query->have_posts() ) : $i = 1; while ( $query->have_posts() ) : $query->the_post(); ?>
				<!-- Подключаем модуль -->
				<!-- test -->
				<?php get_template_part('template-parts/content', 'preview');?>
			<?php $i++; endwhile; ?>
			<!-- Условие -->
			<?php else: ?>
            <?php _e('Nothing to read :(', 'clean');?>
			<!-- Завершение -->
			<?php endif; ?>
			<!-- Обязательно сбросить данные постов, чтобы не было лишнего кеширования -->
			<?php wp_reset_postdata(); ?>
	</div>
	<!-- Сброс float -->
	<div class="clearfix"></div>
<?php endif; ?>

<!-- Вывод контента страницы -->
    <!-- цикл контента -->
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <!-- контент, вывод -->
        <?php the_content($more_link_text, $strip_teaser); ?>
    <?php endwhile; ?>
    <!-- Навигация -->
    <?php else: ?>
    <!-- Посты не найдены -->
    <?php endif; ?>

<?php
//get_sidebar();
get_footer();
