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

<!-- Rework index-части -->
	<div id="fh5co-portfolio">
		<!-- Запуск цикла постов -->
		<?php if ( have_posts() ) : $i = 1; while ( have_posts() ) : the_post(); ?>
			<!-- В случае отсутствия миниатюры/изображения к посту/ -->
			<?php if( has_post_thumbnail($post) ){ $img_url = get_the_post_thumbnail_url($post, $size); }else{ $img_url = 'https://picsum.photos/1280/864?grayscale'; }?>
			<!-- Посты -->
			<!-- Реализация счетчика на каждый второй пост, меняем класс динамически -->
			<div class="fh5co-portfolio-item <?php if( $i % 2 == 0 ) echo 'fh5co-img-right'; ?>">
				<div class="fh5co-portfolio-figure animate-box" style="background-image: url(<?php echo $img_url; ?>);"></div>
				<div class="fh5co-portfolio-description">
					<!-- Передадим заголовок -->
					<h2> <?php the_title($before, $after, $echo); ?> </h2>
					<!-- Содержимое в виде параграфа -->
					<p> <?php the_content('', $strip_teaser); ?> </p>
					<!-- И ссылочку -->
					<p><a href="<?php the_permalink($post);?>" class="btn btn-primary"> <?php _e('Read more', 'clean');?> </a></p>
				</div>
			</div>
			<?php $i++; endwhile; ?>
			<!-- Условие -->
			<?php else: ?>
            <?php _e('Nothing to read :(', 'clean');?>
			<!-- Завершение -->
			<?php endif; ?>
	</div>

<?php
//get_sidebar();
get_footer();
