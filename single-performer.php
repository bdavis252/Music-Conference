<?php
/**
 * Template for displaying all single performers.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Affinity
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

        <?php while ( have_posts() ) : the_post();
            get_template_part( 'components/post/content', get_post_format() );
        endwhile; ?>  <!-- end of The Loop -->
        
        <img class="bio-photo" src="<?php the_field('photo'); ?>" />
        <div class="bio"><?php the_field('bio'); ?></div>

        

        <?php the_post_navigation( array( 'prev_text' => '<span class="title">' . esc_html__( 'Previous presenter', 'affinity' ) . '</span>%title', 'next_text' => '<span class="title">' . esc_html__( 'Next presenter', 'affinity' ) . '</span>%title' ) ); ?>
		</main>
	</div>
<?php
//get_sidebar();
get_footer();
