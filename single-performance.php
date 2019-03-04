<?php
/**
 * Template for displaying a performance.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package compass
 */
get_header(); ?>

<div class="clear"></div>
<div class="page_content">
    <div class="heading_container">
        <p id="crumbs"><a href="https://ohldsmusic.org">Home</a> » <a href="https://ohldsmusic.org/schedule/">Schedule</a> » <span class="current"><?php the_title() ?></span></p>
        <?php //compass_breadcrumbs(); ?>
    </div>
    <div class="grid_17 alpha">
        <div class="content_bar">
            <!-- Start the Loop. -->
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <!--Start post-->
                    <div class="post single">			
                        <h1 class="post_title"><?php the_title(); ?></h1>
                        
                        <!-- <div class="summary">
                            <?php the_field('summary'); ?>
                        </div> -->

                        <div class="performers">
                            <?php 
                                $performers = get_field('performers');
                                if(count($performers) > 0) {
                                    echo 'Performed by: ';
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
                                echo '<br />Genre: '.get_field('genre');
                                echo '<br />Composer: '.get_field('composer');
                                echo '<br />Session: '.full_performance_session(get_field('session'));
                            ?>
                            
                        </div>
					
                    </div>
                <?php endwhile;
            else:
                ?>
                <div class="post">
                    <p>
    <?php echo SORRY_NO_POST_MATCHED; ?>
                    </p>
                </div>
<?php endif; ?>
            <!--End Post-->	
            <div class="clear"></div>
            <nav id="nav-single"> <span class="nav-previous">
                    <?php previous_post_link('&laquo; %link'); ?>
                </span> <span class="nav-next">
<?php next_post_link('%link &raquo;'); ?>
                </span> </nav>
        </div>
    </div>
</div>
<?php get_footer();