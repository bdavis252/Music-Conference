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

                if( $posts ): ?>
                    <?php 
                        $count = 0; 
                        $tracks_per_session = 3;
                    ?>
                    <table class="wp-block-table">
                        <tbody>
                            <tr>
                                <td style="width:10%"></td>
                                <td style="width:30%">Session 1</td>
                                <td style="width:30%">Session 2</td>
                                <td style="width:30%">Session 3</td>
                            </tr>
                            <?php for($i = 0; $i < count($posts); ++$i):
                                $post = $posts[$i];
                                setup_postdata( $post )
                                ?>
                                <?php 
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
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
                
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>


