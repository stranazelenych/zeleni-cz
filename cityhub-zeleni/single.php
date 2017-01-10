<?php get_header();
global $wpGrade_Options;
if (have_posts()): while (have_posts()): the_post();
	$html_title = get_post_meta(get_the_ID(), WPGRADE_PREFIX.'post_html_title', true);
	if (get_post_format() == 'gallery') { ?>
		<div class="wrapper-featured-image">
			<div class="featured-image-container" style="background-color: <?php echo get_post_meta(get_the_ID(), WPGRADE_PREFIX.'header_background_color', true); ?>;">
				<div class="featured-image-container-wrapper content-bigger s-inverse">
					<?php get_template_part( 'templates/post-templates/single-head', get_post_format() ); ?>
				</div>
			</div>
		</div>
	<?php } elseif (get_post_format() == 'image') {
		$featured_id = wpgrade_get_attachment_id_from_src(wpgrade_get_post_first_image());
		$featured_image = wp_get_attachment_image_src($featured_id, 'full');
		if (empty($height) && empty($html_title)) {
			$height = 'data-width="'. $featured_image[1] .'" data-height="'. $featured_image[2] .'"';
		} ?>
		<div class="wrapper-featured-image">
			<div class="parallax-container" <?php echo $height ?>>
				<?php echo '<div class="parallax-item header-image" style="background-image: url('.$featured_image[0].');"></div>'; ?>
			</div>
		</div>
	<?php } elseif (get_post_format() == 'video') { ?>
		<div class="wrapper-featured-image">
			<div class="featured-image-container" style="background-color: <?php echo get_post_meta(get_the_ID(), WPGRADE_PREFIX.'header_background_color', true); ?>;min-height: 500px;">
				<div class="featured-image-container-wrapper content-bigger s-inverse">
					<?php get_template_part( 'templates/post-templates/single-head', get_post_format() ); ?>
				</div>
			</div>
		</div>
	<?php } elseif (in_category('zpravy')) { ?>
		<div class="wrapper-featured-image no-image"></div>
	<?php } else {

		$header_height = absint($wpGrade_Options->get('nocontent_header_height'));
		$height = '';
		// if ($header_height && empty($html_title)) {
		if ($header_height && empty($html_title)) {
			$height = 'data-height="'.$header_height.'"';
		}

		if (has_post_thumbnail()) {
			$featured_id = get_post_thumbnail_id();
			$featured_image = wp_get_attachment_image_src($featured_id, 'full');
			if (empty($height) && empty($html_title)) {
				$height = 'data-width="'. $featured_image[1] .'" data-height="'. $featured_image[2] .'"';
			} ?>
			<div class="wrapper-featured-image">
				<div class="parallax-container" <?php echo $height ?>>
					<?php echo '<div class="parallax-item header-image" style="background-image: url('.$featured_image[0].');"></div>'; ?>
				</div>
				<div class="page-header">
					<?php if (!empty($html_title) || get_post_format() != false) { ?>
						<?php get_template_part( 'templates/post-templates/single-head', get_post_format() ); ?>
					<?php } ?>
				</div>
			</div>
		<?php } elseif (!empty($html_title) || get_post_format() != false) { ?>
			<div class="wrapper-featured-image">
				<div class="featured-image-container" style="background-color: <?php echo get_post_meta(get_the_ID(), WPGRADE_PREFIX.'header_background_color', true); ?>">
					<div class="featured-image-container-wrapper content-bigger s-inverse">
						<div class="page-header-wrapper">
							<?php get_template_part( 'templates/post-templates/single-head', get_post_format() ); ?>
						</div>
					</div>
				</div>
			</div>
		<?php } else {
			echo '<div class="wrapper-featured-image no-image"></div>';
		}
	} ?>
	<div class="wrapper">
		<div class="container container-content">
			<div class="main main-content <?php //if ($wpGrade_Options->get('blog_single_template') == 'l-sidebar-left') echo 'push4' ?>" role="main">
				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix content-wrap'); ?> role="article" itemscope itemtype="http://schema.org/Article">
					<div class="pre-article-box">
            <div class="article-date">
				<span class="article-date-text"><?php echo __('Published', wpGrade_txtd); ?> </span><span class="publication-date"><?php the_date(); ?></span>
            </div>
						<nav class="article-control">
							<ul class="article-control-list">
								<?php
								next_post_link('<li class="article-control-item">%link</li>',  __('Previous post', wpGrade_txtd ), true );
								previous_post_link('<li class="article-control-item">%link</li>',  __('Next post', wpGrade_txtd ), true);
								 ?>
							</ul>
						</nav>
					</div>

					<div class="article-details">
						<h1 class="article-title"><?php echo get_the_title(); ?></h1>
					</div>
					<div class="entry-content">
						<?php the_content();
						wp_link_pages(); ?>
					</div>

					<div class="article-meta">
						<?php
							$tags = wp_get_post_tags($post->ID);
							if (count($tags)) {
						?>
							<div class="meta-list-container meta-container_tags">
							<h3 class="meta-list-title">Štítky:</h3>
								<ul class="article-categories article-meta-list">
									<?php foreach ($tags as $tag) {	?>
										<li class="article-tag-item">
											<a href="<?php echo get_tag_link($tag->term_id); ?>" class="article-tag-item-link">
												<?php echo $tag->name; ?>
											</a>
										</li>
									<?php	}	?>
								</ul>
							</div>
						<?php	}	?>
					</div>
					<div class="meta-list-container meta-container_links">
						<?php if ( $wpGrade_Options->get('blog_single_show_share_links') ): ?>
							<h3 class="meta-list-title"><?php _e("Share on:", wpGrade_txtd); ?></h3>
							<ul class="article-meta-list">
								<?php if ( $wpGrade_Options->get('blog_single_share_links_twitter') ): ?>
									<li class="article-link"><a href="https://twitter.com/intent/tweet?original_referer=<?php echo urlencode(get_permalink(get_the_ID()))?>&amp;source=tweetbutton&amp;text=<?php echo urlencode(get_the_title())?>&amp;url=<?php echo urlencode(get_permalink(get_the_ID()))?>&amp;via=<?php echo $wpGrade_Options->get( 'twitter_card_site' ) ?>" onclick="return popitup(this.href, this.title)" title="<?php _e('Share on Twitter!', wpGrade_txtd) ?>">Twitter</a></li>
								<?php endif; ?>
								<?php if ( $wpGrade_Options->get('blog_single_share_links_facebook') ): ?>
									<li class="article-link"><a href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink(get_the_ID()))?>" onclick="return popitup(this.href, this.title)" title="<?php _e('Share on Facebook!', wpGrade_txtd) ?>">Facebook</a></li>
								<?php endif; ?>
								<?php if ( $wpGrade_Options->get('blog_single_share_links_googleplus') ): ?>
									<li class="article-link"><a href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink(get_the_ID()))?>" onclick="return popitup(this.href, this.title)" title="<?php _e('Share on Google+!', wpGrade_txtd) ?>">Google+</a></li>
								<?php endif; ?>
							</ul>
						<?php endif; ?>

						<div class="article-link to-top"><a href="#top" title="<?php _e("Jump to the top of the page", wpGrade_txtd); ?>">&uarr; <?php _e("Back to top", wpGrade_txtd); ?></a></div>
					</div>
				</article>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
<?php endwhile;
else: ?>
	<div class="row">
		<div class="main main-content" role="main">
			<div class="block-inner block-inner_first">
				<article id="post-not-found" class="hentry clearfix">
					<header class="article-header">
						<h1><?php _e("Oops, Post Not Found!", wpGrade_txtd); ?></h1>
					</header>
					<section class="entry-content">
						<p><?php _e("Uh Oh. Something is missing. Try double checking things.", wpGrade_txtd); ?></p>
					</section>
					<footer class="article-footer">
						<p><?php _e("This is the error message in the single.php template.", wpGrade_txtd); ?></p>
					</footer>
				</article>
			</div>
		</div>
		<?php get_sidebar(); ?>
	</div>
<?php endif;
get_footer(); ?>
