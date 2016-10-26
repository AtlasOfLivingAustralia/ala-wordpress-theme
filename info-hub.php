<?php
/**
 * Template Name: Info hub
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
define('WP_USE_THEMES', false);
get_header(); ?>

<?php get_template_part('template-part', 'topnav'); ?>

<div class="jumbotron info-hub-banner hidden-print">
  <div class="container no-gutter">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-9 col-lg-offset-1">

    </div>
  </div>
</div><!-- End Jumbotron -->

<div id="main" class="container dmbs-container">

<!-- Main col -->
<div class="col-sm-12 col-md-12 col-lg-12">
  <h1 class="hidden"><?php the_title() ;?></h1>
  <ol class="breadcrumb hidden-print">
    <li><a class="font-xxsmall" href="index.html">Home</a></li>
    <li class="font-xxsmall active"><?php the_title() ;?></li>
  </ol>
  <h2 class="heading-medium"><?php the_title() ;?></h2>

        <?php // theloop
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <?php the_content(); ?>
            <?php wp_link_pages(); ?>

        <?php endwhile; ?>
        <?php else: ?>

            <?php get_404_template(); ?>

        <?php endif; ?>

</div><?php // End col  ?>

 </div><!-- End container #main col -->
<!-- end content container -->
<hr class="email">
<?php get_footer(); ?>
