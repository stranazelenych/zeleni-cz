<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package wpGrade
 * @since wpGrade 1.0
 */
?>

<?php get_header(); ?>
<div class="wrapper-featured-image no-image"></div>
<div class="row wrapper wrapper-main">
	<div class="container">
		<div class="main main-page" role="main">
			<h1 class="heading-404"><?php _e('404', wpGrade_txtd); ?></h1>
			<article id="post-0" class="post error404 not-found">
				<h2 class="entry-title">Jejda! Požadovaná stránka nebyla nalezena.</h2>
				<p>To může být špatně zadanou adresou URL, chybným odkazem, nebo již neplatným výsledkem hledání.</p>
				<p>Zkuste <a href="<?php echo home_url(); ?>">úvodní stránku</a> nebo vyhledávací formulář níže.</p>
				<div class="search-form">
					<?php get_search_form(); ?>
				</div>
			</article>
		</div>
	</div>
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
