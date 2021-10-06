<div class="col-mobile" id="one" style="display: none;">

    <ul class="inner" id="newsCalendarMobile">
        <?php 
            $today = date('Ymd');

            $args = array(
                'posts_per_page' => -1,
                'post_type' => 'post',
                'category__not_in' => 9
                // 'orderby'			=> 'meta_value',
                // 'meta_key'			=> 'date',
                // 'order'				=> 'ASC',
                // 'meta_query' => array(
                // 	array(
                // 		'key'   => 'date',
                // 		'value' => $today,
                // 		'compare' => '>'
                // 	)
                // )
            );
            $arr_posts = new WP_Query( $args );
            
            if ( $arr_posts->have_posts() ) :
                
                while ( $arr_posts->have_posts() ) :
                    $arr_posts->the_post();
                    ?>
                    <li>
                        <article class="article-centrale <?php the_field('type'); ?>" id="post-<?php the_ID(); ?>">
                            <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post-image' );?>
                            <a href="<?php the_permalink(); ?>" target="_blank">
                                <div class="post-thumbnail" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat; background-size: cover; background-position: center;"></div>
                            </a>
                            <div class="post-info">
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
                                        <span class="time">h <?php the_field('time'); ?></span>
                                        <p class="type" style="text-align: right; font-size: 15px; line-height: 17.5px; margin-block-end: 0; flex-grow: 4; pointer-events: none;"><?php the_category( ' ' ); ?></p>
                                    </div>
                                </a>
                                <a href="<?php the_permalink(); ?>" target="_blank">
                                    <span class="title"><?php print the_title(); ?></span>
                                </a>
                                <?php if( get_field('summary') ): ?>
                                    <div class="summary">
                                        <a href="<?php the_permalink(); ?>" target="_blank">
                                            <span class="paragraph"><?php $summary = get_field('text');
                                            $pos=strpos($summary, ' ', 200);
                                            echo substr($summary,0,$pos ); ?></span><span>...</span>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </article>
                    </li>
                    <?php
                endwhile;
            endif; 
        ?>
    </ul>

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