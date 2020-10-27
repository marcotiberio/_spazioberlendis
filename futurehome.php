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
		</section>

		

		<section id="central">

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'spazioberlendis' ); ?></button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</nav><!-- #site-navigation -->
		
			<div class="col" id="sinistra" style="padding: 0 10px;">
				<div class="section-header">
					<p id="headerCalendar">CALENDAR</p>
					<input type="text" id="searchInputCalendar" onkeyup="functionSearchCalendar()" placeholder="CALENDAR">
				</div>
				<?php 
					$args = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => -1,
						'meta_query' => array(
							array(
								'key'   => 'todays_event',
								'value' => '1',
							)
						)
					);
					$arr_posts = new WP_Query( $args );
					
					if ( $arr_posts->have_posts() ) :
						
						while ( $arr_posts->have_posts() ) :
							$arr_posts->the_post();
							?>
							<a href="<?php the_permalink(); ?>">
							<article style="margin-top: 44px;" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post-image' );?>
								<div class="post-thumbnail" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat; background-size: cover; background-position: center;"></div>
								<div class="event-header" style="display: flex; flex-direction: row; flex-wrap: wrap; width: 100%;">
									<span class="date"><?php the_field('opening'); ?></span>
									<span class="time" style="text-align: right; font-size: 14px; margin-block-end: 0;">h <?php the_field('time'); ?>:00</span>
									<span class="type" style="text-align: right; font-size: 14px; margin-block-end: 0; flex-grow: 4;"><?php the_field('type'); ?></span>
								</div>
								<a href="<?php the_permalink(); ?>">
									<span class="title"><?php print the_title(); ?></span>
								</a>
								<div class="summary">
									<a href="<?php the_permalink(); ?>">
										<span class="paragraph"><?php $summary = get_field('text');
										$pos=strpos($summary, ' ', 300);
										echo substr($summary,0,$pos ); ?></span><span>...</span>
									</a>
								</div>
							</article>
							</a>
							<?php
						endwhile;
					endif; 
				?>

				<div id="miniCalendar">
					<?php echo do_shortcode('[clndr id=mini-calendar]'); ?>
				</div>

				<ul class="inner" id="newsCalendar">
					<?php 
						$args = array(
							'post_type' => 'post',
							'post_status' => 'publish',
							'orderby' => 'date',
							'order' => 'DESC',
							'posts_per_page' => -1,
							'meta_query' => array(
								array(
									'key'   => 'todays_event',
									'value' => '0',
								)
							)
						);
						$arr_posts = new WP_Query( $args );
						
						if ( $arr_posts->have_posts() ) :
							
							while ( $arr_posts->have_posts() ) :
								$arr_posts->the_post();
								?>
								<li>
									<article class="article-centrale <?php the_field('type'); ?>" id="post-<?php the_ID(); ?>">
									<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post-image' );?>
								<div class="post-thumbnail" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat; background-size: cover; background-position: center;"></div>
										<div class="event-header" <?php post_class(); ?>>
											<a href="<?php the_permalink(); ?>">
												<span class="date">&#91;<?php the_field('date'); ?>&#93;</span>
												<span class="time">h <?php the_field('time'); ?>:00</span>
												<span class="title"><?php print the_title(); ?></span>
											</a>
											<p class="type"><?php the_field('type'); ?></p>
										</div>
										<div class="summary">
											<a href="<?php the_permalink(); ?>">
												<p class="paragraph"><?php the_field('summary'); ?></p>
											</a>
										</div>
									</article>
								</li>
								<?php
							endwhile;
						endif; 
					?>
				</ul>
			</div>
			<div class="col" id="centrale" style="padding: 0 20px;">
				<div class="section-header">
					<p id="headerNews">NEWS</p>
					<input type="text" id="searchInputNews" onkeyup="functionSearchNews()" placeholder="NEWS">
				</div>
				<ul class="inner" id="newsList">
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
								<li>
									<article class="article-centrale" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
										<div class="event-header" style="display: grid; grid-template-columns: 1fr 1fr;">
											<a href="<?php the_field('news_link'); ?>" target="_blank">
												<span class="title"><?php print the_title(); ?></span>
											</a>
											<p class="type" style="text-align: right; font-size: 14px; margin-block-end: 0;"><?php the_field('type'); ?></p>
										</div>
										<div class="summary">
											<a href="<?php the_field('news_link'); ?>" target="_blank">
												<?php the_field('text'); ?>
											</a>
										</div>
									</article>
								</li>
								<?php
							endwhile;
						endif; 
					?>
				</ul>
			</div>
			<div class="col" id="destra" style="padding: 0 20px;">
				<h6 class="header" id="headerAbout">About</h6>
				<div class="about">
					<p>Lo Spazio Berlendis è uno spazio dedicato all’arte, ma è anche un luogo di incontri, 
					un laboratorio di idee e una realtà sempre in divenire.
					Il progetto di restaurare questo spazio nasce nel 2019 dalla volontà di tre persone che 
					amano Venezia e l’arte nelle sue molteplici forme: Frédéric Jaeger curatore e collezionista di 
					origine parigina residente a Venezia, ed Emanuela Fadalti e Matilde Cadenti architetti e galleriste veneziane.
					</p>
					<p>
					Lo Spazio Berlendis si trova nel sestiere di Cannaregio, precisamente su Rio dei Mendicanti, 
					ed ha origine dal recupero del fabbricato (ex falegnameria) facente parte del complesso dello 
					Squero Fassi (detto Squero Vecio), il più antico di Venezia.
					In passato la città era ricca di squeri, ossia di piccoli cantieri dove si costruivano e 
					riparavano tipiche imbarcazioni come gondole, pupparini e sandoli.
					</p>
				</div>
				<div class="about" id="hidden">
					<p>Il nome “Berlendis” è legato a quello della corte adiacente, che prende a sua volta 
					il nome da Palazzo Berlendis, caratterizzato da uno stile neoclassico, attribuibile all’architetto 
					veneziano Andrea Tirali.
					</p>
					<p> Con i suoi luminosi 300 mq, le importanti altezze, la luce zenitale, l’accessibilità anche 
					dal Rio dei Mendicanti tramite la porta d’acqua, lo Spazio Berlendis rappresenta un luogo di 
					grande fascino sia per la posizione che per la conformazione dello stesso. 
					L’accurato restauro che, pur nel rispetto della struttura, conferisce al luogo una forte matrice 
					di contemporaneità, lo rende, grazie alle caratteristiche tecnico-impiantistiche, all’ampia capacità 
					espositiva e alla predisposizione ad allestimenti di diverse tipologie, una destinazione particolare 
					e qualificante nella città di Venezia, ideale per accogliere eventi di varia natura: 
					progetti espositivi nell’ambito delle arti visive, dell’architettura , del design , della musica.
					</p>
				</div>
				<p class="read-more" id="readMore" onclick="showabout()">Read More</p>

				<!-- Swiper -->
				<div class="swiper-container" id="swiperHome">
					<div class="swiper-wrapper">
						<?php if( have_rows('swiper', 21) ): ?>
							<?php while( have_rows('swiper', 21) ): the_row(); 

								// Load sub field value.
								$image = get_sub_field('image');
								?>
								
									<div class="swiper-slide" style="background-image: url(<?php echo esc_url( $image['url'] ); ?>);"></div>

							<?php endwhile; ?>
						<?php endif; ?>
					</div>
					<!-- Add Pagination -->
					<div class="swiper-pagination"></div>
				</div>
				
			</div>

		</section>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
