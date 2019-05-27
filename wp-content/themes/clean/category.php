<!-- tested -->
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
		
		<!-- Запуск цикла постов -->
		<?php if ( have_posts() ) : $i = 1; while ( have_posts() ) : the_post(); ?>
			<!-- Подключаем модуль -->
				<?php get_template_part('template-parts/content', 'preview');?>
			<?php $i++; endwhile; ?>
            <!-- Пагинация -->
            <?php the_posts_pagination(array(
                // Параметры
                'end_size' => 1,
                'mid_size' => 1,
                'type' => 'list',
            )); ?>
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

<?php
//get_sidebar();
get_footer();
