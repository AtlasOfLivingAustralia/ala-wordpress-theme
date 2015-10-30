<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'autocompletejs' );
add_action( 'wp_enqueue_scripts', 'ala_custom_js', 12 );

function autocompletejs()
{
    wp_enqueue_script(
        'autocompletejs',
        get_stylesheet_directory_uri() . '/js/jquery.autocomplete.js',
        array( 'jquery' ),
        '1.0',
        true
    );
}

function ala_custom_js()
{
    wp_enqueue_script(
        'ala_custom_js',
        get_stylesheet_directory_uri() . '/js/ala_custom.js',
        array( 'jquery' ),
        '1.01',
        true
    );
}

//list pages in section shortcode
function section_pages($atts)
{
	extract( shortcode_atts( array(
		'jumplink' => '',
		'linkname' => '',
	), $atts ) );

	global $post;
	$ID = $post->ID;
	$thispage = '<li><a href="#'.$jumplink.'">'.$linkname.'</a></li>';
	$pages = wp_list_pages('title_li=&sort_column=menu_ord
	er&depth=1&child_of='.$ID.'&echo=0');
	return $thispage.$pages;
}
add_shortcode('section-pages', 'section_pages');

function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array('bootstrap.css') ,'1.5.0' );
    wp_enqueue_style( 'autocompcss', get_stylesheet_directory_uri() . '/css/jquery.autocomplete.css', array('parent-style') ,'1.0' );
    wp_enqueue_style( 'ala-style', get_stylesheet_directory_uri() . '/css/ala-styles.css', array('parent-style') ,'1.7' );
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
				'posts_per_page' => 3
			);
			$my_query->query($args);
			global $skipposts;
			$output = '<div class="list-group">';
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

//in-page search shortcode
function inpage_search($atts)
{
	extract( shortcode_atts( array(
		'action' => 'bie.ala.org.au/search',
	), $atts ) );

	global $post;
	$id=$post->ID;
	$placeholder = get_post_meta($id,'Placeholder',true);
	$searchtext = get_post_meta($id,'SearchText',true);
	$form = '<form action="http://'.$action.'" method="get">';
	$form .= '<input class="inpagesearch form-control" title="Search" type="text" name="q" placeholder="' . $placeholder . '" />';
	$form .= '<button type="submit" class="btn btn-primary">Search</button>';
	$form .= '</form>';

	//$form .= '<span class="search-button-wrapper"><button id="search-button" class="search-button" value="Search" type="submit"><img src="' . get_bloginfo("template_directory") . '/images/button_search.png" alt="Search" width="27" height="27" /></button></span></form>';
	//$form .= '<p>' . $searchtext;

	return $form;
}
add_shortcode('inpage-search', 'inpage_search');


function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   *
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /**
   * We construct the pagination arguments to enter into our paginate_links
   * function.
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&laquo;'),
    'next_text'       => __('&raquo;'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
      echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
      echo $paginate_links;
    echo "</nav>";
  }

}
