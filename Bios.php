<?php /* Template Name: Bios */ ?>

<?php
/**
 * Lists all the bios.
 */
function bios_head() {
    echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('stylesheet_directory').'/bios.css">'."\n";
}
add_action('wp_head', 'bios_head');
 get_header(); ?>
<div class="clear"></div>
<div class="page_content">
    <div class="heading_container">
        <?php compass_breadcrumbs(); ?>
    </div>
    <div class="alpha">
        <div class="content_bar">
            <div class="post single">
                <div class="column left">
                    <h1 class="post_title">Presenters</h1>
                    <?php 

                    // get all people who have a value set for workshop ids
                    $posts = get_posts(array(
                        'post_type'			=> 'person',
                        'posts_per_page'	=> -1,
                        'meta_query' => array(
                            array(
                                'key' => 'workshop-ids',
                                'value' => '',
                                'compare' => '!='
                            )
                        ),
                        'orderby'    => 'title',
                        'order'      => 'ASC',
                    ));

                    if( $posts ): ?>
                        <ul>
                            <?php for($i = 0; $i < count($posts); ++$i):
                                $post = $posts[$i];
                                setup_postdata( $post );
                                ?>
                                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                            <?php endfor; ?>
                        </ul>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
                <div class="column right">
                    <h1 class="post_title">Performers</h1>
                    <?php 

                    // get all people who have a value set for performance ids
                    $posts = get_posts(array(
                        'post_type'			=> 'person',
                        'posts_per_page'	=> -1,
                        'meta_query' => array(
                            array(
                                'key' => 'performance-ids',
                                'value' => '',
                                'compare' => '!='
                            )
                        ),
                        'orderby'    => 'title',
                        'order'      => 'ASC',
                    ));

                    if( $posts ): ?>
                        <ul>
                            <?php for($i = 0; $i < count($posts); ++$i):
                                $post = $posts[$i];
                                setup_postdata( $post );
                                ?>
                                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                            <?php endfor; ?>
                        </ul>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
                <div class="clear:both;"></div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>


