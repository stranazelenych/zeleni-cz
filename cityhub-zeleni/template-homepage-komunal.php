<?php
/*
Template Name: Home Page - záloha
*/
get_header();
global $wpGrade_Options;
if ( $wpGrade_Options->get('homepage_use_slider') ) {

	$hps_query = new WP_Query(array(
		'post_type' => 'homepage_slide',
		'posts_per_page' => '-1',
		'orderby' => 'menu_order',
		'order' => 'ASC'
	));

	$slider_params = '';
	$slider_speed = $wpGrade_Options->get('homepage_slider_speed');
	if ( $slider_speed ) {
		$slider_params .= ' data-slideshow_speed="'. $slider_speed .'"';
	}

	if ( $wpGrade_Options->get('homepage_slider_animation_speed') ) {
		$slider_params .= ' data-animation_speed="'. $wpGrade_Options->get('homepage_slider_animation_speed') .'"';
	}

	if ( $wpGrade_Options->get('homepage_slider_fullscreen') ) {
		$slider_params .= ' data-fullscreen="'. $wpGrade_Options->get('homepage_slider_fullscreen') .'"';
	}

	if ( $wpGrade_Options->get('homepage_slider_height') ) {
		$slider_params .= ' data-height="'. $wpGrade_Options->get('homepage_slider_height') .'"';
	}

	if ( $wpGrade_Options->get('homepage_slider_directionnav') ) {
		$slider_params .= ' data-direction_nav="true"';
	} else{
		$slider_params .= ' data-direction_nav="false"';
	}

	if ( $wpGrade_Options->get('homepage_slider_directionnav_thumb') ) {
		$slider_params .= ' data-control_nav_thumb="false"';
	} else{
		$slider_params .= ' data-control_nav_thumb="true"';
	}

	$slider_control_nav_items = '';
	$slide_number = 0;
	if ($hps_query->have_posts()): ?>
		<div class="flexslider homepage-slider loading" <?php if (!empty($slider_params)) { echo $slider_params; } ?>>
			<div class="preloader"></div>
			<ul class="slides homepage-slider_slides">
				<?php while ($hps_query->have_posts()) : $hps_query->the_post(); ?>
					<li class="slide homepage-slider_slide s-hidden">

						<?php
						$image = get_post_meta(get_the_ID(), WPGRADE_PREFIX.'homepage_slide_image', true);
						$video_poster = get_post_meta(get_the_ID(), WPGRADE_PREFIX.'video_poster', true);

						if ( !empty($image) ) {
							$image = json_decode($image);
							$image_id = $image->id;
							$image_thumbnail = wp_get_attachment_image_src($image->id, 'homepage-portfolio');
							$slide_thumbnail = $image_thumbnail[0];
							$slide_background = $slide_thumbnail;
							if ( !empty($video_poster) ) {

								$slide_thumbnail = $video_poster;
							}
							echo '<div class="parallax-container"><div class="homepage-slider_slide-image header-image parallax-item" style="background-image: url('.$image->link.');" data-thumb="url('.$slide_thumbnail.')"></div></div>';
						} ?>

						<div class="homepage-slider_slide-wrap bigger-content">
							<?php $slider_control_nav_items[$slide_number] = get_the_title();
							$slide_number++;
							$slide_has_video = false;
							$the_video = '';

							$videos = wpgrade_post_videos_ids(get_the_ID());

							isset( $videos['youtube'] ) ?  $youtube_id = $videos['youtube'] : $youtube_id = '';
							isset( $videos['vimeo'] ) ? $vimeo_id = $videos['vimeo'] : $vimeo_id = '';

							$video_width = $video_height = '';
							$video_width = get_post_meta(get_the_ID(), WPGRADE_PREFIX.'video_width', true);
							if ( !empty($video_width)) {
								$video_width = 'width="'.$video_width.'"';
							}
							$video_height = get_post_meta(get_the_ID(), WPGRADE_PREFIX.'video_height', true);
							if ( !empty($video_height)) {
								$video_height = 'height="'.$video_height.'"';
							}

							if ( !empty($youtube_id) ) {
								$the_video = '<div class="youtube_frame" id="ytplayer_'.get_the_ID().'" data-ytid="'.$youtube_id.'" '.$video_width.' '.$video_height.'></div>';
								$slide_has_video = true;
							} elseif ( !empty($vimeo_id) ) {
								$the_video = '<iframe class="vimeo_frame" id="video_'.get_the_ID().'" '.$video_width.' '.$video_height.' src="http://player.vimeo.com/video/'.$vimeo_id.'?api=1&player_id=video_'.get_the_ID().'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
								$slide_has_video = true;
							} elseif( !empty( $video_embed ) ) {
								$slide_has_video = true;
								$the_video = '<div class="video-wrap">' . stripslashes(htmlspecialchars_decode($video_embed)) . '</div>';
							} else {
								$video_m4v = get_post_meta(get_the_ID(), WPGRADE_PREFIX.'video_m4v', true);
								$video_webm = get_post_meta(get_the_ID(), WPGRADE_PREFIX.'video_webm', true);
								$video_ogv = get_post_meta(get_the_ID(), WPGRADE_PREFIX.'video_ogv', true);

								if ( !empty($video_m4v) || !empty($video_webm) || !empty($video_ogv) || !empty($video_poster) ) {
									$slide_has_video = true;
									ob_start();
									wpGrade_video_selfhosted(get_the_ID());
									$the_video = ob_get_clean();
								}
							} ?>
							<div class="homepage-slider_slide-content <?php if ( $slide_has_video ) echo 's-video'?>">
								<div class="slide-content-wrapper wrapper">
									<div class="container">
										<?php
										if ( $slide_has_video ) {
											echo '<div class="page-header-video-wrap">'.$the_video.'</div>';
											echo '<div class="page-header-videohtml-wrap">';
										}
										$caption = get_post_meta(get_the_ID(), WPGRADE_PREFIX.'homepage_slide_caption', true);

										if (!empty($caption))
											wpgrade_display_content($caption);

										$label = get_post_meta(get_the_ID(), WPGRADE_PREFIX.'homepage_slide_label', true);
										$link = get_post_meta(get_the_ID(), WPGRADE_PREFIX.'homepage_slide_link', true);
										if (!empty($label) && !empty($link)) {
											echo '<div><a href="'.$link.'" class="btn btn-slider">'.$label.'</a></div>';
										}
										if ( $slide_has_video ) {
											echo '</div>';
										}
										?>
									</div>
								</div>
							</div>
						</div>
					</li>
				<?php endwhile; ?>
			</ul>
			<?php if ( $wpGrade_Options->get('homepage_slider_directionnav') && $slide_number > 1 ) : ?>
				<ul class="flex-direction-nav">
					<li class="prev">
						<a class="flex-prev" href="#">
							<div class="slide-arrow-container">
								<div class="slide-arrow-bg"></div>
							</div>
						</a>
					</li>
					<li class="next">
						<a class="flex-next" href="#">
							<div class="slide-arrow-container">
								<div class="slide-arrow-bg"></div>
							</div>
						</a>
					</li>
				</ul>
			<?php endif; ?>
		</div>

	<?php endif; wp_reset_query();
}

/* Latest posts. */
$args = array(
	'cat' => 1,
	'post_type' => 'post',
	'post_status' => 'publish',
	'posts_per_page' => 6
);
$latest_query = new WP_Query( $args );

if ( $latest_query->have_posts() ) { ?>
	<div class="wrapper wrapper-body fp-news">
		<div class="container container-body">
			<div class="row">
				<?php while ( $latest_query->have_posts() ) { $latest_query->the_post(); ?>
					<div class="span4">
						<?php get_template_part( 'content', get_post_format() ); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="wrapper wrapper-body">
		<div class="container container-body">
			<div class="row">
				<div class="span4">
					<a href="http://dary.zeleni.cz" class="btn btn-large btn-promo btn-violet">Podpořte nás</a>
				</div>
				<div class="span4">
					<a href="http://www.zeleni.cz/pridejte-se/" class="btn btn-large btn-promo btn-orange">Přidejte se</a>
				</div>
				<div class="span4">
					<form method="post" class="newsletter_subscribe" onsubmit="return frmSub()" name="newsletter_form" id="newsletter_form">
						<input type="email" id="mail" name="email" class="email" value="" placeholder="Váš e-mail"  onsubmit="return frmSub()" >
						<input type="submit" name="submit" class="submit" onsubmit="return frmSub()" value="Newsletter">
					</form>
					<?php /* <small class="muted">Přihlaste se k odběru zelených novinek</small> */ ?>
					<script type="text/javascript">
						function frmSub() {
							jQuery.post( "https://i.zeleni.cz/api/register/newsletter/77", {
								mail: jQuery( "#mail" ).val()
							});
							jQuery( "#newsletter_form" ).html( "Děkujeme, jste zaregistrováni k odběru newsletteru." );

							return false;
						}
					</script>
				</div>
			</div>
		</div>
	</div>
<?php } wp_reset_postdata();
// End of latest posts.

if ( $wpGrade_Options->get( 'use_site_wide_box' ) ) {?>
<?php } // end of use_site_wide_box ?>

<?php if ( $wpGrade_Options->get('homepage_use_portfolio') ) { ?>
	<div class="wrapper wrapper-main">
		<div class="container">
			<div class="featuredworks-header">
				<div class="main main-featuredworks">
					<div class="portfolio-container">
						<h2 class="featuredworks-title"><?php echo $wpGrade_Options->get('homepage_portfolio_title'); ?></h2>
						<ul class="flex-direction-nav">
							<li>
								<a id="portfolio-works-previous" class="flex-prev" href="#"></a>
							</li>
							<li>
								<a id="portfolio-works-next" class="flex-next" href="#"></a>
							</li>
						</ul>
						<ul id="homepage-portfolio-items-list" class="portfolio-items-list">

							<?php
							$args = array(
								'post_type' => 'portfolio',
								'posts_per_page' => 5
							);
							$query = new WP_Query( $args );

							if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

								<li class="portfolio-item <?php if(!has_post_thumbnail()) echo 'project-no-image '; ?>">
									<a class="portfolio-item-link" href="<?php the_permalink(); ?>">
										<div class="portfolio-item-featured-image">
											<?php if(has_post_thumbnail()) the_post_thumbnail('homepage-portfolio'); ?>
										</div>
										<div class="portfolio-item-info">
											<div class="portfolio-item-table">
												<div class="portfolio-item-cell">
													<h3 class="portfolio-item-title"><?php echo get_the_title(); ?></h3>
													<?php $categories = get_the_terms($post->ID, 'portfolio_cat');
													if($categories) : ?>
													<hr class="separator light">
													<ul class="portfolio-item-categories-list">
														<?php foreach($categories as $cat){ ?>
															<li class="portfolio-item-category">
																<span class="portfolio-item-category-link"><?php echo $cat->name; ?></span>
															</li>
														<?php } ?>
													</ul>
													<?php endif; ?>
												</div>
											</div>
										</div>
									</a>
								</li>

							<?php endwhile; endif;
							/* Restore original Post Data */
							wp_reset_postdata();
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php }

$homepage_content1 = $wpGrade_Options->get('homepage_content1');

if ( !empty( $homepage_content1 ) ) { ?>

	<div class="wrapper wrapper-body">
		<div class="container container-body">
			<?php wpgrade_display_content( $homepage_content1 ); ?>
		</div>
	</div>

<?php }

$homepage_content2 = $wpGrade_Options->get('homepage_content2');

if ( $homepage_content2 ) { ?>

	<div class="wrapper wrapper-body">
		<div class="container container-body">
			<?php wpgrade_display_content($homepage_content2); ?>
		</div>
	</div>

<?php } ?>

<?php get_footer(); ?>
