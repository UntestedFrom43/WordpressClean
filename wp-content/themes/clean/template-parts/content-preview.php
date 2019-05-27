<!-- В случае отсутствия миниатюры/изображения к посту/ -->
<!-- $i как решение доступа к переменной для шахматной разметки -->
<?php if( has_post_thumbnail($post) ){ $img_url = get_the_post_thumbnail_url($post, $size); }else{ $img_url = 'https://picsum.photos/1920/1080?grayscale'; } global $i; ?>
<!-- Посты -->
<!-- Реализация счетчика на каждый второй пост, dynamic classes -->
<div class="fh5co-portfolio-item <?php if( $i % 2 == 0 ) echo 'fh5co-img-right'; ?>">
	<div class="fh5co-portfolio-figure animate-box" style="background-image: url(<?php echo $img_url; ?>);"></div>
	<div class="fh5co-portfolio-description">
		<h2> <?php the_title($before, $after, $echo); ?> </h2>
		<p> <?php the_content('', $strip_teaser); ?> </p>
		<p><a href="<?php the_permalink($post);?>" class="btn btn-primary"> <?php _e('Read more', 'clean');?> </a></p>
	</div>
</div>