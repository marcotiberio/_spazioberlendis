<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package spazioberlendis
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<!-- Swiper -->
		<div class="swiper-container">
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
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) :
				?>
			<?php endif; ?>
		</header><!-- .entry-header -->
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', '_motius' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_motius' ),
				'after'  => '</div>',
			)
		);
		?>
		<div class="info">
			<div class="title">
				<h1 class="header"><?php the_field('title'); ?></h1>
			</div>
			<div class="text">
				<p class="paragraph"><?php the_field('text'); ?></p>
			</div>
		</div>
		<div class="side">
			<div class="date">
				<p><?php the_field('date'); ?></p>
				<p><?php the_field('side_description'); ?></p>
			</div>
			<div class="additional-info">
				<?php if( have_rows('additional_info_list') ): ?>
					<ul>
					<?php while( have_rows('additional_info_list') ): the_row(); 
						?>
						<li>
							<p><?php the_sub_field('additional_info'); ?></p>
						</li>
					<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>

	</div><!-- .entry-content -->


</article><!-- #post-<?php the_ID(); ?> -->
