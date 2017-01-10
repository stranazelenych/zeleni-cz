<?php 
/*
Template Name: Blog Archive
*/

get_header();

global $wpGrade_Options;
$html_title = '';

if (is_category()) {
	$html_title = '<h1 class="archive-title">' . single_cat_title( '', false ) . '</h1>';

	if ( category_description() ) : // Show an optional category description
		$html_title .= '<div class="archive-meta">'.category_description().'</div>';
	endif;
} elseif (is_tag()) {
	$html_title = '<h1 class="archive-title">'.sprintf( __( 'Tag Archives: %s', wpGrade_txtd ), '<span>' . single_tag_title( '', false ) . '</span>' ).'</h1>';
	if ( tag_description() ) : // Show an optional tag description 
		$html_title .= '<div class="archive-meta">'.tag_description().'</div>';
	endif;
} else {
	if ($wpGrade_Options->get('blog_archive_title')) {
		$html_title = '<h1 class="archive-title">'.$wpGrade_Options->get('blog_archive_title').'</h1>';
	}
}

$header_height = absint($wpGrade_Options->get('nocontent_header_height'));
$height = '';
// if ($header_height && empty($html_title)) {
if ($header_height) {
  $height = 'data-height="'.$header_height.'"';
}

if ($wpGrade_Options->get('blog_header_image')) {
	$featured_id = wpgrade_get_attachment_id_from_src( $wpGrade_Options->get('blog_header_image' ) );
	$featured_image = wp_get_attachment_image_src($featured_id, 'full');
?>
	<div class="wrapper-featured-image">
    <div class="parallax-container" <?php echo $height ?>>
      <?php echo '<div class="parallax-item header-image" style="background-image: url('.$featured_image[0].');"></div>'; ?>
    </div>
		<div class="page-header s-inverse">
	      <div class="page-header-wrapper">
	        <div class="container">
				<?php if (!empty($html_title)) {
				    wpgrade_display_content($html_title);
				} ?>
	        </div>
	      </div>
		</div>
	</div>
<?php } elseif (!empty($html_title)) { //we still need to display the title and description ?>
	<div class="wrapper-featured-image">
			<div class="featured-image-container-wrapper s-inverse">
				<div class="page-header">
          <div class="container">
					 <?php wpgrade_display_content($html_title ); ?>
          </div>
				</div>
			</div>
	</div>
<?php } else {
	echo '<div class="wrapper-featured-image no-image"></div>';
} ?>
<div class="wrapper">
  <div class="container container-content">
      <div class="main main-content main-content-archive" role="main">
          <div class="content-wrap">
              <?php wpgrade_pagination(); ?>
          </div>      
          <?php if (have_posts()): while (have_posts()): the_post(); ?>
    
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php if (get_post_format() != 'quote'): ?>
        <div class="content-wrap content-wrap-header">
          <header class="entry-header">
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', wpGrade_txtd ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
          </header>
          <div class="post-footer">
            <footer class="post-footer_meta">
              <div class="post-footer_meta-group">
                <h5 class="post-footer_meta-name"><?php _e('Published', wpGrade_txtd); ?></h5>
                <div class="post-footer_meta-value">
                  <?php wpgrade_posted_on(); ?>
                </div>
              </div>
            </footer>
          </div>
        </div>
        <?php endif; ?>
            <?php get_template_part( 'templates/post-templates/blog-head', get_post_format() ); ?>
            <?php if (get_post_format() != 'quote'): ?>
                <div class="content-wrap">
                    <div class="entry-content">
                        <?php echo wpgrade_better_excerpt(get_the_content()); ?>
                    </div><!-- .entry-content -->
                </div>
            <?php endif; ?>
        </article><!-- #post-<?php the_ID(); ?> -->
    
    <?php endwhile;
      wp_reset_postdata(); ?>
        <div class="content-wrap">
            <?php wpgrade_pagination(); ?>
        </div>
    <?php else:
      get_template_part( 'no-results', 'index' ); 
    endif; ?>
      </div>
    <?php get_sidebar(); ?>
  </div>
</div>

<?php get_footer(); ?>
