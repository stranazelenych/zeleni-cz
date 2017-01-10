<div id="post-<?php the_ID(); ?>" class="ep-news">
	<div class="txt">
		<a href="<?php the_permalink(); ?>" rel="bookmark">
			<span class="entry-date" datetime="<?php the_time('c'); ?>" title="<?php the_time(); ?>"><?php the_time(get_option('date_format')); ?></span>
			<h3 class="ep-news-title">
				<?php the_title(); ?>
			</h3>
		</a>
	</div>
</div>
