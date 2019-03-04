<?php
/**
 * Template for displaying all single workshops.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package compass
 */

get_header(); ?>
<div class="clear"></div>
<div class="page_content">
    <div class="heading_container">
        <?php compass_breadcrumbs(); ?>
    </div>
    <div class="grid_17 alpha">
        <div class="content_bar">
            <!-- Start the Loop. -->
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <!--Start post-->
                    <div class="post single">			
                        <h1 class="post_title"><?php the_title(); ?></h1>
                        
                        <div class="summary">
                            <?php the_field('summary'); ?>
                        </div>

                        <div class="presenter">
                            <?php 
                                $presenter = get_field('presenter'); 
                                if($presenter){
                                    echo 'Presented by: <a class="presenter-title" href="'.$presenter->guid.'">'.$presenter->post_title.'</a>';
                                }
                                echo '<br />Room: '.get_field('room');
                                echo '<br />Time: '.session_to_time(get_field('session')).' (Session '.get_field('session').')';
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