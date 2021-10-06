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
			<div class="vimeo-wrapper">
				<iframe src="https://player.vimeo.com/video/<?php the_field('video', 21); ?>?background=1&autoplay=1&loop=1&byline=0&title=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
			</div>
		</section>

		<section id="heroIphoneLandscape">
			<div class="vimeo-wrapper">
				<iframe src="https://player.vimeo.com/video/<?php the_field('video', 21); ?>?background=1&autoplay=1&loop=1&byline=0&title=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
			</div>
		</section>

		<video id="showVideo" autoplay muted loop onclick="window.location.href='/welcome/'">
			<source src="/wp-content/uploads/2020/12/Home-Page-Berlendis-PREVIEW.mp4" type="video/mp4">
		</video>

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

			<div class="col" id="sinistra" style="padding: 0 7px; display: block;">
				<div class="section-header">
					<p id="headerCalendar" style="font-size: 14px;">CALENDAR</p>
					<input type="text" id="searchInputCalendar" onkeyup="functionSearchCalendar()" placeholder="CALENDAR">
				</div>

				<ul class="inner" id="newsCalendar">
					<?php
						$today = date('Y-m-d');

						$args = array(
							'posts_per_page' => -1,
							'post_type' => 'post',
							'orderby'			=> 'meta_value',
							'meta_key'			=> 'date',
							'order'				=> 'ASC',
							'meta_query' => array(
								array(
									'key'   => 'todays_event',
									'value' => '1',
									'compare' => '='
								)
							)
						);
						$arr_posts = new WP_Query( $args );
						
						if ( $arr_posts->have_posts() ) :
							
							while ( $arr_posts->have_posts() ) :
								$arr_posts->the_post();
								?>
								<li class="event-<?php the_field('date'); ?>" data-date="<?php the_field('date'); ?>">
									<article class="article-centrale" id="post-<?php the_ID(); ?>">
									<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post-image' );?>
										<div class="post-thumbnail" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat; background-size: cover; background-position: center;"></div>
										<a href="<?php the_permalink(); ?>" target="_blank">
											<div class="event-header" <?php post_class(); ?>>
												<span class="date">
													<?php if( get_field('date_single_title') ): ?>
														<span class="event-author"><?php the_field('date_single_title'); ?></span>
													<?php endif; ?>
													<?php if( get_field('date_start_title') ): ?>
														<span class="event-author"><?php the_field('date_start_title'); ?> — </span>
													<?php endif; ?>
													<?php if( get_field('date_end_title') ): ?>
														<span class="event-author"><?php the_field('date_end_title'); ?></span>
													<?php endif; ?>
													<span class="time">h <?php the_field('time'); ?></span>
												</span>
												<p class="type" style="text-align: right; font-size: 15px; line-height: 17.5px; margin-block-end: 0; flex-grow: 4; pointer-events: none;"><?php the_category( ' ' ); ?></p>
											</div>
											<span class="title" style="padding-left: 10px;"><?php print the_title(); ?></span>
											<div class="summary">
												<span class="paragraph"><?php $summary = get_field('text');
												$pos=strpos($summary, ' ', 200);
												echo substr($summary,0,$pos ); ?></span><span> ...</span>
											</div>
										</a>
									</article>
								</li>
								<?php
							endwhile;
						endif; 
					?>
				</ul>

				<ul class="inner" id="searchCalendar" style="display:none;">
					<?php 
						$today = date('Y-m-d');

						$args = array(
							'posts_per_page' => -1,
							'post_type' => 'post',
							'category__not_in' => 9,
							'orderby'			=> 'meta_value',
							'meta_key'			=> 'date',
							'order'				=> 'ASC',
							'meta_query' => array(
								array(
									'key'   => 'date',
									'value' => $today,
									'compare' => '>'
								)
							)
						);
						$arr_posts = new WP_Query( $args );
						
						if ( $arr_posts->have_posts() ) :
							
							while ( $arr_posts->have_posts() ) :
								$arr_posts->the_post();
								?>
								<a href="<?php the_permalink(); ?>" target="_blank">
									<li class="event-<?php the_field('date'); ?>">
										<article class="article-centrale <?php the_field('type'); ?>" id="post-<?php the_ID(); ?>">
										<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post-image' );?>
											<div class="post-thumbnail" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat; background-size: cover; background-position: center;"></div>
												<div class="event-header" <?php post_class(); ?>>
													<span class="date">
														<?php if( get_field('date_single_title') ): ?>
															<span class="event-author"><?php the_field('date_single_title'); ?></span>
														<?php endif; ?>
														<?php if( get_field('date_start_title') ): ?>
															<span class="event-author"><?php the_field('date_start_title'); ?> — </span>
														<?php endif; ?>
														<?php if( get_field('date_end_title') ): ?>
															<span class="event-author"><?php the_field('date_end_title'); ?></span>
														<?php endif; ?>
														<span class="time">h <?php the_field('time'); ?></span>
													</span>
													<p class="type" style="text-align: right; font-size: 15px; line-height: 17.5px; margin-block-end: 0; flex-grow: 4; pointer-events: none;"><?php the_category( ' ' ); ?></p>
												</div>
												<span class="title" style="padding-left: 10px;"><?php print the_title(); ?></span>
												<div class="summary">
													<span class="paragraph"><?php $summary = get_field('text');
													$pos=strpos($summary, ' ', 200);
													echo substr($summary,0,$pos ); ?></span><span> ...</span>
												</div>
										</article>
									</li>
								</a>
								<?php
							endwhile;
						endif; 
					?>
				</ul>

				<div class="swiper swiperSinistra" id="swiperSinistra">
					<div class="swiper-wrapper">
						<?php
							$args = array(
								'posts_per_page' => -1,
								'post_type' => 'post',
								'orderby'			=> 'meta_value',
								'meta_key'			=> 'date',
								'order'				=> 'ASC'
							);
							$arr_posts = new WP_Query( $args );
							
							if ( $arr_posts->have_posts() ) :
								
								while ( $arr_posts->have_posts() ) :
									$arr_posts->the_post();
									?>
									<div class="show-todays-event swiper-slide event-<?php the_field('date'); ?>" data-date="<?php the_field('date'); ?>" data-date_end="<?php the_field('date_end'); ?>">
										<article style="margin-top: 44px;" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
											<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post-image' );?>
											<div class="post-thumbnail" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat; background-size: cover; background-position: center;"></div>
											<a href="<?php the_permalink(); ?>" target="_blank">
												<div class="event-header" style="display: flex; flex-direction: row; flex-wrap: wrap;">
													<?php if( get_field('date_single_title') ): ?>
														<span class="event-author"><?php the_field('date_single_title'); ?></span>
													<?php endif; ?>
													<?php if( get_field('date_start_title') ): ?>
														<span class="event-author"><?php the_field('date_start_title'); ?> — </span>
													<?php endif; ?>
													<?php if( get_field('date_end_title') ): ?>
														<span class="event-author"><?php the_field('date_end_title'); ?></span>
													<?php endif; ?>
													<?php if( get_field('text_field') ): ?>
													<span class="time">h <?php the_field('time'); ?></span>
													<?php endif; ?>
													<p class="type" style="text-align: right; font-size: 15px; line-height: 17.5px; margin-block-end: 0; flex-grow: 4; pointer-events: none;"><?php the_category( ' ' ); ?></p>
												</div>
											</a>
											<a href="<?php the_permalink(); ?>" target="_blank">
												<span class="title"><?php print the_title(); ?></span>
											</a>
											<div class="summary">
												<a href="<?php the_permalink(); ?>" target="_blank">
													<span class="paragraph"><?php $summary = get_field('text');
													$pos=strpos($summary, ' ', 200);
													echo substr($summary,0,$pos ); ?></span><span> ...</span>
												</a>
											</div>
										</article>
									</div>
									<?php
								endwhile;
							endif; 
						?>
				
					</div>
					<!-- Add Arrows -->
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
			
				</div>
				

				<div id="miniCalendar">
					<?php echo do_shortcode('[clndr id=mini-calendar]'); ?>
				</div>

				<div id="showFooterLeft">
					<div class="toggle-up">
						<svg id="toggleUpLeft" xmlns="http://www.w3.org/2000/svg" width="15.414" height="8.414" viewBox="0 0 15.414 8.414">
							<g id="Group_40" data-name="Group 40" transform="translate(1973.707 -203.293) rotate(90)">
								<line id="Line_3" data-name="Line 3" x1="7" y1="7" transform="translate(204 1966)" fill="none" stroke="#000" stroke-linecap="round" stroke-width="1"/>
								<line id="Line_4" data-name="Line 4" x1="7" y2="7" transform="translate(204 1959)" fill="none" stroke="#000" stroke-linecap="round" stroke-width="1"/>
							</g>
						</svg>
						<span>Info</span>
					</div>
				</div>

				<footer id="colophonLeft" class="site-footer">
					<div class="inner">
						<div class="col">
							<div class="testo1"><?php the_field('testo1', 1478); ?></div>
							<div class="testo2"><?php the_field('testo2', 1478); ?></div>
						</div>
					</div>
				</footer>
				
			</div>

			<div class="col" id="sinistraTemp" style="padding: 0 7px; display: none;">
				<h6 class="header" id="headerAbout">Calendar</h6>
				<div class="coming-soon">
					<?php the_field('temporary_text', 1665); ?>
				</div>
				<div id="showFooterLeftTemp">
					<div class="toggle-up">
						<svg id="toggleUpLeftTemp" xmlns="http://www.w3.org/2000/svg" width="15.414" height="8.414" viewBox="0 0 15.414 8.414">
							<g id="Group_40" data-name="Group 40" transform="translate(1973.707 -203.293) rotate(90)">
								<line id="Line_3" data-name="Line 3" x1="7" y1="7" transform="translate(204 1966)" fill="none" stroke="#000" stroke-linecap="round" stroke-width="1"/>
								<line id="Line_4" data-name="Line 4" x1="7" y2="7" transform="translate(204 1959)" fill="none" stroke="#000" stroke-linecap="round" stroke-width="1"/>
							</g>
						</svg>
						<span>Info</span>
					</div>
				</div>

				<footer id="colophonLeftTemp" class="site-footer">
					<div class="inner">
						<div class="col">
							<div class="testo1"><?php the_field('testo1', 1478); ?></div>
							<div class="testo2"><?php the_field('testo2', 1478); ?></div>
						</div>
					</div>
				</footer>
			</div>

			<div class="col" id="centrale" style="padding: 0 14px;">
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
							'posts_per_page' => -1,
						);
						$arr_posts = new WP_Query( $args );
						
						if ( $arr_posts->have_posts() ) :
							
							while ( $arr_posts->have_posts() ) :
								$arr_posts->the_post();
								?>
								<li>
									<article class="article-centrale" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
										<div class="event-header" style="display: grid; grid-template-columns: 1fr 1fr;">
											<div>
												<span class="title">#<?php print the_title(); ?></span><span class="title">/</span><span class="title"><?php the_time('y'); ?></span>
											</div>
											<p class="type" style="text-align: right; font-size: 15px; line-height: 17.5px; margin-block-end: 0; flex-grow: 4; pointer-events: none;"><?php the_category( ' ' ); ?></p>
										</div>
										<div class="summary">
											<?php the_field('text'); ?>
										</div>
									</article>
								</li>
								<?php
							endwhile;
						endif; 
					?>
				</ul>

				<div id="showFooterCenter">
					<div></div>
				</div>
			</div>
			
			<div class="col" id="destra" style="padding: 0 7px;">
				<h6 class="header" id="headerAbout">About</h6>
				<div class="inner">
					<!-- Swiper -->
					<div class="swiper swiperHome" id="swiperHome">
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
						<!-- Add Arrows -->
						<div class="swiper-button-next"></div>
						<div class="swiper-button-prev"></div>
						<!-- <div class="swiper-pagination"></div> -->
						
					</div>

					<div class="about">
						<?php the_field('about', 21); ?>
					</div>
				</div>

				<div id="showFooterRight">
					<div class="toggle-up">
						<svg id="toggleUpRight" xmlns="http://www.w3.org/2000/svg" width="15.414" height="8.414" viewBox="0 0 15.414 8.414">
							<g id="Group_40" data-name="Group 40" transform="translate(1973.707 -203.293) rotate(90)">
								<line id="Line_3" data-name="Line 3" x1="7" y1="7" transform="translate(204 1966)" fill="none" stroke="#000" stroke-linecap="round" stroke-width="1"/>
								<line id="Line_4" data-name="Line 4" x1="7" y2="7" transform="translate(204 1959)" fill="none" stroke="#000" stroke-linecap="round" stroke-width="1"/>
							</g>
						</svg>
						<span>Contact</span>
					</div>
				</div>

				<footer id="colophonRight" class="site-footer">
					<div class="inner">
						<div class="col">
							<div class="left">
								<p class="link">
									<?php 
									$link = get_field('link_facebook', 1478);
									if( $link ): 
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
										?>
										<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
									<?php endif; ?>
								</p>
								<p class="link">
									<?php 
									$link = get_field('link_instagram', 1478);
									if( $link ): 
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
										?>
										<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
									<?php endif; ?>
								</p>
								<p class="link">
									<?php 
									$link = get_field('link_linkedin', 1478);
									if( $link ): 
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
										?>
										<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
									<?php endif; ?>
								</p>
								<p class="link">
									<?php 
									$link = get_field('link_youtube', 1478);
									if( $link ): 
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
										?>
										<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
									<?php endif; ?>
								</p>
							</div>
							<div class="right">
								<p class="link" onclick="window.open('mailto:<?php the_field('email', 1478); ?>')"><?php the_field('email', 1478); ?></p>
								<p>T <?php the_field('phone', 1478); ?></p>
							</div>
						</div>
						<div class="col">
							<div class="left">
								<p><?php the_field('name', 1478); ?></p>
								<a href="https://goo.gl/maps/Tmcn6TfUCbBbJauPA" target="_blank"><?php the_field('address', 1478); ?></a>
							</div>
							<div class="right">
								<p><?php the_field('vat', 1478); ?></p>
								<a href="<?php the_field('privacy_policy_link', 1478); ?>" target="_blank">Privacy Policy</a>
							</div>
						</div>
					</div>
				</footer>
				
			</div>
			

		</section>

		<section id="centralMobile">

			<div id="accordionTest">

				<a class="section-title-mobile" id="titleMobileOne" href="#one">Calendar</a>
				<div class="col-mobile" id="one" style="display: none;">

					<ul class="inner" id="newsCalendarMobile">
						<?php
							$today = date('Y-m-d');

							$args = array(
								'posts_per_page' => -1,
								'post_type' => 'post',
								'orderby'			=> 'meta_value',
								'meta_key'			=> 'date',
								'order'				=> 'ASC',
								'meta_query' => array(
									array(
										'key'   => 'todays_event',
										'value' => '1',
										'compare' => '='
									)
								)
							);
							$arr_posts = new WP_Query( $args );

							if ( $arr_posts->have_posts() ) :

								while ( $arr_posts->have_posts() ) :
									$arr_posts->the_post();
									?>
									<li class="event-<?php the_field('date'); ?>" data-date="<?php the_field('date'); ?>">
										<article class="article-centrale" id="post-<?php the_ID(); ?>">
										<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post-image' );?>
											<div class="post-thumbnail" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat; background-size: cover; background-position: center;"></div>
											<a href="<?php the_permalink(); ?>" target="_blank">
												<div class="event-header" <?php post_class(); ?>>
													<span class="date">
														<?php if( get_field('date_single_title') ): ?>
															<span class="event-author"><?php the_field('date_single_title'); ?></span>
														<?php endif; ?>
														<?php if( get_field('date_start_title') ): ?>
															<span class="event-author"><?php the_field('date_start_title'); ?> — </span>
														<?php endif; ?>
														<?php if( get_field('date_end_title') ): ?>
															<span class="event-author"><?php the_field('date_end_title'); ?></span>
														<?php endif; ?>
														<span class="time">h <?php the_field('time'); ?></span>
													</span>
													<p class="type" style="text-align: right; font-size: 15px; line-height: 17.5px; margin-block-end: 0; flex-grow: 4; pointer-events: none;"><?php the_category( ' ' ); ?></p>
												</div>
												<span class="title" style="padding-left: 10px;"><?php print the_title(); ?></span>
												<div class="summary">
													<span class="paragraph"><?php $summary = get_field('text');
													$pos=strpos($summary, ' ', 200);
													echo substr($summary,0,$pos ); ?></span><span> ...</span>
												</div>
											</a>
										</article>
									</li>
									<?php
								endwhile;
							endif; 
						?>
					</ul>

					<div class="coming-soon" style="display: none;">
						<?php the_field('temporary_text', 1665); ?>
					</div>

					<div id="showFooterLeftMobile">
						<div class="toggle-up">
							<svg id="toggleUpLeftMobile" xmlns="http://www.w3.org/2000/svg" width="15.414" height="8.414" viewBox="0 0 15.414 8.414">
								<g id="Group_40" data-name="Group 40" transform="translate(1973.707 -203.293) rotate(90)">
									<line id="Line_3" data-name="Line 3" x1="7" y1="7" transform="translate(204 1966)" fill="none" stroke="#000" stroke-linecap="round" stroke-width="1"/>
									<line id="Line_4" data-name="Line 4" x1="7" y2="7" transform="translate(204 1959)" fill="none" stroke="#000" stroke-linecap="round" stroke-width="1"/>
								</g>
							</svg>
							<span>Info</span>
						</div>
					</div>

					<div id="colophonLeftMobile" class="site-footer">
						<div class="inner">
							<div class="col">
								<div class="testo1"><?php the_field('testo1', 1478); ?></div>
								<div class="testo2"><?php the_field('testo2', 1478); ?></div>
							</div>
						</div>
					</div>
				</div>
				
				<a class="section-title-mobile" id="titleMobileTwo" href="#two">News</a>
				<div class="col-mobile" id="two">
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
												<div>
													<span class="title">#<?php print the_title(); ?></span><span class="title">/</span><span class="title"><?php the_time('y'); ?></span>
												</div>
												<p class="type" style="text-align: right; font-size: 15px; line-height: 17.5px; margin-block-end: 0;"><?php the_category( ' ' ); ?></p>
											</div>
											<div class="summary">
												<?php the_field('text'); ?>
											</div>
										</article>
									</li>
									<?php
								endwhile;
							endif; 
						?>
					</ul>

					<div id="showFooterCenterMobile"></div>
				</div>
				
				<a class="section-title-mobile first" id="titleMobileThree" href="#three" style="pointer-events: none;">About</a>
				<div class="col-mobile" id="three">
					<div class="inner">
						<!-- Swiper -->
						<div class="swiper swiperHome" id="swiperHome">
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

						<div class="about">
							<?php the_field('about', 21); ?>
						</div>

						<div id="showFooterRightMobile">
							<div class="toggle-up">
								<svg id="toggleUpRightMobile" xmlns="http://www.w3.org/2000/svg" width="15.414" height="8.414" viewBox="0 0 15.414 8.414">
									<g id="Group_40" data-name="Group 40" transform="translate(1973.707 -203.293) rotate(90)">
										<line id="Line_3" data-name="Line 3" x1="7" y1="7" transform="translate(204 1966)" fill="none" stroke="#000" stroke-linecap="round" stroke-width="1"/>
										<line id="Line_4" data-name="Line 4" x1="7" y2="7" transform="translate(204 1959)" fill="none" stroke="#000" stroke-linecap="round" stroke-width="1"/>
									</g>
								</svg>
								<span>Contact</span>
							</div>
						</div>

						<div id="colophonRightMobile" class="site-footer">
							<div class="inner">
								<div class="col">
									<div class="left">
										<p class="link">
											<?php 
											$link = get_field('link_facebook', 1478);
											if( $link ): 
												$link_url = $link['url'];
												$link_title = $link['title'];
												$link_target = $link['target'] ? $link['target'] : '_self';
												?>
												<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
											<?php endif; ?>
										</p>
										<p class="link">
											<?php 
											$link = get_field('link_instagram', 1478);
											if( $link ): 
												$link_url = $link['url'];
												$link_title = $link['title'];
												$link_target = $link['target'] ? $link['target'] : '_self';
												?>
												<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
											<?php endif; ?>
										</p>
										<p class="link">
											<?php 
											$link = get_field('link_linkedin', 1478);
											if( $link ): 
												$link_url = $link['url'];
												$link_title = $link['title'];
												$link_target = $link['target'] ? $link['target'] : '_self';
												?>
												<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
											<?php endif; ?>
										</p>
										<p class="link">
											<?php 
											$link = get_field('link_youtube', 1478);
											if( $link ): 
												$link_url = $link['url'];
												$link_title = $link['title'];
												$link_target = $link['target'] ? $link['target'] : '_self';
												?>
												<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
											<?php endif; ?>
										</p>
									</div>
									<div class="right">
									<p class="link" onclick="window.open('mailto:<?php the_field('email', 1478); ?>')"><?php the_field('email', 1478); ?></p>
									<p>T <?php the_field('phone', 1478); ?></p>
									</div>
								</div>
								<div class="col">
									<div class="left">
										<p><?php the_field('name', 1478); ?></p>
										<a href="https://goo.gl/maps/Tmcn6TfUCbBbJauPA" target="_blank"><?php the_field('address', 1478); ?></a>
									</div>
									<div class="right">
										<p><?php the_field('vat', 1478); ?></p>
										<a href="<?php the_field('privacy_policy_link', 1478); ?>" target="_blank">Privacy Policy</a>
									</div>
								</div>
							</div>
						</div>
						
					</div>
					
				</div>

				</div>
			
		</section>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
