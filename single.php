<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package spazioberlendis
 */

get_header();
?>

	<main id="primary" class="site-main wp-post-modal">

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="title">
				<h1 class="header"><?php print the_title(); ?></h1>
				<div id="close"><p onclick="goBack()">Close</p></div>
			</div>

			<!-- Swiper -->
			<div class="swiper swiperSingle" id="swiperSingle">
				<div class="swiper-wrapper">
					<?php if( have_rows('swiper') ): ?>
						<?php while( have_rows('swiper') ): the_row();

							// Load sub field value.
							$image = get_sub_field('image');
							?>
								<div class="swiper-slide" style="background-image: url(<?php echo esc_url( $image['url'] ); ?>);"></div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
				<!-- Add Arrows -->
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
			</div>

			<div class="entry-content">
			<div class="info">
				<div class="text">
					<?php the_field('text'); ?>
				</div>
			</div>
			<div class="side">
				<div class="date">
					<div class="date-content-inner">
						<div>
							<?php if( get_field('date_single_title') ): ?>
								<p class="event-author"><?php the_field('date_single_title'); ?></p>
							<?php endif; ?>
							<?php if( get_field('date_start_title') ): ?>
								<p class="event-author"><?php the_field('date_start_title'); ?> — </p>
							<?php endif; ?>
							<?php if( get_field('date_end_title') ): ?>
								<p class="event-author"><?php the_field('date_end_title'); ?></p>
							<?php endif; ?>
							<span class="time">h <?php the_field('time'); ?></span>
						</div>
						<p class="type" style="margin-block-end: 7px; pointer-events: none;"><?php the_category( ' ' ); ?></p>
					</div>
					<p class="side-description"><?php the_field('side_description'); ?></p>
				</div>
				<div class="additional-info">
					<?php if( have_rows('additional_info_list') ): ?>
						<ul>
						<?php while( have_rows('additional_info_list') ): the_row(); 
							?>
							<li>
								<p class="side-description"><?php the_sub_field('additional_info'); ?></p>
							</li>
						<?php endwhile; ?>
						</ul>
					<?php endif; ?>
				</div>
			</div>

			</div><!-- .entry-content -->


		</article><!-- #post-<?php the_ID(); ?> -->

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
