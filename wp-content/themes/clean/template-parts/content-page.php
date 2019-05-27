<?php if( has_post_thumbnail($post) ){the_post_thumbnail($size, $attr); }?>
<!-- Посты -->
<!-- Выводим контент отдельно для данного типа шаблона и постов -->
	<div class="fh5co-portfolio-description">
		<h2> <?php the_title($before, $after, $echo); ?> </h2>
		<p> <?php the_content(); ?> </p>
	</div>