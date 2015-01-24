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
			
			<?php $loop = new WP_Query( array( 'post_type' => 'video', 'posts_per_page' => -1 ) ); ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			
			<div class="video <?php foreach(get_the_terms(get_the_ID(), 'video_categories') as $term) echo $term->slug . " "; ?>">
				<h2><?php the_title(); ?></h2>
			</div>
			
			<?php endwhile; wp_reset_query(); ?>
		</section>
		<!-- /work -->
		
		<section id="about">
		</section><!-- /about -->
	</main>

	
	
<?php get_footer(); ?>
