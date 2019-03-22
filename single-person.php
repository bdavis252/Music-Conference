<?php
/**
 * Template for displaying a single person's bio page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package compass
 */
function single_person_head() {
    echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('stylesheet_directory').'/single-person.css">'."\n";
}
add_action('wp_head', 'single_person_head');
get_header(); ?>

<div class="clear"></div>
<div class="page_content">
    <div class="heading_container">
        <p id="crumbs"><a href="https://ohldsmusic.org">Home</a> » <a href="https://ohldsmusic.org/biographies/">Biographies</a> » <span class="current"><?php the_title() ?></span></p>
    </div>
    <div class="grid_17 alpha">
        <div class="content_bar">
            <!-- Start the Loop. -->
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <!--Start post-->
                    <div class="post single">			
                        <h1 class="post_title">
                            <?php 
                                $workshop_ids = get_field('workshop-ids');
                                $performance_ids = get_field('performance-ids');

                                if($workshop_ids[0] > 0 && $performance_ids[0] > 0) {
                                    echo 'Presenter and Performer: ';
                                    the_title(); 
                                }
                                else if ($workshop_ids[0] > 0) {
                                    echo 'Presenter: ';
                                    the_title(); 
                                }
                                else if ($performance_ids[0] > 0) {
                                    echo 'Performer: ';
                                    the_title(); 
                                }
                                else {
                                    the_title(); 
                                }
                            ?>
                        </h1>
                        
                        <div class="bio-container">
                            <span class="bio-photo"><?php the_post_thumbnail( 'medium' ); ?></span>
                            <!-- <img class="bio-photo" src="<?php the_field('photo'); ?>" /> -->
                            <!-- <?php get_the_post_thumbnail(get_the_ID(), array(96,96)) ?> -->
                            <span class="bio"><?php the_field('bio'); ?></span>
                        </div>

                        <div style="clear:left;">&nbsp;</div>
                        
                        <?php 
                            if($workshop_ids[0] > 0) {
                                echo '<div class="workshop_info">';
                                echo '<div class="workshop_header">Workshop Information</div>';
                                foreach ($workshop_ids as $workshop_id) {
                                    $workshop_name = get_the_title($workshop_id);
                                    $workshop_link = get_the_permalink($workshop_id);
                                    $workshop_session = get_field('session', $workshop_id);
                                    $workshop_location = get_field('room', $workshop_id);
                                    echo '<div class="workshop_title">';
                                        echo '<a href="' .$workshop_link. '">' .$workshop_name. '</a>';
                                    echo '</div>';
                                    echo '<div class="workshop_details">';
                                        echo '<a href="' . get_site_url(). '/schedule/">Session: ' .$workshop_session. ', Room: ' .$workshop_location. '</a>';
                                    echo '</div>';
                                }
                                echo '</div>';
                            }
                        ?>
                        
                        <?php 
                        if($performance_ids[0] > 0) {
                            echo '<div class="performance_info">';
                                echo '<div class="performance_header">Performance Information</div>';
                                foreach ($performance_ids as $performance_id) {
                                    $performance_name = get_the_title($performance_id);
                                    $performance_link = get_the_permalink($performance_id);
                                    $performance_session = get_field('session', $performance_id);
                                    echo '<div class="performance_title">';
                                        echo '<a href="' .$performance_link. '">' .$performance_name. '</a>';
                                    echo '</div>';
                                    echo '<div class="performance_details">';
                                        echo '<a href="' . get_site_url(). '/schedule/">Session: ' .full_performance_session($performance_session).'</a>';
                                    echo '</div>';
                                }
                            echo '</div>';
                        }
                    ?>
					
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
            <nav id="nav-single">
                <span class="nav-previous">
                    <?php previous_post_link('&laquo; %link'); ?>
                </span> 
                <span class="nav-next">
                    <?php next_post_link('%link &raquo;'); ?>
                </span> 
            </nav>
        </div>
    </div>
</div>
<?php get_footer();