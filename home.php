<?php get_header(); ?>

<?php get_template_part('template-part', 'topnav'); ?>

  <!-- Jumbotron -->
  <div class="jumbotron ala-header">
    <div class="container no-gutter">
      <div class="col-xs-12 col-md-12 col-md-10 col-lg-9 col-lg-offset-1">

        <form id="global-search" class="banner" action="http://bie.ala.org.au/search" method="get" name="search-form">
          <div class="input-group">
            <input type="text" class="autocomplete form-control" name="q" placeholder="Search the Atlas ...">
            <span class="input-group-btn">
              <input class="btn btn-primary btn-lg button-search" type="submit">Search</input>
            </span>
          </div>
        </form>

      </div>
    </div>
  </div><!-- End Jumbotron -->
<?php // theloop - but only for the alert
  if ( have_posts() ) : while ( have_posts() ) : the_post();
    if( get_post_meta($post->ID, 'ALACustomAlertMessage', true) ) { ?>
    <!-- Promotional alert -->
  <div class="alert alert-promotional alert-dismissible" role="alert">
    <div class="container">
      <div class="row-fluid">
        <div class="col-md-12">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close" title="Close"><span aria-hidden="true">&times;</span></button>
          <p><?php echo get_post_meta($post->ID, 'ALACustomAlertMessage', true); ?></p>
        </div>
      </div>
    </div>
  </div>
  <!-- End promotional alert -->
<?php } ?>
<?php endwhile; ?>
<?php endif; ?>

  <!-- Container -->
    <div id="main" class="container dmbs-container">

     <!-- Main col -->
    <div class="col-md-9">
    <h1 class="hidden">Welcome to the Atlas of Living Australia website</h1>
    <h2 class="heading-medium">Explore the Atlas of Living Australia</h2>
      <div class="row">
<?php // note content for home page uses [theme-path] shortcode ?>
        <?php // theloop
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
        <?php else: ?>
            <?php get_404_template(); ?>
        <?php endif; ?>

        </div><!-- End row -->
      </div><!-- End main col -->

    <?php //get the right sidebar ?>
    <?php get_sidebar( 'right' ); ?>

 </div><!-- End container #main col -->  
<!-- end content container -->

<?php get_footer(); ?>
