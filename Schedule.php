<?php /* Template Name: Schedule */ ?>

<?php
/**
 * Lists all workshops to create the schedule page.
 */
 get_header(); ?>
<div class="clear"></div>
<div class="page_content">
    <div class="heading_container">
        <?php compass_breadcrumbs(); ?>
    </div>
    <div class="alpha">
        <div class="content_bar">
            <div class="post single">
                <h1 class="post_title"><?php the_title(); ?></h1>
                <ul>
                    <li>8:00 Check-in, On-site Registration, Light Breakfast</li>
                    <li>9:00 Opening Session</li>
                    <li>10:00 First Workshop Session</li>
                    <li>11:00 Second Workshop Session</li>
                    <li>12:00 Lunch and Lunchtime Entertainment</li>
                    <li>1:00 Third Workshop Session</li>
                    <li>1:50 Exit Survey</li>
                    <li>2:00 Music Conference Ends</li>
                    <li>3:00 Endowment Session at the Columbus OH Temple</li>
                </ul>
                <?php
                $openers = get_posts(array(
                    'post_type'			=> 'performance',
                    'posts_per_page'	=> -1,
                    'meta_query' => array(
                        'relation' => 'AND',
                        'query_one' => array(
                            'key' => 'session',
                            'value' => 'opening',
                            'compare' => '='
                        ),
                        'query_two' => array(
                            'key' => 'order',
                        ), 
                    ),
                    'orderby' => 'meta_value_num',
                    'meta_key' => 'order',
                    'order' => 'ASC'
                )); ?>
                <h2>Opening Session</h2>
                <ul>
                    <li>Organ Prelude - Jennifer Jarvis</li>
                    <?php 
                        $post = $openers[0];
                    ?>
                    <li>Instrumental Prelude - <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> (Lawrence Gee) - <a href="https://ohldsmusic.org/person/cami-nelson/" >Cami Nelson</a>, flute soloist, <a href="https://ohldsmusic.org/person/betty-wells/" >Betty Wells</a>, pianist</li>
                    <li>Congregational Conductor - <a href="https://ohldsmusic.org/person/katie-gardner/" >Katie Gardner</a></li>
                    <li>Opening Hymn #72 - “Praise to the Lord”</li>
                    <li>Opening Prayer - TBD</li>
                    <?php 
                        $post = $openers[1];
                    ?>
                    <li>Musical Number - <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> (TBD) - <a href="https://ohldsmusic.org/person/kellene-vaile/" >Kellene Vaile, vocalist, Jennifer Jarvis, pianist</a></li>
                    <li>[Keynote Speaker:  “Honoring Christ“]</li>
                    <?php 
                        $post = $openers[2];
                    ?>
                    <li>Closing Number - <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> from Orpheus and Eurydice (Gluck) - <a href="https://ohldsmusic.org/person/glen-kussow/" >Glen Kussow, violinist</a></li>

                    <?php wp_reset_postdata(); ?>
                </ul>

                <?php
                $lunchtime = get_posts(array(
                    'post_type'			=> 'performance',
                    'posts_per_page'	=> -1,
                    'meta_query' => array(
                        'relation' => 'AND',
                        'query_one' => array(
                            'key' => 'session',
                            'value' => 'lunch',
                            'compare' => '='
                        ),
                        'query_two' => array(
                            'key' => 'order',
                        ), 
                    ),
                    'orderby' => 'meta_value_num',
                    'meta_key' => 'order',
                    'order' => 'ASC'
                )); ?>
                <h2>Lunchtime Entertainment</h2>
                <ul>
                    <?php for($i = 0; $i < count($lunchtime); ++$i):
                        $post = $lunchtime[$i];
                    ?>
                        <li><?php the_field('genre'); ?> - <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> (<?php the_field('composer'); ?>) - 
                            <?php 
                                $performers = get_field('performers');
                                if(count($performers) > 0) {
                                    for($j = 0; $j < count($performers); ++$j) {
                                        $performer = $performers[$j];
                                        $id = $performer->ID;
                                        $performer_name = get_the_title($id);
                                        $performer_link = get_the_permalink($id);
                                        echo '<a href="'.$performer_link.'">'.$performer_name.'</a>';
                                        if ($j < count($performers) -1) {
                                           echo ', ';
                                        }
                                    }
                                }
                            ?>
                        </li>
                    <?php endfor; ?>
                    <?php wp_reset_postdata(); ?>
                </ul>

                <h2>Workshops</h2>
                <?php 

                // get workshops
                $posts = get_posts(array(
                    'post_type'			=> 'workshop',
                    'posts_per_page'	=> -1,
                    'meta_query' => array(
                        'relation' => 'AND',
                        'query_one' => array(
                            'key' => 'room',
                        ),
                        'query_two' => array(
                            'key' => 'session',
                        ), 
                    ),
                    'orderby' => array( 
                        'query_one' => 'ASC',
                        'query_two' => 'ASC',
                    )
                ));
                $session1Only = get_posts(array(
                    'post_type'			=> 'workshop',
                    'posts_per_page'	=> -1,
                    'meta_query' => array(
                        'relation' => 'AND',
                        'query_one' => array(
                            'key' => 'room',
                        ),
                        'query_two' => array(
                            'key' => 'session',
                            'value' => 1,
                            'compare' => '='
                        ), 
                    ),
                    'orderby' => array( 
                        'query_one' => 'ASC',
                        'query_two' => 'ASC',
                    )
                ));
                $session2Only = get_posts(array(
                    'post_type'			=> 'workshop',
                    'posts_per_page'	=> -1,
                    'meta_query' => array(
                        'relation' => 'AND',
                        'query_one' => array(
                            'key' => 'room',
                        ),
                        'query_two' => array(
                            'key' => 'session',
                            'value' => 2,
                            'compare' => '='
                        ), 
                    ),
                    'orderby' => array( 
                        'query_one' => 'ASC',
                        'query_two' => 'ASC',
                    )
                ));
                $session3Only = get_posts(array(
                    'post_type'			=> 'workshop',
                    'posts_per_page'	=> -1,
                    'meta_query' => array(
                        'relation' => 'AND',
                        'query_one' => array(
                            'key' => 'room',
                        ),
                        'query_two' => array(
                            'key' => 'session',
                            'value' => 3,
                            'compare' => '='
                        ), 
                    ),
                    'orderby' => array( 
                        'query_one' => 'ASC',
                        'query_two' => 'ASC',
                    )
                ));

                if( $posts ): ?>
                    <?php 
                        $tracks_per_session = 3;
                    ?>
                    <table class="wp-block-table large_only">
                        <tbody>
                            <tr>
                                <td style="width:10%"></td>
                                <td style="width:30%">Session 1 (9:00 - 9:50 am)</td>
                                <td style="width:30%">Session 2 (10:00 - 10:50 am)</td>
                                <td style="width:30%">Session 3 (1:00 - 1:50 pm)</td>
                            </tr>
                            <?php for($i = 0; $i < count($posts); ++$i):
                                $post = $posts[$i];
                                if ($i % $tracks_per_session == 0) {
                                    echo '<tr>';
                                    echo '<td>'.get_field('room').'</td>';
                                }
                            ?>
                                <td>
                                    <?php 
                                        $presenter = get_field('presenter'); 
                                        if($presenter){
                                            echo '<a class="presenter-title" href="'.$presenter->guid.'">'.$presenter->post_title.'</a>';
                                        }
                                    ?>
                                    <br />
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </td>
                            <?php 
                                if ($i % $tracks_per_session == ($tracks_per_session - 1)) {
                                    echo '</tr>';
                                }
                            ?>
                            <?php endfor; ?>
                        </tbody>
                    </table>

                    <table class="wp-block-table small_only">
                        <tbody>
                            <tr>
                                <td style="width:25%"></td>
                                <td style="width:75%">Session 1 (9:00 - 9:50 am)</td>
                            </tr>
                            <?php for($i = 0; $i < count($session1Only); ++$i):
                                $post = $session1Only[$i];
                                echo '<tr>';
                                echo '<td>'.get_field('room').'</td>';
                            ?>
                                <td>
                                    <?php 
                                        $presenter = get_field('presenter'); 
                                        if($presenter){
                                            echo '<a class="presenter-title" href="'.$presenter->guid.'">'.$presenter->post_title.'</a>';
                                        }
                                    ?>
                                    <br />
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </td>
                            <?php 
                                echo '</tr>';
                            ?>
                            <?php endfor; ?>
                        </tbody>
                    </table>

                    <table class="wp-block-table small_only">
                        <tbody>
                            <tr>
                                <td style="width:25%"></td>
                                <td style="width:75%">Session 2 (10:00 - 10:50 am)</td>
                            </tr>
                            <?php for($i = 0; $i < count($session2Only); ++$i):
                                $post = $session2Only[$i];
                                echo '<tr>';
                                echo '<td>'.get_field('room').'</td>';
                            ?>
                                <td>
                                    <?php 
                                        $presenter = get_field('presenter'); 
                                        if($presenter){
                                            echo '<a class="presenter-title" href="'.$presenter->guid.'">'.$presenter->post_title.'</a>';
                                        }
                                    ?>
                                    <br />
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </td>
                            <?php 
                                echo '</tr>';
                            ?>
                            <?php endfor; ?>
                        </tbody>
                    </table>

                    <table class="wp-block-table small_only">
                        <tbody>
                            <tr>
                                <td style="width:25%"></td>
                                <td style="width:75%">Session 3 (1:00 - 1:50 pm)</td>
                            </tr>
                            <?php for($i = 0; $i < count($session3Only); ++$i):
                                $post = $session3Only[$i];
                                echo '<tr>';
                                echo '<td>'.get_field('room').'</td>';
                            ?>
                                <td>
                                    <?php 
                                        $presenter = get_field('presenter'); 
                                        if($presenter){
                                            echo '<a class="presenter-title" href="'.$presenter->guid.'">'.$presenter->post_title.'</a>';
                                        }
                                    ?>
                                    <br />
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </td>
                            <?php 
                                echo '</tr>';
                            ?>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
                
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>

