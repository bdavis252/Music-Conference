<?php

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

$show_navigation = get_post_meta( get_the_ID(), '_et_pb_project_nav', true );

?>

<div id="main-content">

<?php if ( ! $is_page_builder_used ) : ?>

	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">

<?php endif; ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php if ( ! $is_page_builder_used ) : ?>
					
					<?php
					$workshop_track = get_field('track');
	  				$workshop_session = get_field('session');
	  				$workshop_location = get_field('room_location_code');
					$room_locations = array('TBD' => 'TBD', 'CH' => 'Chapel', 'RS' => 'Relief Society Room', 'YW' => 'Young Women\'s Room', 'PR' => 'Primary Room', 'NR' => 'Nursery Room', 'HC' => 'High Council Room');
					$workshop_times = array(
						'Session 1' => '10:10AM–11:00AM',
						'Session 2' => '11:10AM–12:00PM',
						'Session 3' => '1:10PM–2:00PM',
						'Session 4' => '2:10PM–3:00PM',
					);
					?>

					<div class="et_main_title">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<div class="workshop_page_workshop_details">
							<a href="https://ohioldsmusic.org/schedule/#<?=str_replace(',','',str_replace(' ','',strtolower($workshop_track)))?>"><?=$workshop_track?></a> | <?=$workshop_session.' ('.$workshop_times[$workshop_session].')'?> | <?=$workshop_location?> (<?=$room_locations[$workshop_location]?>)
						</div>
						<span class="et_project_categories"><?php echo get_the_term_list( get_the_ID(), 'project_category', '', ', ' ); ?></span>
					</div>
					<div class="presenter_page_workshop_info">
						<?php
						$presenter_ids = get_field('presenter_ids');
						$presenter_set = explode(',',$presenter_ids);
						?>
						<div class="presenter_page_workshop_header">2018 Presenter Information</div>
						<?php foreach ($presenter_set as $presenter_id): 
							$presenter_name = get_the_title($presenter_id);
	  						$presenter_link = get_the_permalink($presenter_id);
							if ( has_post_thumbnail($presenter_id) )
								$presenter_thumb = get_the_post_thumbnail($presenter_id, array(64,64));
								else
									$presenter_thumb = '<img src="https://ohioldsmusic.org/wp-content/uploads/sites/12/2018/02/No-Photo.png" width="64" height="64">';
						?>
						<div class="workshop_page_presenter_box">
							<div class="workshop_page_presenter_image">
								<a href="<?=$presenter_link?>"><?=$presenter_thumb?></a>
							</div>
							<div class="workshop_page_presenter_details">
								<a href="<?=$presenter_link?>"><?=$presenter_name?></a>
							</div>
						</div>
						<?php endforeach; ?>
					</div>

				<?php
					$thumb = '';

					$width = (int) apply_filters( 'et_pb_portfolio_single_image_width', 256 );
					$height = (int) apply_filters( 'et_pb_portfolio_single_image_height', 256 );
					$classtext = 'et_featured_image';
					$titletext = get_the_title();
					$thumbnail = get_thumbnail( $width, $height, $classtext, $titletext, $titletext, false, 'Projectimage' );
					$thumb = $thumbnail["thumb"];

					$page_layout = get_post_meta( get_the_ID(), '_et_pb_page_layout', true );

					if ( '' !== $thumb )
						print_thumbnail( $thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, 'alignright presenter_profile_image' );
				?>

				<?php endif; ?>

					<div class="entry-content">
					<?php
						the_content();

						if ( ! $is_page_builder_used )
							wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'Divi' ), 'after' => '</div>' ) );
					?>
					</div> <!-- .entry-content -->

				<?php if ( ! $is_page_builder_used ) : ?>

					<?php //if ( 'et_full_width_page' !== $page_layout ) et_pb_portfolio_meta_box(); ?>

				<?php endif; ?>

				<?php if ( ! $is_page_builder_used || ( $is_page_builder_used && 'on' === $show_navigation ) ) : ?>

					<!--<div class="nav-single clearfix">
						<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . et_get_safe_localization( _x( '&larr;', 'Previous post link', 'Divi' ) ) . '</span> %title' ); ?></span>
						<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . et_get_safe_localization( _x( '&rarr;', 'Next post link', 'Divi' ) ) . '</span>' ); ?></span>
					</div>--><!-- .nav-single -->

				<?php endif; ?>
					
				<div class="presenter_footer_links">
					<a href="https://ohioldsmusic.org/schedule/">See Conference Schedule</a><br/>
					<a href="https://ohioldsmusic.org/presenters/">See All Conference Presenters</a>
					</div>

				</article> <!-- .et_pb_post -->

			<?php
				if ( ! $is_page_builder_used && comments_open() && 'on' == et_get_option( 'divi_show_postcomments', 'on' ) )
					comments_template( '', true );
			?>
			<?php endwhile; ?>

<?php if ( ! $is_page_builder_used ) : ?>

			</div> <!-- #left-area -->

			<?php if ( 'et_full_width_page' === $page_layout ) et_pb_portfolio_meta_box(); ?>

			<?php get_sidebar(); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->

<?php endif; ?>

</div> <!-- #main-content -->

<?php get_footer(); ?>