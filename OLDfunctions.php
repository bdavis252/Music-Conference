<?php
function my_theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

// //[show_presenters]
// function show_presenters_func( $atts ){
	
// 	$presenter_data = "";
	
// 	$presenter_data .= '<div class="presenter_two_cols"><div class="presenter_left_col">';
// 	$presenter_count = 0;
// 	$total_presenters = 0;
	
// 	$args = array( 'post_type' => 'presenter', 'order' => 'ASC', 'orderby' => 'title', 'posts_per_page' => '-1' );
//     $loop = new WP_Query( $args );
//     while ( $loop->have_posts() ) : $loop->the_post();
// 		$total_presenters++;
// 		endwhile;
	
// 	$args = array( 'post_type' => 'presenter', 'order' => 'ASC', 'orderby' => 'title', 'posts_per_page' => '-1' );
//     $loop = new WP_Query( $args );
//     while ( $loop->have_posts() ) : $loop->the_post();
// 	  if (has_post_thumbnail()) :
// 	     $presenter_image = get_the_post_thumbnail(get_the_ID(), array(96,96));
// 	     else :
// 	        $presenter_image = '<img src="http://ohldsmusic.org/wp-content/uploads/2018/12/No-Photo.png">';
// 	        endif;
	
// 	  $presenter_data .= '<div class="presenter_container">
// 	     <div class="presenter_image"><a href="'.get_the_permalink().'">'.$presenter_image.'</a></div>
// 		 <div class="presenter_info">';
// 	  $presenter_data .= '<div class="presenter_name"><a href="'.get_the_permalink().'">'.get_the_title().'</a></div>';
	
// 	if ($workshop_ids = get_field('2018_workshop_ids')) :
// 	  	$workshop_set = explode(',',$workshop_ids);

// 		foreach ($workshop_set as $workshop_id) :
// 			$workshop_name = get_the_title($workshop_id);
// 	     	$workshop_link = get_the_permalink($workshop_id);
// 			$workshop_track = get_field('track', $workshop_id);
// 	     	$workshop_session = get_field('session', $workshop_id);
// 	     	$workshop_location = get_field('room_location_code', $workshop_id);
// 			$presenter_data .= '<div class="presenter_workshop_info">';
// 	  		$presenter_data .= '<a href="'.$workshop_link.'">"'.$workshop_name.'"</a><br/>';
// 			$presenter_data .= '<span class="presenter_workshop_track"><a href="https://ohioldsmusic.org/schedule/#'.strtolower(str_replace(array(' ',','),'',$workshop_track)).'">'.$workshop_track.'</a></span>';
// 			$presenter_data .= '<span class="presenter_workshop_session"> | '.$workshop_session.'</span>';
// 			//$presenter_data .= '<span class="presenter_workshop_location"> | '.$workshop_location.'</span>';
// 			$presenter_data .= '</div>';
// 			endforeach;
	
// 		endif;
	
// 	if ($performance_ids = get_field('2018_performance_ids')) :
// 	  	$performance_set = explode(',',$performance_ids);

// 		foreach ($performance_set as $performance_id) :
// 			$performance_name = get_the_title($performance_id);
// 	     	$performance_link = get_the_permalink($performance_id);
// 	     	$performance_session = get_field('session', $performance_id);
// 			$performance_composer = get_field('composer', $performance_id);
// 			$presenter_data .= '<div class="presenter_workshop_info">';
// 	  		$presenter_data .= '<span class="performance_info">'.$performance_name.'</span>';
// 			if ($performance_composer)
// 				$presenter_data .= ' ('.$performance_composer.')';
// 			$presenter_data .= '<br/>';
// 			$presenter_data .= '<span class="presenter_workshop_track"><a href="';
// 			if ($performance_session == 'Opening Session')
// 				$presenter_data .= 'https://ohioldsmusic.org/schedule/#top';
// 				else
// 					$presenter_data .= 'https://ohioldsmusic.org/lunchtime-entertainment/';
// 			$presenter_data .= '">'.$performance_session.'</a></span>';
// 			//$presenter_data .= '<span class="presenter_workshop_location"> | '.$workshop_location.'</span>';
// 			$presenter_data .= '</div>';
// 			endforeach;
	
// 		endif;
	
// 	  $presenter_data .= '</div></div>';
	
// 	  $presenter_count++;
// 	  if ($presenter_count==ceil($total_presenters/2))
// 		  $presenter_data .= '</div><div class="presenter_right_col">';
	
//     endwhile;
	
// 	$presenter_data .= '</div></div>';
	
// 	return $presenter_data;
// }
// add_shortcode( 'show_presenters', 'show_presenters_func' );

// //[show_schedule]
// function show_schedule_func( $atts ){
// 	$show_schedule_data = '';
	
// 	$conference_tracks = array('Organists','Pianists','Congregational Conductors','Choir Directors','Choir Members','Composers, Arrangers, Lyricists');
	
// 	$display_type = $_REQUEST["display"];
	
// 	$display_nav_controls='';
	
// 	if ($display_type!="grid") :
// 		$display_nav_controls = 'JUMP TO: ';
// 		$separator = '';
// 		foreach ($conference_tracks as $track) :
// 			$display_nav_controls .= $separator.'<a href="#'.strtolower(str_replace(array(' ',','),'',$track)).'">'.strtoupper($track).'</a> ';
// 			$separator = '| ';
// 			endforeach;
// 		endif;
	
// 	$show_schedule_data .= '<div class="show_schedule_display_controls no_print">';
// 	$show_schedule_data .= '<div class="show_schedule_nav_box">'.$display_nav_controls.'</div>';
// 	$show_schedule_data .= '<div class="show_schedule_control_box"><a href="" onclick="window.print();return false;" class="show_schedule_display_control"><span class="icon_printer_alt"></span></a></div>';
// 	//$show_schedule_data .= '<div class="show_schedule_control_box grid_box"><a href="https://ohioldsmusic.org/schedule/?display=grid" class="show_schedule_display_control"><span class="icon_grid_3x3'.($display_type=="grid" ? ' display_on' : '').'"></span></a></div>';
// 	//$show_schedule_data .= '<div class="show_schedule_control_box"><a href="https://ohioldsmusic.org/schedule/" class="show_schedule_display_control"><span class="icon_menu_square_alt'.($display_type=="grid" ? '' : ' display_on').'"></span></a></div>';
// 	$show_schedule_data .= '</div>';
	
// 	$show_schedule_data .= '<div class="show_list_workshop_row registration_row">REGISTRATION/CHECK-IN • 8:00AM–9:00AM</div>';
	
// 	if ($display_type=="grid") :
	
// 	$show_schedule_data .= '<div class="show_schedule_table">';
	
// 	$show_schedule_data .= '<div class="show_schedule_session_col">
// 		<div class="show_schedule_header_box blank_box">&nbsp;</div>
// 		<div class="show_schedule_session_box">Session 1<br/>10:10AM<br/>11:00AM</div>
// 		<div class="show_schedule_session_box">Session 2<br/>11:10AM<br/>12:00PM</div>
// 		<div class="show_schedule_session_box lunch_box">LUNCH</div>
// 		<div class="show_schedule_session_box">Session 3<br/>1:10PM<br/>2:00PM</div>
// 		<div class="show_schedule_session_box">Session 4<br/>2:10PM<br/>3:00PM</div>
// 		</div>';
	
// 	foreach ($conference_tracks as $track) :
	
// 	$show_schedule_data .= '<div class="show_schedule_col6">';
// 	$show_schedule_data .= '<div class="show_schedule_header_box">'.$track.'</div>';
// 	$box_count = 0;
	
// 		$args = array( 
// 			'post_type' => 'workshop',
// 			'meta_query' => array(
//     	    	'relation' => 'AND',
//     	    	'track_clause' => array(
//     	   	    	'key' => 'track',
// 					'value' => $track,
//     	   	 		),
//     	   	 	'session_clause' => array(
//     	   	    	 'key' => 'session',
//     	  	 	     'compare' => 'EXISTS',
//     	   	 		), 
//     			),
// 			'orderby' => array(
// 				'session_clause' => 'ASC',
// 				),
// 			'posts_per_page' => '-1'
// 		);
//     	$loop = new WP_Query( $args );
//     	while ( $loop->have_posts() ) : $loop->the_post();
	
// 			$box_count++;
	
// 			$session_count = explode(' ', get_field('session'));
// 			$this_session = $session_count[1];
				
// 			while ($box_count<$this_session) :
// 				$show_schedule_data .= '<div class="show_schedule_workshop_box">TBD</div>';
// 				if ($box_count == 2)
// 					$show_schedule_data .= '<div class="show_schedule_workshop_box lunch_box">LUNCH</div>';
// 				$box_count++;
// 				endwhile;
	
// 			$presenter_names = '';
// 			$presenter_comma = '';
	
// 			$presenter_ids = get_field('presenter_ids');
// 			$presenter_name_set = explode(',',$presenter_ids);
// 			foreach ($presenter_name_set as $presenter_name_id) :
// 				$presenter = get_post($presenter_name_id);
// 				$presenter_names .= $presenter_comma.'<a href="'.get_the_permalink($presenter_name_id).'">'.$presenter->post_title.'</a>';
// 				$presenter_comma = ', ';
// 				endforeach;
	
// 			$show_schedule_data .= '<div class="show_schedule_workshop_box">';
// 			$show_schedule_data .= '<div class="show_schedule_workshop_title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></div>';
// 			$show_schedule_data .= '<div class="show_schedule_workshop_names">'.$presenter_names.'</div>';
// 			$show_schedule_data .= '</div>';
	
// 			if ($box_count == 2)
// 				$show_schedule_data .= '<div class="show_schedule_workshop_box lunch_box">LUNCH</div>';
	
// 			endwhile;
	
// 	$show_schedule_data .= '</div>';
	
// 	endforeach;
	
// 	$show_schedule_data .= '</div>';
	
// 	else :
	
// 	$show_schedule_data .= '<div class="show_list_track">Opening Session</div>';
	
// 	$show_schedule_data .= '<div class="show_list_workshop_row">';
// 	$show_schedule_data .= '<div class="show_list_location_box col_short col_left">';
// 	$show_schedule_data .= 'Opening Session<br/><span class="show_list_session_time">9:10AM–10:00AM</span>';
// 	$show_schedule_data .= '</div>';
// 	$show_schedule_data .= '<div class="show_list_workshop_box col_wide">';
// 	$show_schedule_data .= '<div class="show_list_workshop_title support_personnel">';
// 	$show_schedule_data .= 'Congregational Conductor: Darla Cabe<br/>';
// 	$show_schedule_data .= 'Organist: Jennifer Jarvis<br/>';
// 	$show_schedule_data .= '</div>';
// 	$show_schedule_data .= '<div class="show_slist_workshop_names"></div>';
// 	$show_schedule_data .= '</div>';
// 	$show_schedule_data .= '<div class="show_list_location_box col_short col_right">&nbsp;</div>';
// 	$show_schedule_data .= '<div class="show_list_location_box col_short col_right">Chapel</div>';
// 	$show_schedule_data .= '</div>';
	
// 	$os_performance_ids = array(776,783,778,782);
// 	$row_count=1;
	
// 	foreach($os_performance_ids as $os_performance_id) :	
// 		$show_schedule_data .= '<div class="show_list_workshop_row';
// 		if ($row_count==4) $show_schedule_data .= ' bottom_session';
// 		$show_schedule_data .= '">';
// 		$show_schedule_data .= '<div class="show_list_session_box col_short col_left">';
// 		$show_schedule_data .= '&nbsp;';
// 		$show_schedule_data .= '</div>';
// 		$show_schedule_data .= '<div class="show_list_workshop_box col_wide">';
// 		$show_schedule_data .= '<div class="show_list_workshop_title performance_title">'.get_the_title($os_performance_id);
// 		if ($composer = get_field('composer',$os_performance_id))
// 			$show_schedule_data .= ' <span class="composer_title">('.$composer.')</span>';
// 		$show_schedule_data .= '</div>';
		
// 		$presenter_names = '';
// 		$presenter_comma = '';
		
// 		if ($presenter_ids = get_field('performer_ids', $os_performance_id)) :
// 			$presenter_name_set = explode(',',$presenter_ids);
// 			foreach ($presenter_name_set as $presenter_name_id) :
// 				$presenter = get_post($presenter_name_id);
// 				$presenter_names .= $presenter_comma.'<a href="'.get_the_permalink($presenter_name_id).'">'.$presenter->post_title.'</a>';
// 				$presenter_comma = ', ';
// 				endforeach;
// 			else :
// 				$presenter_names = '';
// 				endif;
	
// 		$show_schedule_data .= '<div class="show_list_workshop_names">';
// 		if( '' !== get_post($os_performance_id)->post_content ) 
// 			$show_schedule_data .= get_post($os_performance_id)->post_content;
// 			else
// 				$show_schedule_data .= $presenter_names;
// 		$show_schedule_data .= '</div>';
// 		$show_schedule_data .= '</div>';
// 		$show_schedule_data .= '<div class="show_list_location_box col_short col_right">&nbsp;</div>';
// 		$show_schedule_data .= '</div>';
	
// 		if ($row_count==2) :
// 			$show_schedule_data .= '<div class="show_list_workshop_row">';
// 			$show_schedule_data .= '<div class="show_list_session_box col_short col_left">&nbsp;</div>';
// 			$show_schedule_data .= '<div class="show_list_workshop_box col_wide">';
// 			$show_schedule_data .= '<div class="show_list_workshop_title support_personnel">';
// 			$show_schedule_data .= 'Opening Hymn: #70 Sing Praise to Him<br/>';
// 			$show_schedule_data .= 'Conductor: Troy Thorton<br/>';
// 			$show_schedule_data .= '</div>';
// 			$show_schedule_data .= '<div class="show_slist_workshop_names"></div>';
// 			$show_schedule_data .= '</div>';
// 			$show_schedule_data .= '<div class="show_list_location_box col_short col_right">&nbsp;</div>';
// 			$show_schedule_data .= '</div>';
// 			endif;
	
// 		if ($row_count==3) :
// 			$show_schedule_data .= '<div class="show_list_workshop_row">';
// 			$show_schedule_data .= '<div class="show_list_session_box col_short col_left">&nbsp;</div>';
// 			$show_schedule_data .= '<div class="show_list_workshop_box col_wide">';
// 			$show_schedule_data .= '<div class="show_list_workshop_title"><a href="https://ohioldsmusic.org/keynote-speaker/">Keynote Address</a></div>';
// 			$show_schedule_data .= '<div class="show_slist_workshop_names"></div>';
// 			$show_schedule_data .= '</div>';
// 			$show_schedule_data .= '<div class="show_list_location_box col_short col_right">&nbsp;</div>';
// 			$show_schedule_data .= '</div>';
// 			endif;
	
// 		$row_count++;
		
// 		endforeach;
	
// 	foreach ($conference_tracks as $track) :
	
// 	$show_schedule_data .= '<a name="'.strtolower(str_replace(array(' ',','),'',$track)).'">&nbsp;</a>';
	
// 	$show_schedule_data .= '<div class="show_list_track">'.$track.'</div>';
	
// 	$show_schedule_data .= '<div class="show_list_header_row dotted_bottom">';
// 	$show_schedule_data .= '<div class="show_list_header col_short col_left">Session</div>';
// 	$show_schedule_data .= '<div class="show_list_header col_wide">Workshop</div>';
// 	$show_schedule_data .= '<div class="show_list_header col_short col_right">Skill Level</div>';
// 	$show_schedule_data .= '<div class="show_list_header col_short col_right">Location</div>';
// 	$show_schedule_data .= '</div>';
	
// 	$session_times = array('10:10AM–11:00AM','11:10AM–12:00PM','1:10PM–2:00PM','2:10PM–3:00PM');
	
// 	$box_count = 0;
	
// 	$args = array( 
// 			'post_type' => 'workshop',
// 			'meta_query' => array(
//     	    	'relation' => 'AND',
//     	    	'track_clause' => array(
//     	   	    	'key' => 'track',
// 					'value' => $track,
//     	   	 		),
//     	   	 	'session_clause' => array(
//     	   	    	 'key' => 'session',
//     	  	 	     'compare' => 'EXISTS',
//     	   	 		), 
//     			),
// 			'orderby' => array(
// 				'session_clause' => 'ASC',
// 				),
// 			'posts_per_page' => '-1'
// 		);
//     	$loop = new WP_Query( $args );
//     	while ( $loop->have_posts() ) : $loop->the_post();
	
// 			$box_count++;
	
// 			$session_count = explode(' ', get_field('session'));
// 			$this_session = $session_count[1];
				
// 			while ($box_count<$this_session) :
// 				$show_schedule_data .= '<div class="show_list_workshop_row';
// 					if (($box_count==1) || ($box_count==3)) $show_schedule_data .= ' dotted_bottom';
// 					if ($box_count==4) $show_schedule_data .= ' bottom_session';
// 				$show_schedule_data .= '">';
	
// 				$session_data = 'Session '.$box_count.'<br/><span class="show_list_session_time">'.$session_times[$box_count-1].'</span>';
	
// 				$show_schedule_data .= '<div class="show_list_session_box col_short col_left">'.$session_data.'</div>';
// 				$show_schedule_data .= '<div class="show_list_workshop_box col_wide">';
// 				$show_schedule_data .= '<div class="show_list_workshop_title">TBD</div>';
// 				$show_schedule_data .= '<div class="show_list_workshop_names"></div>';
// 				$show_schedule_data .= '</div>';
// 				$show_schedule_data .= '<div class="show_list_skill_box col_short col_right">TBD</div>';
// 				$show_schedule_data .= '<div class="show_list_location_box col_short col_right">TBD</div>';
	
// 				$show_schedule_data .= '</div>';
// 				if ($box_count == 2)
// 					$show_schedule_data .= '<div class="show_schedule_workshop_box lunch_box">LUNCH</div>';
// 				$box_count++;
// 				endwhile;
	
// 			$presenter_names = '';
// 			$presenter_comma = '';
	
// 			$presenter_ids = get_field('presenter_ids');
// 			$presenter_name_set = explode(',',$presenter_ids);
// 			foreach ($presenter_name_set as $presenter_name_id) :
// 				$presenter = get_post($presenter_name_id);
// 				$presenter_names .= $presenter_comma.'<a href="'.get_the_permalink($presenter_name_id).'">'.$presenter->post_title.'</a>';
// 				$presenter_comma = ', ';
// 				endforeach;
	
// 			$show_schedule_data .= '<div class="show_list_workshop_row';
// 			if (($box_count==1) || ($box_count==3)) $show_schedule_data .= ' dotted_bottom';
// 			if ($box_count==4) $show_schedule_data .= ' bottom_session';
// 			$show_schedule_data .= '">';
	
// 			$session_data = get_field('session').'<br/><span class="show_list_session_time">'.$session_times[$box_count-1].'</span>';
	
// 			$show_schedule_data .= '<div class="show_list_session_box col_short col_left">'.$session_data.'</div>';
// 			$show_schedule_data .= '<div class="show_list_workshop_box col_wide">';
// 			$show_schedule_data .= '<div class="show_list_workshop_title"><a href="'.get_the_permalink().'">'.get_the_title().'</a>';
// 			if (get_field('skype'))
// 				$show_schedule_data .= ' (Skype)';
// 			$show_schedule_data .= '</div>';
// 			$show_schedule_data .= '<div class="show_list_workshop_names">'.$presenter_names.'</div>';
// 			$show_schedule_data .= '</div>';
// 			$show_schedule_data .= '<div class="show_list_skill_box col_short col_right">'.get_field('skill_levels').'</div>';
	
// 			$room_locations = array('TBD' => 'TBD', 'CH' => 'Chapel', 'RS' => 'Relief Society Room', 'YW' => 'Young Women\'s Room', 'PR' => 'Primary Room', 'NR' => 'Nursery Room', 'HC' => 'High Council Room');
	
// 			$show_schedule_data .= '<div class="show_list_location_box col_short col_right"><a href="https://ohioldsmusic.org/map/">'.get_field('room_location_code').'</a><br/><span class="room_location_name">('.$room_locations[get_field('room_location_code')].')</span></div>';
	
// 			$show_schedule_data .= '</div>';
	
// 			if ($box_count == 2)
// 				$show_schedule_data .= '<div class="show_list_workshop_row lunch_row">LUNCH</div>';

// 			endwhile;
	
// 		$show_schedule_data .= '<div class="schedule_top_link no_print"><a href="#top" class="arrow_carrot_up_alt"> TOP</a></div>';
	
// 	endforeach;
	
// 	endif;
	
// 	return $show_schedule_data;
// }
// add_shortcode( 'show_schedule', 'show_schedule_func' );

// //[lunchtime_entertainment]
// function lunchtime_entertainment_func( $atts ){
// 	$lunchtime_data = '';
	
// 	$args = array( 
// 			'post_type' => 'performance',
// 			'meta_query' => array(
//     	    	'relation' => 'AND',
//     	    	'session_clause' => array(
//     	   	    	'key' => 'session',
// 					'value' => 'Lunchtime Entertainment',
//     	   	 		),
//     	   	 	'program_clause' => array(
//     	   	    	 'key' => 'program_order',
//     	  	 	     'compare' => 'EXISTS',
//     	   	 		), 
//     			),
// 			'orderby' => array(
// 				'program_clause' => 'ASC',
// 				),
// 			'posts_per_page' => '-1'
// 		);
//     $loop = new WP_Query( $args );
//     while ( $loop->have_posts() ) : $loop->the_post();
	
// 		$lunchtime_data .= '<div class="lunchtime_row">';
// 		$lunchtime_data .= '<div class="lunchtime_title">';
// 		$lunchtime_data .= get_the_title();
// 		if ($lunchtime_composer = get_field('composer'))
// 			$lunchtime_data .= ' <span class="lunchtime_composer">('.$lunchtime_composer.')</span>';
// 		$lunchtime_data .= '</div>';
// 		$lunchtime_data .= '<div class="lunchtime_performers">';
// 		$lunchtime_data .= get_the_content();
// 		if ($lunchtime_style = get_field('style'))
// 			$lunchtime_data .= ' <span class="lunchtime_style">| '.$lunchtime_style.'</span>';
// 		$lunchtime_data .= '</div>';
// 		$lunchtime_data .= '</div>';
	
		
	
	
	
	
	
	
	
	
// 		endwhile;
	
// 	return $lunchtime_data;
// }
// add_shortcode( 'lunchtime_entertainment', 'lunchtime_entertainment_func' );
 ?>




