<?php get_header(); ?>

	<main role="main">

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <section id="masthead" style="background-image: url(<?php echo get_field( "cover_photo" );?>)">
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
    
    <section id="work">
  		<div class="wrapper">
        <h2><?php echo strtok(get_the_title(), " "); ?>'s Work</h2>
        
        <?php $video_loop = new WP_Query( array( 'post_type' => 'video', 'posts_per_page' => -1 ) ); ?>
  			<?php while ( $video_loop->have_posts() ) : $video_loop->the_post(); ?>
  			
  			<div class="video <?php foreach(get_the_terms(get_the_ID(), 'video_categories') as $term) echo $term->slug . " "; ?>">
  				<img src="<?php echo get_field( "video_preview" );?>"/>
  				<div class="overlay">
    				<div class="inner">
      				<h3><?php the_title(); ?></h3>
            </div><!-- /inner -->
          </div><!-- /overlay -->
  			</div>
  			
  			<?php endwhile; wp_reset_query(); ?>
      </div>
    </section><!-- /work -->
    
    <section id="who" class="full">
      <div class="wrapper">
        <h2>Touchpoint Roster</h2>
        <div class="grid">
          <?php
          $person_args = array(
          'posts_per_page' => -1,
          'post_status'=>'publish',
          'post_type' => 'people',
          'orderby' => 'rand'
          );
          ?>
    			
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
