<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<script>
      // conditionizr.com
      // configure environment tests
      conditionizr.config({
          assets: '<?php echo get_template_directory_uri(); ?>',
          tests: {}
      });
      </script>
	</head>
	
	<body <?php body_class(); ?>>
    <!-- header -->
		<header class="main_header header clear" role="banner">
      <div class="wrapper">
				<!-- logo -->
				<div class="logo title">
					<a href="<?php echo home_url(); ?>">
						<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Logo" class="logo-img">
					</a>
				</div>
				<!-- /logo -->

				<!-- nav -->
				<nav class="nav" role="navigation">
					<?php html5blank_nav(); ?>
				</nav>
				<!-- /nav -->
      </div><!-- /wrapper -->
		</header>
		<!-- /header -->
		
		<div class="video_overlay">
      <a href="javascript: void(0);" class="button js-close-video">Back</a>
      <h4>Video Title</h4>
      <iframe src="//player.vimeo.com/video/58045362?autoplay=0&color=3e3f40&title=0&byline=0&portrait=0" width="960" height="409" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
      <p>Video description</p>
    </div><!-- /video_overlay -->