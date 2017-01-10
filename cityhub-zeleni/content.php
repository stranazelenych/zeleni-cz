<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
			<div class="entry-thumbnail">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail('medium'); ?></a>
			</div>
		<?php endif; ?>

		<time class="entry-date" datetime="<?php the_time('c'); ?>" title="<?php the_time(); ?>"><?php the_time(get_option('date_format')); ?></time>

		<h3 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h3>
	</header>

	<div class="entry-summary">
		<?php echo wpgrade_better_excerpt(get_the_content()); ?>
	</div>
</article>
