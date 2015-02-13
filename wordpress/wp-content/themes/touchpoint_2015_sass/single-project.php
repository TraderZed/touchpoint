<?php get_header(); ?>

	<main role="main">

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <section id="masthead" style="background-image: url('<?php echo get_field( "cover_photo" );?>')">
      <div class="wrapper">
        <div class="copy">
          <h2><?php the_title(); ?></h2>
          <?php
          if(get_field('client'))
          {
          	echo '<h3>' . get_field('client') . '</h3>';
          }
          ?>
        </div><!-- /copy -->
      </div>
    </section><!-- /masthead -->
    
    <section id="bio">
  		<div class="wrapper">
        <h2>A note from Touchpoint</h2>
        <p><?php echo get_field( "note" );?></p>
      </div>
    </section><!-- /bio -->
    
    <?php $post_objects = get_field('work_samples');
    if( $post_objects ): ?>
    <section id="work">
  		<div class="wrapper">
        <h2>Work Samples</h2>    
        <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
            <?php setup_postdata($post); ?>
            <div data-video-title="<?php the_title(); ?>" data-vimeo-id="<?php echo get_field( "vimeo_id" );?>" data-video-description="<?php echo get_field( "video_description" );?>" class="video js-show-video active <?php foreach(get_the_terms(get_the_ID(), 'video_categories') as $term) echo $term->slug . " "; ?>">
      				<img src="<?php echo get_field( "video_preview" );?>"/>
      				<div class="overlay">
        				<div class="inner">
          				<h3><?php the_title(); ?></h3>
                </div><!-- /inner -->
              </div><!-- /overlay -->
      			</div>
        <?php endforeach; ?>
        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
      </div>
    </section><!-- /work -->        
    <?php endif; ?>
    
	<?php endwhile; ?>
	<?php endif; ?>

	</main>

<?php get_footer(); ?>
