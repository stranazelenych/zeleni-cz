<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<time class="entry-date" datetime="<?php the_time('c'); ?>" title="<?php the_time(); ?>"><?php the_time(get_option('date_format')); ?></time>

	<h3>
		<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
	</h3>
</article>
