<?php get_header(); ?>

<?php get_template_part('template-part', 'topnav'); ?>

  <div class="jumbotron ala-header hidden-print" id="ala-jumbotron">
    <div class="container">
<?php // theloop - but only for the announcement
  if ( have_posts() ) : while ( have_posts() ) : the_post();
    if( get_post_meta($post->ID, 'ALACustomAnnouncement', true) ) { ?>
      <div class="col-lg-5 col-md-8 col-sm-12 ala-announce"><?php echo get_post_meta($post->ID, 'ALACustomAnnouncement', true); ?></div>
      <div class="col-lg-1 col-md-12 col-sm-12"><!-- temporary spacer block goes with ala-announce block --></div>
<?php } ?>
<?php endwhile; ?>
<?php endif; ?>
      <div class="col-lg-6 col-md-8 col-sm-12 promotional">The <strong>Atlas of Living Australia</strong> is a collaborative, national project that aggregates biodiversity data from multiple sources and makes it freely available and usable online.</div>
    </div>
  </div>
<?php // theloop - but only for the alert
  if ( have_posts() ) : while ( have_posts() ) : the_post();
    if( get_post_meta($post->ID, 'ALACustomAlertMessage', true) ) { ?>
    <!-- Promotional alert -->
  <div class="alert alert-ala-default alert-dismissible" role="alert">
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
  <div class="container" id="main">

    <div class="col-md-8 col-md-offset-2 hidden">
      <h1 class="heading-large margin-bottom-quarter-1">Atlas of Living Australia</h1>
      <h2 class="promotional">
        The Atlas of Living Australia is a collaborative, national project that aggregates biodiversity data from multiple sources and makes it freely available and usable online.
      </h2>
    </div>

    <!-- Main stats -->
    <div class="col-md-12">
      <div class="main-stats row">
        <div class="main-stats col-lg-3 col-md-3 col-sm-6">
          <h4>Occurrence Records</h4>
          <div class="stat-number" id="allRecords">
            72,266,000
          </div>
        </div>

        <div class="main-stats col-lg-3 col-md-3 col-sm-6">
          <h4>Species</h4>
          <div class="stat-number" id="allSpecies">
            195,000
          </div>
        </div>

        <div class="main-stats col-lg-3 col-md-3 col-sm-6">
          <h4>Data downloads</h4>
          <div class="stat-number" id="allDownloads">
            1.58M
          </div>
        </div>

        <div class="main-stats col-lg-3 col-md-3 col-sm-6">
          <h4>Registered users</h4>
          <div class="stat-number" id="allUsers">
            40,000
          </div>
        </div>
      </div><!-- End main stats -->
    </div>


    <!-- Main col -->
    <div class="col-md-12">
      <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="panel panel-default">
          <a href="https://lists.ala.org.au/iconic-species"><img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/img/homepage-channel-image-koala.jpg" alt="Koala"></a>
          <div class="panel-body">
            <h3><a href="https://lists.ala.org.au/iconic-species">Australian iconic species</a></h3>
            <p class="help-block">
              Browse some of our most popular species, or search over 100,000 species within the ALA.
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="panel panel-default">
          <a href="/explore-by-location/"><img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/img/homepage-channel-image-lionfish.jpg" alt="Lionfish"></a>
          <div class="panel-body">
            <h3><a href="/explore-by-location/">Explore by location</a></h3>
            <p class="help-block">
              Browse species by pre-defined <a href="http://regions.ala.org.au/">region</a> or by <a href="http://biocache.ala.org.au/explore/your-area">location</a>.
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="panel panel-default">
          <a href="/mapping-and-analysis/"><img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/img/homepage-channel-image-rainbow-lorikeet.jpg" alt="Rainbow Lorikeet"></a>
          <div class="panel-body">
            <h3><a href="/mapping-and-analysis/">Mapping &amp; analysis</a></h3>
            <p class="help-block">
              Explore species occurrence records using the <a href="http://spatial.ala.org.au/webportal/">Spatial Portal</a> or <a href="https://biocache.ala.org.au/search#tab_simpleSearch">search records</a> for species occurrences.
            </p>
          </div>
        </div>
      </div>
      <!-- End Col -->
      <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="panel panel-default">
          <a href="/contribute-to-ala/"><img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/img/ala-info-hub-get-involved-icon.jpg" alt="Contribute icon"></a>
          <div class="panel-body">
            <h3><a href="/contribute-to-ala/">Contribute to the ALA</a></h3>
            <p class="help-block">
              Get involved in <a href="/citizen-science-central/">citizen science</a>, digitise <a href="https://volunteer.ala.org.au/">survey records</a>, or <a href="https://sightings.ala.org.au/">contribute your sighting</a> to the ALA.
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="panel panel-default">
          <a href="/blogs-news/">
            <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/img/ala-info-hub-how-you-can-icon.jpg" alt="ALA news icon">
          </a>
          <div class="panel-body">
            <h3><a href="/blogs-news/">ALA Blog</a></h3>
            <p class="help-block">
              Browse news and events from around the ALA community, and keep up to date with how we are engaging with our users.
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6">
        <div class="panel panel-default">
          <a href="/ala-knowledge-base/">
            <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/img/ala-info-hub-education-icon.jpg" alt="Knowledge Base icon">
          </a>
          <div class="panel-body">
            <h3><a href="/ala-knowledge-base/">ALA knowledge base</a></h3>
            <p class="help-block">
              Learn about the ALA and discover the many different ways in which we can help you achieve your goals.
            </p>
          </div>
        </div>
      </div>
      <!-- End Col -->
    </div><!-- End main col -->

  </div><!-- end content container -->

<?php 
$GLOBALS['ALAcontentType'] = 'Channel';
get_footer(); 
?>
