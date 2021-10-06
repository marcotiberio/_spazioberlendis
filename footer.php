<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package spazioberlendis
 */

?>

	<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>


	<script>
		// Swiper Event
		var swiper = new Swiper('#swiperSingle', {
			navigation: {
				nextEl: '#swiperSingle .swiper-button-next',
				prevEl: '#swiperSingle .swiper-button-prev',
			},
		});
	</script>


</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
