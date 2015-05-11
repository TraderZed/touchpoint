<?php get_header(); ?>

	<main role="main">

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <section id="masthead" style="background-image: url(<?php echo get_field( "cover_photo" );?>)">
      <div class="gradient"></div>
      <div class="wrapper">
        <div class="copy">
          <h2><?php the_title(); ?></h2>
          <h3><?php echo get_field( "job_title" );?></h3>
        </div><!-- /copy -->
      </div>
    </section><!-- /masthead -->
    
    <section id="bio">
  		<div class="wrapper">
        <h2>Biography</h2>
        <p><?php echo get_field( "bio" );?></p>
      </div>
    </section><!-- /bio -->
    
    <?php $post_objects = get_field('videos');
    if( $post_objects ): ?>
    <section id="work">
  		<div class="wrapper">
        <h2><?php echo get_the_title(); ?>'s Work</h2>
        <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
            <?php setup_postdata($post);?>
            <div data-video-title="<?php echo $post['video_title'] ?>" data-vimeo-id="<?php echo $post['vimeo_id'];?>" data-video-description="<?php echo $post['video_description'];?>" class="video js-show-video active">
      				<img src="<?php echo $post['video_preview'];?>"/>
      				<div class="overlay">
        				<div class="inner">
          				<h3><?php echo $post['video_title'] ?></h3>
                </div><!-- /inner -->
              </div><!-- /overlay -->
      			</div>
        <?php endforeach; ?>
        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
      </div>
    </section><!-- /work -->        
    <?php endif; ?>
    
    <section id="who" class="full">
      <div class="wrapper">
        <h2>Who</h2>
        <div class="grid">
          <?php
          $vip_args = array(
          'posts_per_page' => -1,
          'post_status'=>'publish',
          'post_type' => 'people',
          'orderby'   => 'menu_order',
          'order'     => 'ASC',
          'meta_query' => array(
              array(
                  'key' => 'vip',
                  'value' => 1,
                  'compare' => 'IN',
              )
          ));
          $person_args = array(
          'posts_per_page' => -1,
          'post_status'=>'publish',
          'post_type' => 'people',
          'orderby' => 'title',
          'order' => 'ASC',
          'meta_query' => array(
              array(
                  'key' => 'vip',
                  'value' => 0,
                  'compare' => 'IN'
              )
          ));
          ?>
      		<?php $who_query = new WP_Query( $vip_args ); ?>
      		<?php while ( $who_query->have_posts() ) : $who_query->the_post(); ?>
    			
    			<div class="person vip">
      		  <img src="<?php echo get_field( "profile_photo" );?>" alt="<?php the_title(); ?>" />
    				<div class="overlay">
      				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
        				<div class="inner">
          				<h3><?php the_title(); ?></h3>
          				<p><?php echo get_field( "job_title" );?></p>
                </div><!-- /inner -->
              </a>
            </div><!-- /overlay -->
    			</div>
    			
    			<?php endwhile; wp_reset_query(); ?>
    			
    			<?php $who_query = new WP_Query( $person_args ); ?>
      		<?php while ( $who_query->have_posts() ) : $who_query->the_post(); ?>
    			
    			<div class="person">
      		  <img src="<?php echo get_field( "profile_photo" );?>" alt="<?php the_title(); ?>" />
    				<div class="overlay">
      			  <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
        				<div class="inner">
          				<h3><?php the_title(); ?></h3>
          				<p><?php echo get_field( "job_title" );?></p>
                </div><!-- /inner -->
              </a>
            </div><!-- /overlay -->
    			</div>
    			
    			<?php endwhile; wp_reset_query(); ?>
    		</div><!-- /grid -->
      </div><!-- /wrapper -->
    </section><!-- /roster -->
	<?php endwhile; ?>
	<?php endif; ?>

	</main>

<?php get_footer(); ?>
