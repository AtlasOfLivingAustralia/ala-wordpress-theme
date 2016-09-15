
<!-- Navbar -->
  <nav id="alatopnav" class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <a class="navbar-brand" href="/">
          <img alt="Brand" class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/img/supporting-graphic-element-flat.png">
        </a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand font-xsmall" href="/">Atlas Of Living Australia</a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">

          <li class="dropdown font-xsmall">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              Explore
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">

              <li><a href="http://collections.ala.org.au/">Collections</a></li>
              <li><a href="http://collections.ala.org.au/datasets">Data sets</a></li>
              <li><a href="http://lists.ala.org.au/iconic-species">Iconic species</a></li>

              <li class="divider"></li>
              <li class="dropdown-header">Occurrence records</li>
              <li><a href="http://biocache.ala.org.au/">Search records</a></li>
              <li><a href="http://regions.ala.org.au/">Browse your region</a></li>
              <li><a href="http://biocache.ala.org.au/explore/your-area">Explore your area</a></li>

              <li class="divider"></li>
              <li class="dropdown-header">Analyse</li>
              <li><a href="http://spatial.ala.org.au/">Spatial Portal</a></li>
              <li><a href="http://phylolink.ala.org.au/">Phylolink</a></li>

              <li class="divider"></li>
              <li><a href="http://dashboard.ala.org.au/">Atlas Dashboard</a></li>
            </ul>
          </li>

          <li class="dropdown font-xsmall">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              Contribute
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="http://biocollect.ala.org.au/">Join a Citizen Science project</a></li>
              <li><a href="http://sightings.ala.org.au/">Record a sighting</a></li>
              <li><a href="#">Submit a data set</a></li>
              <li><a href="http://volunteer.ala.org.au/">Digitise a record</a></li>
              <!-- <li><a href="#">Occurrence sandbox</a></li> -->

              <li class="divider"></li>
              <li class="dropdown-header">Get in touch</li>
              <!-- <li ><a href="https://rawgit.com/AtlasOfLivingAustralia/front-end-static/master/ALA%20Website%20Recreation%20in%20Bootstrap%203/feedback-form-page.html">Provide Feedback</a></li> -->
              <li ><a href="about-the-atlas/contact-us/">Contact Us</a></li>
            </ul>
          </li>

          <li class="dropdown font-xsmall">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              Learn
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="about-the-atlas/">About the Atlas</a></li>

              <li class="divider"></li>
              <li ><a href="education-resources/">Education Resources</a></li>

              <li class="divider"></li>
              <li class="dropdown-header">How we</li>
              <li><a href="how-we/#communicate">Communicate</a></li>
              <li><a href="how-we/#handle-sensitive-data">Handle sensitive data</a></li>
              <li><a href="how-we/#integrate-data">Integrate data</a></li>
              <li><a href="how-we/#upload-data-sets">Upload datasets</a></li>

              <li class="divider"></li>
              <li class="dropdown-header">How you can</li>
              <!-- <li><a href="http://www.ala.org.au/about-the-atlas/downloadable-tools/ala-mobile-app/">Use the Atlas mobile app</a></li> -->
              <li><a href="get-involved/">Contribute to the Atlas</a></li>
              <li><a href="how-you-can/#find-species-info">Find species information</a></li>
              <li><a href="how-you-can/#download-data">Download data</a></li>
              <li><a href="how-you-can/#record-sighting">Record a sighting</a></li>
              <li><a href="how-you-can/#use-our-api">Use our API</a></li>
            </ul>
          </li>

        </ul>

        <?php if (!is_front_page() ) { ?>
        <form class="navbar-form navbar-left" action="https://bie.ala.org.au/search" method="get">
          <div class="form-group">
            <input id="search" class="autocomplete form-control" title="Search" type="text" name="q" placeholder="Search the Atlas" autocomplete="off">
            </div>
          <button type="submit" class="btn btn-primary">Search</button>
        </form>
<?php } ?>
          <ul class="nav navbar-nav navbar-right">
          <li class="dropdown font-xsmall">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              User settings
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
<?php if (is_user_logged_in() ) { ?>
              <li><a href="https://auth.ala.org.au/userdetails/myprofile/">My profile</a></li>
              <li><a href="<?php echo wp_logout_url( home_url() ); ?>">Log out</a></li>
<?php } else { ?>
              <li><a href="<?php echo wp_login_url( home_url() ); ?>">Log in</a></li>
              <li><a href="https://auth.ala.org.au/userdetails/registration/createAccount">Register</a></li>
<?php } ?>
            </ul>
          </li>
          </ul>

      </div>
      <!-- /.navbar-collapse --> </div>
    <!-- /.container-fluid --> </nav>
