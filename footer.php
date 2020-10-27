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

	<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

	<div id="showFooter"></div>
	
	<footer id="colophon" class="site-footer" style="display: none;">
		<div class="inner">
			<div class="col">
				<div class="left">
					<p>Spazio_Berlendis_Srl</p>
					<p>Cannaregio_3672</p>
				</div>
				<div class="right">
					<p>PI_04573870278</p>
					<p>Privacy & Cookies Policy</p>
				</div>
			</div>
			<div class="col"></div>
			<div class="col">
				<div class="left">
					<p class="link" onclick="window.open('https://www.wikipedia.org/')">Facebook</p>
					<p class="link" onclick="window.open('https://www.wikipedia.org/')">Instagram</p>
				</div>
				<div class="right">
					<p class="link" onclick="window.open('mailto:info@spazioberlendis.it')">info@spazioberlendis.it</p>
					<p>T_+39_041_7099560</p>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
