<!DOCTYPE html>
<?php global $wpGrade_Options; ?>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if (IE 9)]><html <?php language_attributes(); ?> class="no-js ie9"><![endif]-->
<!--[if gt IE 9]><!-->
<?php $main_color = $wpGrade_Options->get('main_color'); ?>
<html <?php language_attributes(); ?> class="no-js <?php if ( $wpGrade_Options->get('bw_portfolio_filter') ){ echo "bw-images"; } else { echo ''; } ?> color1 <?php /*if ( $wpGrade_Options->get('header_fixed') ){ echo "l-header-fixed"; } else { echo ''; }*/ ?>" data-smooth-scroll="<?php if ( $wpGrade_Options->get('use_smooth_scrool') ){ echo "on"; } else { echo 'off'; } ?>" <?php echo 'data-accentcolor="'.$main_color.'"' ?>>
<!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title><?php wp_title('|','true','right'); ?><?php bloginfo('name'); ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
	<meta name="HandheldFriendly" content="True" />
	<meta name="apple-touch-fullscreen" content="yes" />
	<meta name="MobileOptimized" content="320" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link href="//fonts.googleapis.com/css?family=Ubuntu:300|Ubuntu+Condensed&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css" />
	<meta name="msapplication-TileColor" content="#349f36" />
	<meta name="theme-color" content="#349f36" />
	<?php wp_head(); ?>
</head>
<body <?php body_class( array( ( isset($_GET['testheader']) || ($wpGrade_Options->get('header_fixed') && !has_post_thumbnail()) ? "volby" : "" ), wpgrade_get_class_for_featured_image() ) ); ?>>
	<script type="text/javascript">
		/* <![CDATA[ */
		var google_conversion_id = 962136389;
		var google_custom_params = window.google_tag_params;
		var google_remarketing_only = true;
		/* ]]> */
	</script>
	<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
	<noscript>
		<div style="display:inline;">
			<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/962136389/?value=0&amp;guid=ON&amp;script=0"/>
		</div>
	</noscript>
	<div id="page" <?php /*if ( !$wpGrade_Options->get('header_fixed') )*/ echo 'class="no-sticky-header"'; ?> >

		<header id="header" class="wrapper wrapper-header wrapper-header-big">
			<div class="site-header">
				<div class="site-branding">
					<?php if ($wpGrade_Options->get('main_logo')): ?>
						<div class="site-logo site-logo_image<?php if ( $wpGrade_Options->get('use_full_size_logo') ) echo " full-sized"; ?>">
							<a class="site-home-link" href="<?php echo home_url(); ?>" title="<?php echo get_bloginfo('name') ?>">
								<?php
								$data_retina_logo  = $wpGrade_Options->get('use_retina_logo');
								if ($data_retina_logo)
									$data_retina_logo = 'data-retina_logo="'.$wpGrade_Options->get('retina_main_logo').'"';
								else
									$data_retina_logo = '';
								?>
								<img src="<?php echo $wpGrade_Options->get('main_logo'); ?>" <?php echo $data_retina_logo; ?> rel="logo" alt="<?php echo get_bloginfo('name') ?>"/>
							</a>
						</div>
					<?php else: ?>
						<div class="site-logo site-logo_text">
							<a class="site-home-link" href="<?php echo home_url() ?>"><?php echo get_bloginfo('name') ?></a>
						</div>
					<?php endif; ?>
				</div>
				<nav class="site-navigation" role="navigation">
					<h6 class="hidden" hidden>Main navigation</h6>
					<?php wpgrade_main_nav(); ?>
					<div class="header_search-form"><?php get_search_form(true); ?></div>
				</nav>
			</div>
		</header>


        <?php
        if ( isset($_GET['testheader']) || ($wpGrade_Options->get('header_fixed') && !has_post_thumbnail()) ) {
        	global $headerElection; // definded in functions.php
			echo $headerElection;
        } ?>

        <?php //if ( $wpGrade_Options->get('header_fixed') ) { ?>
            <div class="wrapper wrapper-header wrapper-header-small">
                <div class="site-header">
                    <a class="nav-btn" id="nav-open-btn" href=""><i class="icon-reorder"></i></a>
                    <div class="site-branding">
                        <?php if ($wpGrade_Options->get('main_small_logo') || $wpGrade_Options->get('main_logo')): ?>
                            <div class="site-logo site-logo_image<?php if ( $wpGrade_Options->get('use_full_size_logo') ) echo " full-sized"; ?>">
                                <a class="site-home-link" href="<?php echo home_url(); ?>" title="<?php echo get_bloginfo('name') ?>">
                                    <?php if ($wpGrade_Options->get('main_small_logo')): ?>
                                        <img src="<?php echo $wpGrade_Options->get('main_small_logo'); ?>" <?php echo $data_retina_logo; ?> alt="<?php echo get_bloginfo('name') ?>"/>
                                    <?php else: ?>
                                        <img src="<?php echo $wpGrade_Options->get('main_logo'); ?>" alt="<?php echo get_bloginfo('name') ?>"/>
                                    <?php endif; ?>
                                </a>
                            </div>
                        <?php else: ?>
                            <div class="site-logo site-logo_text">
                                <a class="site-home-link" href="<?php echo home_url() ?>"><?php echo get_bloginfo('name') ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <nav class="site-navigation" role="navigation">
                        <h6 class="hidden" hidden>Main navigation</h6>
                        <?php wpgrade_main_nav(); ?>
                    </nav>
                </div>
            </div>
        <?php //} ?>
