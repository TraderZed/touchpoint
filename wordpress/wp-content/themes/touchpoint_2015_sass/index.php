<?php get_header(); ?>

	<main role="main">
		<section id="carousel">
			<?php $loop = new WP_Query( array( 'post_type' => 'video', 'posts_per_page' => -1 ) ); ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<?php
			$value = get_field( "carousel", get_the_ID() );
			if( $value )
			{?>
			<div class="video carousel-item">
				<h2><?php the_title(); ?></h2>
				<p><?php echo get_field( "video_description", get_the_ID() ); ?></p>
			</div>
			<?php } ?>
			
			
			<?php endwhile; wp_reset_query(); ?>
		</section><!-- /carousel -->
		
		<section id="work">
  		<header class="work_header">
  			<h2>Work</h2>
  			<?php
  			$terms = get_terms( 'video_categories' );
  			 if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
  			     echo '<ul id="category_list">';
  			     foreach ( $terms as $term ) {
  			       echo '<li class="'. $term->slug .'">' . $term->name . '</li>';
  			        
  			     }
  			     echo '</ul>';
  			 }
  			?>
  		</header>
			
			<?php $video_loop = new WP_Query( array( 'post_type' => 'video', 'posts_per_page' => -1 ) ); ?>
			<?php while ( $video_loop->have_posts() ) : $video_loop->the_post(); ?>
			
			<div class="video <?php foreach(get_the_terms(get_the_ID(), 'video_categories') as $term) echo $term->slug . " "; ?>">
				<h2><?php the_title(); ?></h2>
			</div>
			
			<?php endwhile; wp_reset_query(); ?>
		</section>
		<!-- /work -->
		
		<section id="about">
      <h2><?php echo get_the_title(35); ?></h2>

		</section><!-- /about -->
		
		<section id="who">
  		  <div class="left">
          <h2><?php echo get_the_title(40); ?></h2>
          <?php
            $about_id = 40;
            $content_post = get_post($about_id);
            $content = $content_post->post_content;
            $content = apply_filters('the_content', $content);
            $content = str_replace(']]>', ']]&gt;', $content);
            echo $content;
          ?>
          <ul>
          <?php $who_query = new WP_Query( array( 'post_type' => 'people', 'posts_per_page' => -1 ) ); ?>
      		<?php while ( $who_query->have_posts() ) : $who_query->the_post(); ?>
    			
    			<li class="person"><?php the_title(); ?>, <?php echo get_field( "job_title" );?></li>
    			
    			<?php endwhile; wp_reset_query(); ?>
    			</ul>
        </div><!-- /left -->

  		<?php $who_query = new WP_Query( array( 'post_type' => 'people', 'posts_per_page' => -1 ) ); ?>
  		<?php while ( $who_query->have_posts() ) : $who_query->the_post(); ?>
			
			<div class="person">
  		  <img src="<?php echo get_field( "profile_photo" );?>" alt="<?php the_title(); ?>" />
				<div class="overlay">
  				<h3><?php the_title(); ?></h3>
  				<p><?php echo get_field( "job_title" );?></p>
        </div><!-- /overlay -->
			</div>
			
			<?php endwhile; wp_reset_query(); ?>
		</section><!-- /about -->
	</main>

	
	
<?php get_footer(); ?>
