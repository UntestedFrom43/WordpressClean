<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package clean
 */

get_header();
?>

<!-- Контент сайдбара -->
		<div id="fh5co-content">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="row">
							<div class="col-md-3 col-md-push-9 animate-box">
								<!-- Сам сайдбар -->
								<?php get_sidebar();?>
							</div>
							<div class="col-md-9 col-md-pull-3">
								<!-- Цикл -->
								<?php while( have_posts() ): the_post() ;?>
								<!-- Страничная часть, вывод динамически -->
									<?php get_template_part('template-parts/content', 'page');?>
								<?php endwhile; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

<?php
//get_sidebar();
get_footer();
