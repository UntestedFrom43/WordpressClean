<?php if( has_post_thumbnail($post) ){ $img_url = get_the_post_thumbnail_url($post, $size); }else{ $img_url = 'https://picsum.photos/1920/1080?grayscale'; } ?>
<!-- Посты -->
<!-- Выводим контент отдельно для данного типа шаблона и постов -->
<img src="<?php echo $img_url;?>" alt="no image here">
	<div class="fh5co-portfolio-description">
		<h2> <?php the_title($before, $after, $echo); ?> </h2>
		<p> <?php the_content(); ?> </p>
	</div>