<?php get_header(); ?>

	<main role="main">

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <section id="vimeo">
      <div class="wrapper">
        <div class="copy">
          <h2><?php the_title(); ?></h2>
        </div><!-- /copy -->
        <iframe src="//player.vimeo.com/video/<?php echo get_field( "vimeo_id" );?>?autoplay=0&color=3e3f40&title=0&byline=0&portrait=0" width="960" height="409" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
      </div>
    </section><!-- /masthead -->

    <?php
    $value = get_field( "text_field" );

    if( $value ) {

        ?>
     <section id="description">
  		<div class="wrapper">
        <h2>Description</h2>
        <p><?php echo get_field( "video_description" );?></p>
      </div>
    </section><!-- /bio -->
        <?php

    }
    ?>

	<?php endwhile; ?>
	<?php endif; ?>

	</main>

<?php get_footer(); ?>
