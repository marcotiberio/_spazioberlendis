<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _spazioberlendis
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php spazioberlendis_post_thumbnail(); ?>
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

	<div class="entry-content">
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
		<?php
			$main = get_field('main');
			if( $main ): ?>
				<div class="info">
					<div class="title">
						<h1 class="header"><?php echo $main['titolo']; ?></h1>
					</div>
					<div class="text">
						<p class="paragraph"><?php echo $main['testo']; ?></p>
					</div>
				</div>
				<div class="side">
					<div class="date">
						<p><?php echo $main['data']; ?></p>
					</div>
				</div>
			<?php endif; ?>

	</div><!-- .entry-content -->


</article><!-- #post-<?php the_ID(); ?> -->
