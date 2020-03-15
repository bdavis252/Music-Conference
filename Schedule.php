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
                    <li>8:00 Check-in / On-site Registration / Light Breakfast</li>
                    <li>9:00 Opening Session / Keynote Speaker / Special Music</li>
                    <li>10:00 First Class Session</li>
                    <li>11:00 Second Class Session</li>
                    <li>12:00 Lunch / Lunchtime Entertainment</li>
                    <li>1:00 Third Class Session</li>
                    <li>2:00 Fourth Class Session</li>
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
                    <!-- <li>Organ Prelude - <a href="https://ohldsmusic.org/person/kevin-stephenson/" >Kevin Stephenson</a></li> -->
                    <?php 
                        $post = $openers[0];
                    ?>
                    <li>Instrumental Prelude - <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> (McDonald) - <a href="https://ohldsmusic.org/person/emily-whitehead/" >Emily Whitehead</a>, pianist</li>
                    <!--<li>Congregational Conductor - <a href="https://ohldsmusic.org/person/katie-gardner/" >Katie Gardner</a></li>-->
                    <!-- <li>Opening Hymn #72 - “Praise to the Lord”</li> -->
                    <!-- <li>Opening Prayer - TBD</li> -->
                    <?php 
                        $post = $openers[1];
                    ?>
                    <li>Vocal Number - <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> (DeFord) - <a href="https://ohldsmusic.org/person/carissa-barron/" >Carissa Barron</a>, vocalist, <a href="https://ohldsmusic.org/person/julie-drogowski/">Julie Drogowski</a>, pianist</li>
                    <li>Keynote Speaker:  <!--<a href="https://ohldsmusic.org/performance/honoring-christ/">Honoring Christ</a> - <a href="https://ohldsmusic.org/person/mayde-robertson/">Mayde Robertson</a>-->Announced in Summer</li>
                    <?php 
                        $post = $openers[2];
                    ?>
                    <li>Piano Duet - <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> (Wiberg) - <a href="https://ohldsmusic.org/person/mayde-robertson/" >Mayde Robertson</a> & <a href="https://ohldsmusic.org/person/janell-wiberg/" >Janell Wiberg</a></li>

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
                    <?php 
                        // Operetta: Refrain Audacious tar
                        $post = $lunchtime[0];
                        $performers = get_field('performers');
                    ?>
                    <li><?php the_field('genre'); ?> - <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> (<?php the_field('composer'); ?>) - 
                        <?php 
                            for($j = 0; $j < count($performers)-1; ++$j) {
                                $performer = $performers[$j];
                                $id = $performer->ID;
                                $performer_name = get_the_title($id);
                                $performer_link = get_the_permalink($id);
                                echo '<a href="'.$performer_link.'">'.$performer_name.'</a>';
                                if ($j < count($performers) -1) {
                                    echo ', ';
                                }
                            }
                            echo 'vocalists, ';
                            $performer = $performers[2];
                            $id = $performer->ID;
                            $performer_name = get_the_title($id);
                            $performer_link = get_the_permalink($id);
                            echo '<a href="'.$performer_link.'">'.$performer_name.'</a>, pianist';
                        ?>
                    </li>
                    
                    <?php 
                        // Spanish Guitar: Sons de Carrilhoes
                        $post = $lunchtime[1];
                        $performers = get_field('performers');
                    ?>
                    <li><?php the_field('genre'); ?> - <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> (<?php the_field('composer'); ?>) - 
                        <?php 
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
                            echo ', solo guitarist'
                        ?>
                    </li>
                    
                    <?php 
                        // Japanese: Lullaby of Takeda
                        $post = $lunchtime[2];
                        $performers = get_field('performers');
                    ?>
                    <li><?php the_field('genre'); ?> - <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> (<?php the_field('composer'); ?>) - 
                        <?php 
                            $performer = $performers[0];
                            $id = $performer->ID;
                            $performer_name = get_the_title($id);
                            $performer_link = get_the_permalink($id);
                            echo '<a href="'.$performer_link.'">Noriko Handy</a>, ';
                            echo '<a href="'.$performer_link.'">Maria Takamasa</a>, ';
                            echo '<a href="'.$performer_link.'">Tomoko Seino</a>, vocalists, ';
                            echo '<a href="'.$performer_link.'">Yuko Rader</a>, pianist';
                            //echo ' (<a href="'.$performer_link.'">'.$performer_name.'</a>)';
                        ?>
                    </li>

                    <?php 
                        // Untold Story Greg Coons Mayde
                        $post = $lunchtime[3];
                        $performers = get_field('performers');
                    ?>
                    <li><?php the_field('genre'); ?> - <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> (<?php the_field('composer'); ?>) - 
                        <?php 
                            $performer = $performers[0];
                            $id = $performer->ID;
                            $performer_name = get_the_title($id);
                            $performer_link = get_the_permalink($id);
                            echo '<a href="'.$performer_link.'">'.$performer_name.'</a>, hornist, ';
                            $performer = $performers[1];
                            $id = $performer->ID;
                            $performer_name = get_the_title($id);
                            $performer_link = get_the_permalink($id);
                            echo '<a href="'.$performer_link.'">'.$performer_name.'</a>, pianist';
                        ?>
                    </li>
                    
                    <?php 
                        // Art Song: Gretchen am Spinrade
                        $post = $lunchtime[4];
                        $performers = get_field('performers');
                    ?>
                    <li><?php the_field('genre'); ?> - <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> (<?php the_field('composer'); ?>) - 
                        <?php 
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
                            echo ', vocalist';
                        ?>
                    </li>
                    
                    <?php 
                        // Baroque Ragtime G String Maple Leaf
                        $post = $lunchtime[5];
                        $performers = get_field('performers');
                    ?>
                    <li><?php the_field('genre'); ?> - <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> (<?php the_field('composer'); ?>) - 
                        <?php 
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
                            echo ', brass duo';
                        ?>
                    </li>

                    <?php 
                        // Broadway: Wonderful day
                        $post = $lunchtime[6];
                        $performers = get_field('performers');
                    ?>
                    <li><?php the_field('genre'); ?> - <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> (<?php the_field('composer'); ?>) - 
                    <?php 
                            $performer = $performers[0];
                            $id = $performer->ID;
                            $performer_name = get_the_title($id);
                            $performer_link = get_the_permalink($id);
                            echo '<a href="'.$performer_link.'">'.$performer_name.'</a>, vocalist, ';
                            $performer = $performers[1];
                            $id = $performer->ID;
                            $performer_name = get_the_title($id);
                            $performer_link = get_the_permalink($id);
                            echo '<a href="'.$performer_link.'">'.$performer_name.'</a>, pianist';
                        ?>
                    </li>
                    
                    <?php 
                        // Early Modern Andante Festivo
                        $post = $lunchtime[7];
                        $performers = get_field('performers');
                    ?>
                    <li><?php the_field('genre'); ?> - <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> (<?php the_field('composer'); ?>) - 
                        <?php 
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
                            echo ', string quartet'
                        ?>
                    </li>
                    
                    <?php 
                        // American Folksong Old Dan Tucker
                        $post = $lunchtime[8];
                        $performers = get_field('performers');
                    ?>
                    <li><?php the_field('genre'); ?> - <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> (<?php the_field('composer'); ?>) - 
                        <?php 
                            for($j = 0; $j < count($performers) - 1; ++$j) {
                                $performer = $performers[$j];
                                $id = $performer->ID;
                                $performer_name = get_the_title($id);
                                $performer_link = get_the_permalink($id);
                                echo '<a href="'.$performer_link.'">'.$performer_name.'</a>';
                                if ($j < count($performers) -2) {
                                    echo ', ';
                                }
                            }
                            echo ', vocalists, ';
                            $performer = $performers[4];
                            $id = $performer->ID;
                            $performer_name = get_the_title($id);
                            $performer_link = get_the_permalink($id);
                            echo '<a href="'.$performer_link.'">'.$performer_name.'</a>, pianist';
                        ?>
                    </li>
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
                $session4Only = get_posts(array(
                    'post_type'			=> 'workshop',
                    'posts_per_page'	=> -1,
                    'meta_query' => array(
                        'relation' => 'AND',
                        'query_one' => array(
                            'key' => 'room',
                        ),
                        'query_two' => array(
                            'key' => 'session',
                            'value' => 4,
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
                        $sessions_per_track = 4;
                    ?>
                    <table class="wp-block-table large_only">
                        <tbody>
                            <tr>
                                <td style="width:12%"></td>
                                <td style="width:22%">Session 1 (10:00 - 10:50 am)</td>
                                <td style="width:22%">Session 2 (11:00 - 11:50 am)</td>
                                <td style="width:22%">Session 3 (1:00 - 1:50 pm)</td>
                                <td style="width:22%">Session 4 (2:00 - 2:50 pm)</td>
                            </tr>
                            <?php for($i = 0; $i < count($posts); ++$i):
                                $post = $posts[$i];
                                if ($i % $sessions_per_track == 0) {
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
                                    <br />
                                    <?php 
                                        $track = get_field('track'); 
                                        if($track){
                                            echo '<p style="margin-bottom:0;">('.$track.')</p>';
                                        }

                                        $levels = get_field('level');
                                        if ($levels){
                                            echo '<p>';
                                            for($j = 0; $j < count($levels); ++$j){
                                                $level = $levels[$j];
                                                echo $level;
                                                if ($j < count($levels) -1) {
                                                    echo ', ';
                                                }
                                            }
                                            echo '</p>';
                                        }
                                    ?>
                                </td>
                            <?php 
                                if ($i % $sessions_per_track == ($sessions_per_track - 1)) {
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
                                <td style="width:75%">Session 1 (10:00 - 10:50 am)</td>
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
                                    <br />
                                    <?php 
                                        $track = get_field("track"); 
                                        if($track){
                                            echo '<p style="margin-bottom:0;">('.$track.')</p>';
                                        }

                                        $levels = get_field('level');
                                        if ($levels){
                                            echo '<p>';
                                            for($j = 0; $j < count($levels); ++$j){
                                                $level = $levels[$j];
                                                echo $level;
                                                if ($j < count($levels) -1) {
                                                    echo ', ';
                                                }
                                            }
                                            echo '</p>';
                                        }
                                    ?>
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
                                <td style="width:75%">Session 2 (11:00 - 11:50 am)</td>
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
                                    <br />
                                    <?php 
                                        $track = get_field("track"); 
                                        if($track){
                                            echo '<p style="margin-bottom:0;">('.$track.')</p>';
                                        }

                                        $levels = get_field('level');
                                        if ($levels){
                                            echo '<p>';
                                            for($j = 0; $j < count($levels); ++$j){
                                                $level = $levels[$j];
                                                echo $level;
                                                if ($j < count($levels) -1) {
                                                    echo ', ';
                                                }
                                            }
                                            echo '</p>';
                                        }
                                    ?>
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
                                    <br />
                                    <?php 
                                        $track = get_field("track"); 
                                        if($track){
                                            echo '<p style="margin-bottom:0;">('.$track.')</p>';
                                        }

                                        $levels = get_field('level');
                                        if ($levels){
                                            echo '<p>';
                                            for($j = 0; $j < count($levels); ++$j){
                                                $level = $levels[$j];
                                                echo $level;
                                                if ($j < count($levels) -1) {
                                                    echo ', ';
                                                }
                                            }
                                            echo '</p>';
                                        }
                                    ?>
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
                                <td style="width:75%">Session 4 (2:00 - 2:50 pm)</td>
                            </tr>
                            <?php for($i = 0; $i < count($session4Only); ++$i):
                                $post = $session4Only[$i];
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
                                    <br />
                                    <?php 
                                        $track = get_field("track"); 
                                        if($track){
                                            echo '<p style="margin-bottom:0;">('.$track.')</p>';
                                        }

                                        $levels = get_field('level');
                                        if ($levels){
                                            echo '<p>';
                                            for($j = 0; $j < count($levels); ++$j){
                                                $level = $levels[$j];
                                                echo $level;
                                                if ($j < count($levels) -1) {
                                                    echo ', ';
                                                }
                                            }
                                            echo '</p>';
                                        }
                                    ?>
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


