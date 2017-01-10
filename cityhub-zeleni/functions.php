<?php
/*
 * If you would like to overwrite the css of the theme you will need to uncomment this action
 */

add_action('wp_enqueue_scripts', 'load_child_theme_styles', 999);
add_action('wp_enqueue_scripts', 'load_child_js' );
add_action('login_enqueue_scripts', 'my_logincustomCSSfile', 999);

function load_child_theme_styles(){

    // If your css changes are minimal we recommend you to put them in the main style.css.
    // In this case uncomment bellow

    wp_enqueue_style( 'child-theme-style', get_stylesheet_directory_uri() . '/style.css' );
    wp_dequeue_style('google-web-fonts');

    // If you want to create your own file.css you will need to load it like this (Don't forget to uncomment bellow) :
    //** wp_enqueue_style( 'custom-child-theme-style', get_stylesheet_directory_uri() . '/file.css' );
}

function load_child_js() {
	wp_dequeue_script( 'my-scripts' );
	wp_enqueue_script( 'child-theme-scripts', get_stylesheet_directory_uri() . '/scripts.js', array('flexslider', 'nice-scroll', 'autoresize', 'isotope',  'jquery', 'youtube-api', 'mediaelement', 'froogaloop', 'fitvids', 'magnific-popup', 'caroufredsel', 'respond', 'backgroundsize'), $cacheBusterJS, true);
}

function my_logincustomCSSfile() {
    wp_enqueue_style('login-styles', get_stylesheet_directory_uri() . '/library/css/login.css');
}


/* Volby 2016 */
/*
$headerElection = '
	<div class="head-kraj-senat">
		<div class="container">
			<div class="row">
				<div class="span6 tc">
					<span class="pull-right"><a href="/krajske-volby/" class="tc"><img src="'. get_stylesheet_directory_uri() .'/img/volby-2016-kraj.png" /></a></span>
					<div class="tc">
						<a href="/krajske-volby-2016-priority/"><h2>Krajské volby</h2></a>
						<ul>
							<li><a href="/krajske-volby-2016-priority/">Program pro&nbsp;krajské volby</a></li>
							<li><a href="/krajske-volby/">Zelené koalice v&nbsp;krajích</a></li>
						</ul>
					</div>
				</div>
				<div class="span6 tc">
					<span class="pull-right"><a href="/senatni-volby/" class="tc"><img src="'. get_stylesheet_directory_uri() .'/img/volby-2016-senat.jpg" /></a></span>
					<div class="tc">
						<a href="/senatni-volby/"><h2>Senátní volby</h2></a>
							<ul>
								<li><a href="/senatni-volby/">Kandidáti a&nbsp;kandidátky do&nbsp;Senátu</a></li>
								<li><a href="https://dary.zeleni.cz">Podpořte darem senátní kampaně</a></li>
							</ul>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
';*/

/* Banners 2016 */
$headerElection = '
	<svg class="svg-defs">
		<defs>
			<clipPath id="myClip">
				<polygon points="219 419,961 420,960 0,0 0"></polygon>
			</clipPath>
		</defs>
	</svg>
	<div class="head-kraj-senat calls">
		<div class="container">
			<div class="row">
				<a class="span6 tc call-left" href="http://pridejtese.zeleni.cz/">
					<span class="pull-left">
						<img src="'. get_stylesheet_directory_uri() .'/img/call-left-icon.png" />
					</span>
					<span class="pull-right">
						<svg class="img">
							<image class="svg-image" width="100%" height="94" xlink:href="'. get_stylesheet_directory_uri() .'/img/call-left.jpg" />
						</svg>
						<span class="arrow"></span>
					</span>
					<h2>Přidejte se k&nbsp;zeleným</h2>
				</a>
				<a class="span6 tc call-right" href="https://dary.zeleni.cz/">
					<span class="pull-left">
						<img src="'. get_stylesheet_directory_uri() .'/img/call-right-icon.png" />
					</span>
					<span class="pull-right">
						<svg class="img">
							<image class="svg-image" width="100%" height="94" xlink:href="'. get_stylesheet_directory_uri() .'/img/call-right.jpg" />
						</svg>
						<span class="arrow"></span>
					</span>
					<h2>Podpořte nás&nbsp;darem</h2>
				</a>
			</div>
		</div>
	</div>

';