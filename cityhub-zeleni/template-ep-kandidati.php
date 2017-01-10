<?php
/*
Template Name: EP kandidati
*/
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta property="og:type" content="website">
<meta property="og:url" content="http://www.zeleni.cz/kandidatka-ep-2014/">
<meta property="og:site_name" content="Kandidátka do Evropského parlamentu">
<meta property="og:title" content="Zelení, kteří patří do Evropy!">
<meta property="og:image" content="http://www.zeleni.cz/wp-content/themes/cityhub-zeleni/kandidatka.og.jpg">
<meta property="og:description" content="14 žen a 14 mužů, kteří reprezentují zelenou politiku a její evropský směr. Podpořte zelené kandidáty na cestě do Bruselu.">
<meta name="description" content="14 žen a 14 mužů, kteří reprezentují zelenou politiku a její evropský směr. Podpořte zelené kandidáty na cestě do Bruselu.">
<link rel="shortcut icon" href="http://www.zeleni.cz/wp-content/themes/cityhub-zeleni/favicon.ico">
<title>Kandidátka do Evropského parlamentu | Strana zelených</title>
<link rel="stylesheet" href="http://www.zeleni.cz/wp-content/themes/cityhub-zeleni/css-european/screen.css">
</head>
<body class="page european">
<div class="container" role="main">
  <div class="menu menu-election">
    <div class="in txt header-global">
      <a class="header-global-logo" href="http://www.zeleni.cz">
        <img src="http://www.zeleni.cz/wp-content/themes/cityhub-zeleni/img/logo-color.png" alt="Strana zelených">
      </a>
      <ul class="global-nav">
        <li><a href="/">Evropské volby</a></li>
        <li><a href="/program-ep-2014">Program</a></li>
        <li><a href="/kandidatka-ep-2014" class="active">Kandidáti</a></li>
        <li><a href="/transparentni-kampan">Transparentní kampaň</a></li>
        <li><a href="/kalendar/rubrika/akce/">Akce</a></li>
        <li class="global-nav-old"><a href="/uvod">Celý web</a></li>
      </ul>
    </div>
  </div>
  <div class="main">
  	<div class="in">
  	<div class="txt telephone">
	  <h2 class="txt-center">Naše kandidátka do Evropského parlamentu 2014</h2>
    <p>Máte dotazy k našemu programu? Zavolejte našim kandidátům a členům na linku 222 703 216.</p>
	</div>
<?php
if (have_posts()): while (have_posts()): the_post();

	$html_title = get_post_meta(get_the_ID(), WPGRADE_PREFIX.'page_html_title', true);
	$header_height = absint($wpGrade_Options->get('nocontent_header_height'));
	$height = '';
	if ($header_height && empty($html_title)) {
		$height = 'data-height="'.$header_height.'"';
	}

	if (has_post_thumbnail()) {
		$featured_id = get_post_thumbnail_id();
		$featured_image = wp_get_attachment_image_src($featured_id, 'full');
		if (empty($height) && empty($html_title)) {
			$height = 'data-width="'. $featured_image[1] .'" data-height="'. $featured_image[2] .'"';
		} ?>
	<?php } elseif (!empty($html_title)) { ?>

	<?php } else {
		echo '<div class="wrapper-featured-image no-image"></div>';
	} ?>
		<article>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</article>
<?php endwhile;
else: ?>
	<div class="row wrapper wrapper-content">
		<div class="main main-content" role="main">
			<article id="post-not-found" class="hentry clearfix">
				<header class="article-header">
					<h1><?php _e("Oops, Page Not Found!", wpGrade_txtd); ?></h1>
				</header>
				<section class="entry-content">
					<p><?php _e("Uh Oh. Something is missing. Try double checking things.", wpGrade_txtd); ?></p>
				</section>
				<footer class="article-footer">
					<p><?php _e("This is the error message in the page.php template.", wpGrade_txtd); ?></p>
				</footer>
			</article>
		</div>
	</div>
<?php endif; ?>
</div>
<div class="foot"><div class="in">
    <div class="cta-join-the-event"><div class="txt">
        <h2>Pojďte k volbám 23. a 24. května!</h2>
        <p><a href="https://www.facebook.com/events/310866692398691/" target="_blank" onClick="_gaq.push(['_trackEvent', 'Event', 'Join', 'Pridejte se na Facebooku']);"title="Událost: Česko dopředu. Zelený hlas do Evropy.">Přidejte se k události na Facebooku.</a></p>
    </div></div>
    <div class="media"><div class="txt">
      <p><a href="http://www.zeleni.cz/pro-media/">Kontakt pro média</a> <span>/</span> <a href="http://www.zeleni.cz/category/tiskove-zpravy/">Tiskové zprávy</a> <span>/</span> <a href="http://www.zeleni.cz/pro-media/volebni-stab/">Sledování volebních výsledků</a> <span>/</span> <a href="http://www.zeleni.cz/kalendar/rubrika/akce-media/">Kalendář pro média</a> <span>/</span> <a href="https://www.ondrejliska.cz/#/?scrollTo=challenge" target="_blank">Přispějte na kampaň</a>
    </div></div>
    <div class="copyrights"><div class="txt">
      <p>Obsah webu můžete volně šířit podle licence <a href="http://creativecommons.org/licenses/by/3.0/cz/">Creative commons Uveďte autora 3.0</a>. Podporujeme svobodné šíření myšlenek.</p>
    </div></div>
  </div></div>
</div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-41616932-4', 'zeleni.cz');
  ga('send', 'pageview');
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=1583721125185688&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<script>(function() {
  var _fbq = window._fbq || (window._fbq = []);
  if (!_fbq.loaded) {
    var fbds = document.createElement('script');
    fbds.async = true;
    fbds.src = '//connect.facebook.net/en_US/fbds.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(fbds, s);
    _fbq.loaded = true;
  }
  _fbq.push(['addPixelId', "288499484652483"]);
})();
window._fbq = window._fbq || [];
window._fbq.push(["track", "PixelInitialized", {}]);
</script>
<noscript><img height="1" width="1" border="0" alt="" style="display:none" src="https://www.facebook.com/tr?id=288499484652483&amp;ev=NoScript" /></noscript>
</body>
</html>
