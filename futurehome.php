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
			<div class="col" id="sinistra">
				<h6 class="header">Calendar</h6>
			</div>
			<div class="col" id="centrale">
				<h6 class="header">News</h6>
				<?php 
				$args = array(
					'post_type' => 'success-stories',
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
						<article class="carousel-cell" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<a href="<?php the_permalink(); ?>">
								<div class="event-cover">
									<?php
									if ( has_post_thumbnail() ) :
										the_post_thumbnail( '' );
									endif;
									?>
								</div>
								<div class="event-header">
									<p class="category"><?php the_category(); ?></p>
									<a href="<?php the_permalink(); ?>"><h5 class="title"><?php print the_title(); ?></h5></a>
								</div>
							</a>
						</article>
						<?php
					endwhile;
				endif; ?>
			</div>
			</div>
			<div class="col" id="destra">
				<h6 class="header">About</h6>
				<div class="about"><?php the_field('about'); ?></div>
				
				<div class="carousel" data-flickity='{ "wrapAround": true }'>
					<?php if( have_rows('carousel') ): ?>
						<?php while( have_rows('carousel') ): the_row(); 

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
