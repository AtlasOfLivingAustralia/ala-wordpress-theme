<?php
  $post = $wp_query->post;
  if ( is_page('home') ) {
    include 'home.php';
    
  } else { //default
    $GLOBALS['ALAcontentType'] = 'Article';
    include 'page_core.php';
  }
?>
