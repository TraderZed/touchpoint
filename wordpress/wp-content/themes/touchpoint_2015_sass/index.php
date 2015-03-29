<?php get_header(); ?>
  
	<main role="main">
		<section id="carousel">
			<div class="jcarousel">
  		  <ul>
  			<?php $loop = new WP_Query( array( 'post_type' => 'video', 'posts_per_page' => -1 ) ); ?>
  			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
  			<?php
  			$value = get_field( "carousel", get_the_ID() );
  			if( $value )
  			{?>
        <li class="video carousel-item" data-video="<?php echo get_field( "carousel_preview", get_the_ID() ); ?>">
    			<div class="sub" style="position: relative; margin-bottom: 100px; ">
    				<h2><?php the_title(); ?></h2>
    				<p><?php echo get_field( "carousel_description", get_the_ID() ); ?></p>
    				<a href="javascript: void(0);" title="Watch" class="btn_watch button js-show-video"data-video-title="<?php the_title(); ?>" data-vimeo-id="<?php echo get_field( "vimeo_id" );?>" data-video-description="<?php echo get_field( "video_description" );?>">Watch</a>
    			</div>
    			<video class="video-js vjs-default-skin"
            preload="auto" width="auto" height="auto"
            autoplay
            loop
            muted
            data-setup=''>
           <source src="<?php echo get_field( "carousel_preview", get_the_ID() ); ?>" type='video/mp4' />
           <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
          </video>
    		</li>
  			<?php } ?>  			
  			<?php endwhile; wp_reset_query(); ?>
			  </ul>
			</div><!-- /jcarousel -->

      <div class="jcarousel-pagination"></div>
		</section><!-- /carousel -->
		
		<section id="work">
  		<div class="wrapper">
    		<header class="work_header header">
    			<h2 class="title">Work</h2>
    			
    			<nav>
    			<?php
    			$terms = get_terms( 'video_categories' );
    			 if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
    			     echo '<ul class="category_list">';
    			     echo '<li><a href="javascript: void(0);" data-category="all" class="js-video-category active">All</a></li>';
    			     foreach ( $terms as $term ) {
    			       echo '<li><a href="javascript: void(0);" data-category="'. $term->slug .' " class="js-video-category">' . $term->name . '</a></li>';
    			     }
    			     echo '</ul>';
    			 }
    			?>
    			</nav>
    		</header>
  			<?php
    		$video_args = array(
        'posts_per_page' => -1,
        'post_status'=>'publish',
        'post_type' => 'video',
        'orderby' => 'rand',
        'meta_query' => array(
            array(
                'key' => 'include_in_work_section',
                'value' => 1,
                'compare' => 'IN',
            )
        ));	
    		?>
  			<?php $video_loop = new WP_Query( $video_args ); ?>
  			<?php while ( $video_loop->have_posts() ) : $video_loop->the_post(); ?>
  			
  			<div data-video-title="<?php the_title(); ?>" data-vimeo-id="<?php echo get_field( "vimeo_id" );?>" data-video-description="<?php echo get_field( "video_description" );?>" class="video js-show-video active <?php foreach(get_the_terms(get_the_ID(), 'video_categories') as $term) echo $term->slug . " "; ?>">
  				<img src="<?php echo get_field( "video_preview" );?>"/>
  				<div class="overlay">
    				<div class="inner">
      				<h3><?php the_title(); ?></h3>
            </div><!-- /inner -->
          </div><!-- /overlay -->
  			</div>
  			
  			<?php endwhile; wp_reset_query(); ?>
      </div><!-- /wrapper -->
		</section>
		<!-- /work -->
		
		<section id="about">
  		<div class="wrapper">
        <h2><?php echo get_the_title(35); ?></h2>
        <h3 class="about_intro">We're a boutique production company with a pretty simple approach. Hire the best people.<span>We’re nimble, resourceful. We do it all.</span></h3>
      </div><!-- /wrapper -->
        
        <div class="about_sub">
          <div class="wrapper">
            <div class="saffer">
              <h3>Kevin Saffer</h3>
              <p class="sub">- Founder & Executive Producer</p>
              <p>Whether it’s a commercial or a scripted web series—a guerilla advertising stunt or an experiential installation—our clients can always rely on the same care, attention to detail, and passion for the work.</p>
            </div><!-- /saffer -->
            
            <ul class="type_list">
              <li>ONLINE</li>
              <li>SOCIAL</li>
              <li>BROADCAST</li>
              <li>EXPERIENTIAL</li>
              <li>MOTION</li>
            </ul><!-- /type list -->
            
            <div class="budget">
              <h3><span>We can handle</span> big budget
                <span>&bull;</span>
                <span>&bull;</span>
                <span>&bull;</span>
                <span>&bull;</span>
                <span>&bull;</span>
                <span>&bull;</span>
                <span>&bull;</span>
                <span class="sub">SMALL GUERILLA</span>
                <span>AND EVERYTHING IN-BETWEEN</span></h3>
            </div><!-- /budget -->
            
            <div class="about_copy">
              <?php echo get_field( "about_copy", 35 );?>
            </div>
            <div style="width: 100%; height: 1px; clear: both;"></div>
          </div><!-- /wrapper -->

          <div class="background">
            <div class="video video_one">
              <video id="about_video_1" class="video-js vjs-default-skin"
                preload="auto" width="auto" height="auto"
                autoplay
                loop
                data-setup=''>
               <source src="<?php echo get_template_directory_uri(); ?>/assets/videos/about_1.mp4" type='video/mp4' />
               <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
              </video>
            </div>
            <div class="video video_two">
              <video id="about_video_2" class="video-js vjs-default-skin"
                preload="auto" width="auto" height="auto"
                autoplay
                loop
                data-setup=''>
               <source src="<?php echo get_template_directory_uri(); ?>/assets/videos/about_2.mp4" type='video/mp4' />
               <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
              </video>
            </div>
            <div class="video video_three">
              <video id="about_video_3" class="video-js vjs-default-skin"
                preload="auto" width="auto" height="auto"
                autoplay
                loop
                data-setup=''>
               <source src="<?php echo get_template_directory_uri(); ?>/assets/videos/about_3.mp4" type='video/mp4' />
               <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
              </video>
            </div>
          </div><!-- /background -->
        </div><!-- /about_sub -->
		</section><!-- /about -->
		
		<section id="who">
  		<div class="wrapper">
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
        </div><!-- /left -->
        
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
      		  <img src="<?php echo get_field( "vip_photo" );?>" alt="<?php the_title(); ?>" />
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
		</section><!-- /who -->
		
		<section id="contact">
  		<div class="wrapper">
        <h2><?php echo get_the_title(37); ?></h2>
        
        <div class="left">
          <?php
          $vip_args = array(
          'posts_per_page' => -1,
          'post_status'=>'publish',
          'post_type' => 'people',
          'orderby'   => 'menu_order',
          'order'     => 'ASC',
          'meta_query' => array(
              array(
                  'key' => 'show_contact_info',
                  'value' => 1,
                  'compare' => 'IN',
              )
          ));
          ?>
          
          <?php $who_query = new WP_Query( $vip_args ); ?>
      		<?php while ( $who_query->have_posts() ) : $who_query->the_post(); ?>
    			
    			<div class="person">
    				<h3><?php the_title(); ?></h3>
    				<p><?php echo get_field( "job_title" );?></p>
    				<p class="phone"><?php echo get_field( "phone_number" );?></p>
    			</div>
    			
    			<?php endwhile; wp_reset_query(); ?>
        </div><!-- /left -->
        
        <div class="right">
          <h3>Offices</h3>
          <p>165 John street, 3rd Floor, Toronto, ON M5T 1x3</p>
          <a href="https://www.google.ca/maps/place/165+John+St,+Toronto,+ON+M5T+1X3/@43.6504154,-79.3910843,17z" title="Map" class="button" target="_blank">Map</a>
          
          <h3>Email Us</h3>
          <p>Send us a message</p>
          <a href="mailto: info@touchpointfilms.com" title="Send us a message" class="email">info@touchpointfilms.com</a>
        </div><!-- /right -->
      </div><!-- /wrapper -->
		</section><!-- /about -->
	</main>
	
<?php get_footer(); ?>
