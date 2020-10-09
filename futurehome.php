<?php
/**
 * Template Name: Home
 *
 * This is the Home template
 * and one of the two required files for a theme (the other being style.css).
 *
 * @package spazioberlendis
 */

get_header();
?>

	<main id="primary" class="site-main">
		<section id="hero">
			<img src="https://www.spazioberlendis.it/wp-content/uploads/2020/10/heroImage-scaled.jpg" alt="Hero Image">
		</section>

		<section id="central">
			<div class="col" id="sinistra" style="padding: 0 20px;">
				<h6 class="header">Calendar</h6>
				<?php 
					$args = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'orderby' => 'date',
						'order' => 'DESC',
						'posts_per_page' => 1,
					);
					$arr_posts = new WP_Query( $args );
					
					if ( $arr_posts->have_posts() ) :
						
						while ( $arr_posts->have_posts() ) :
							$arr_posts->the_post();
							?>
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<?php spazioberlendis_post_thumbnail(); ?>
								<div class="event-header">
									<span class="date"><?php the_field('opening'); ?></span>
									<span class="time">h <?php the_field('time'); ?>:00</span>
								</div>
								<a href="<?php the_permalink(); ?>">
									<span class="title"><?php print the_title(); ?></span>
								</a>
								<div class="summary">
									<a href="<?php the_permalink(); ?>">
										<span class="paragraph"><?php $summary = get_field('text');
										$pos=strpos($summary, ' ', 300);
										echo substr($summary,0,$pos ); ?></span><span>...</span>
										<p class="read-more">Read More</p>
									</a>
								</div>
							</article>
							<?php
						endwhile;
					endif; 
				?>
				<?php echo do_shortcode('[clndr id=mini-calendar]'); ?>
			</div>
			<div class="col" id="centrale">
				<h6 class="header">News</h6>
				<?php 
					$args = array(
						'post_type' => 'news',
						'post_status' => 'publish',
						'orderby' => 'date',
						'order' => 'DESC',
						'posts_per_page' => 10,
					);
					$arr_posts = new WP_Query( $args );
					
					if ( $arr_posts->have_posts() ) :
						
						while ( $arr_posts->have_posts() ) :
							$arr_posts->the_post();
							?>
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="event-header">
									<a href="<?php the_permalink(); ?>">
										<span class="title"><?php print the_title(); ?></span>
										<span class="date">&#91;<?php the_field('date'); ?>&#93;</span>
									</a>
									<p class="type"><?php the_field('type'); ?></p>
								</div>
								<div class="summary">
									<a href="<?php the_permalink(); ?>">
										<p class="paragraph"><?php the_field('text'); ?></p>
									</a>
								</div>
							</article>
							<?php
						endwhile;
					endif; 
				?>
			</div>
			<div class="col" id="destra" style="padding: 0 20px;">
				<h6 class="header">About</h6>
				<div class="about"><?php the_field('about', 21); ?></div>
				
				<div class="carousel" data-flickity='{ "wrapAround": true }'>
					<?php if( have_rows('carousel', 21) ): ?>
						<?php while( have_rows('carousel', 21) ): the_row(); 

							// Load sub field value.
							$image = get_sub_field('image');
							?>
							
								<div class="carousel-cell">
									<img id="image" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
								</div>

						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>

		</section>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
