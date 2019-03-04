<?php
/**
 * Template for displaying all single presenters.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package compass
 */
function single_presenter_head() {
    echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('stylesheet_directory').'/single-presenter.css">'."\n";
}
add_action('wp_head', 'single_presenter_head');
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
                        
                        <div class="bio-container">
                            <img class="bio-photo" src="<?php the_field('photo'); ?>" />
                            <span class="bio"><?php the_field('bio'); ?></span>
                        </div>

                        <?php 
                            $workshop_ids = get_field('workshop-ids');
                            if(count($workshop_ids) > 0) {
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
                        $performance_ids = get_field('performance-ids');
                        if(count($performance_ids) > 0) {
                            echo '<div class="performance_info">';
                                echo '<div class="performance_header">Performance Information</div>';
                                foreach ($performance_ids as $performance_id) {
                                    $performance_name = get_the_title($performance_id);
                                    $performance_link = get_the_permalink($performance_id);
                                    $performance_session = get_field('session', $performance_id);
                                    $performance_location = get_field('room', $performance_id);
                                    echo '<div class="performance_title">';
                                        echo '<a href="' .$performance_link. '">' .$performance_name. '</a>';
                                    echo '</div>';
                                    echo '<div class="performance_details">';
                                        echo '<a href="' . get_site_url(). '/schedule/">Session: ' .$performance_session. ', Room: ' .$performance_location. '</a>';
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
            <nav id="nav-single"> <span class="nav-previous">
                    <?php previous_post_link('&laquo; %link'); ?>
                </span> <span class="nav-next">
<?php next_post_link('%link &raquo;'); ?>
                </span> </nav>
        </div>
    </div>
</div>
<?php get_footer();