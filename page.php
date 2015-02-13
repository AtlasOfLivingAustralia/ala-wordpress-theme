<?php
  $post = $wp_query->post;
  if ( is_page('home') ) {
    include 'home.php';
    
  } else { //default
    include 'page_standard.php';
  }
?>
