<?php
  $post = $wp_query->post;
  if ( is_page('home') ) {
    include 'home.php';
    
  } else { //default
    $GLOBALS['ALAcontentType'] = 'Page';
    include 'page_core.php';
  }
?>
