<?php
global $wpGrade_Options;

if ( isset($_GET['testheader']) || ($wpGrade_Options->get('header_fixed') && has_post_thumbnail()) ) {
	global $headerElection; // definded in functions.php
	echo $headerElection;
}
get_sidebar('footer');

?>

	<div class="wrapper wrapper-footer main-footer_siteinfo">
		<footer class="container">
			<div class="row">
				<div class="footer_right span6 lap-push6">
					<?php $social_icons = $wpGrade_Options->get('social_icons');
					$target = '';
					if ($wpGrade_Options->get('social_icons_target_blank')) {
						$target = ' target="_blank"';
					}
					if (count($social_icons)): ?>
						<ul class="menu-footer_social">
							<?php foreach ($social_icons as $domain => $value): if ($value): ?>
								<li class="footer-social-link">
									<a href="<?php echo $value ?>"<?php echo $target ?>>
										<?php switch($domain) {
											case 'youtube':
												?><i class="shc icon-e-play"></i>
												<?php break;
											case 'appnet':
												?><i class="shc icon-user"></i>
												<?php break;
											default:
												?><i class="shc icon-e-<?php echo $domain; ?>"></i>
												<?php } ?>
									</a>
								</li>
							<?php endif; endforeach ?>
						</ul>
					<?php endif; ?>
				</div>
				<div class="footer_left span6 lap-pull6">
					<?php
					$copyright = $wpGrade_Options->get( 'copyright_text' );
					if ($copyright) {
						wpgrade_display_content( $copyright );
					}
					?>
				</div>
			</div>
		</footer>
	</div>
</div> <!-- close page -->
<!-- Google Analytics tracking code -->
<?php
	if ($wpGrade_Options->get('google_analytics')) {
		echo $wpGrade_Options->get('google_analytics');
	}
	wp_footer(); ?>
	<!-- Facebook Pixel Code SZ-PIR -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '103353956750219');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=103353956750219&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
</body>
</html>