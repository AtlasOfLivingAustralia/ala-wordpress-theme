<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

add_action( "wp_enqueue_scripts", "ala_topbar_nav_polite", 11 );

function ala_topbar_nav_polite() 
{
    wp_enqueue_script( 
        'ala_top_nav_polite', 
        get_stylesheet_directory_uri() . '/js/ala_topnav_polite.js',
        array( 'jquery' ), 
        '1.23', 
        true
    );
}

function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array('bootstrap.css') ,'1.5.0' );
    wp_enqueue_style( 'ala-style', get_stylesheet_directory_uri() . '/css/ala-styles.css', array('parent-style') ,'1.0' );
    wp_enqueue_style('fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', array('ala-style') ,'4.3.0');
}

function do_loginscript()
{
	$loggedIn = 'https://auth.ala.org.au/cas/login?service='.home_url().'/wp-login.php?redirect_to='.home_url(); 
	echo $loggedIn;
}

//template directory shortcode
function template_directory_path()
{
	$templatedirectory = get_bloginfo('stylesheet_directory');
	return $templatedirectory;
}
add_shortcode('theme-path', 'template_directory_path');

function wt_get_ID_by_page_name($page_name)
{
	global $wpdb;
	$page_name_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$page_name."'");
	return $page_name_id;
}

//internal link shortcode
function link_to($pagename)
{
	extract( shortcode_atts( array(
		'pagename' => '',
	), $pagename ) );

	$pageID = wt_get_ID_by_page_name("{$pagename}");
	$href = get_permalink($pageID);
	return $href;	
}
add_shortcode('linkto', 'link_to');

//latest news shortcode
function latest_news()
{
	global $post;
	$my_query = new WP_Query();
			$args=array(
				'post_type' => 'post',
				'category_name' => 'blogs-news',
				'posts_per_page' => 1
			);
			$my_query->query($args);
			global $skipposts;
			$output .= '<div class="list-group">';
			if( $my_query->have_posts() ) {
				while ($my_query->have_posts()) : $my_query->the_post();
					$category = get_the_category();
					$category_id = $category[1]->cat_ID;
					if ($category_id == 72) {
						$category_name = $category[0]->cat_name;
						$category_id = $category[0]->cat_ID;
						$category_link = get_category_link( $category_id );
					} else {
						$category_name = $category[1]->cat_name;
						$category_id = $category[1]->cat_ID;
						$category_link = get_category_link( $category_id );
					}
			$output .= '<a href="' . get_permalink() . '" class="list-group-item">';
			$output .= get_the_title() . '</a>';

			// $output .= '<article>';
			// $output .= '<span class="eyebrow"><a href="'. $category_link .'">' . $category_name . '</a></span>';
			// $output .= '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
			// $output .= '<time datetime="' . get_the_time('Y-m-d') . '">' . get_the_time('j F, Y') . '</time>';
			// $output .= '</article>';
				
			 endwhile;
			}
			$output .= '</div>';
			wp_reset_query();
	return $output;
}
add_shortcode('latest-news', 'latest_news');

