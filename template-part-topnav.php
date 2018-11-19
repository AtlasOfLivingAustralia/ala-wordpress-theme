<!-- Navbar start -->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container container-navbar">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">
          <img alt="Brand" src="<?php echo get_stylesheet_directory_uri(); ?>/img/ala-logo-2016-inline.png">
        </a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <div class="row row-search">
          <div class="col-xs-12 col-sm-4 col-md-6">
            <form id="global-search" class="banner" action="https://bie.ala.org.au/search" method="get" name="search-form">
              <div class="icon-addon addon-lg">
                <input type="text" placeholder="Search the Atlas ..." class="form-control autocomplete" id="biesearch" name="q">
                <label for="biesearch" class="glyphicon glyphicon-search" rel="tooltip" title="search"></label>
              </div>
            </form>
          </div>
          <div class="col-md-2 hidden-xs">
<?php if (is_user_logged_in() ) { ?>
            <ul class="nav navbar-nav navbar-right nav-logged-in">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  My profile
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="https://auth.ala.org.au/userdetails/myprofile/">View profile</a></li>
                  <li><a href="https://auth.ala.org.au/userdetails/registration/editAccount">Account settings</a></li>
                  <li class="divider"></li>
                  <li><a href="<?php echo wp_logout_url( home_url() ); ?>">Log out</a></li>
                </ul>
              </li>
            </ul>
<?php } else { ?>
            <ul class="nav navbar-nav navbar-right nav-login">
              <li><a href="<?php echo wp_login_url( home_url() ); ?>">Log in</a></li>
            </ul> 
<?php } ?>

          </div>
        </div><!-- End row -->

        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              Start exploring
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="https://lists.ala.org.au/iconic-species">Australian iconic species</a></li>
              <li><a href="https://biocache.ala.org.au/explore/your-area">Explore your area</a></li>
              <li><a href="http://regions.ala.org.au/">Explore regions</a></li>
              <li><a href="https://biocache.ala.org.au/search">Search occurrence records</a></li>
              <li class="divider"></li>
              <li><a href="/sites-and-services/">Sites &amp; services</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              Search &amp; analyse
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="http://collections.ala.org.au/">Browse natural history collections</a></li>
              <li><a href="http://collections.ala.org.au/datasets">Search datasets</a></li>
              <li><a href="https://downloads.ala.org.au">Download data</a>
              <li><a href="http://spatial.ala.org.au/">Spatial portal</a></li>
              <li class="divider"></li>
              <li><a href="https://dashboard.ala.org.au/">ALA dashboard</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              Participate
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="https://biocollect.ala.org.au/acsa">Join a Citizen Science project</a></li>
              <li><a href="https://sightings.ala.org.au/">Record a sighting in the ALA</a></li>
              <li><a href="/submit-dataset-to-ala/">Submit a dataset to the ALA</a></li>
              <li><a href="https://digivol.ala.org.au/">Digitise a record in DigiVol</a></li>
              <li><a href="/who-we-are/downloadable-tools/ala-mobile-app/">Mobile apps</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              Learn about the ALA
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="/who-we-are/">Who we are</a></li>
              <li class="divider"></li>
              <li><a href="/how-to-use-ala/">How to use the ALA</a></li>
              <li><a href="/how-to-work-with-data/">How to work with data</a></li>
              <li><a href="/how-to-cite-ala/">How to cite the ALA</a></li>
              <li class="divider"></li>
              <li><a href="/education-resources/">Education resources</a></li>
              <li><a href="/ala-and-indigenous-ecological-knowledge-iek/">Indigenous Ecological Knowledge</a></li>
              <li class="divider"></li>
              <li><a href="/blogs-news/">ALA Blog</a></li>
              <li class="divider"></li>
              <li><a href="/about-the-atlas/contact-us/">Contact us</a></li>
              <li><a href="/about-the-atlas/feedback-form/">Feedback form</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              Help
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="https://support.ala.org.au/">Knowledge base</a></li>
              <li class="divider"></li>
              <li><a href="/about-the-atlas/contact-us/">Contact us</a></li>
              <li><a href="/about-the-atlas/feedback-form/">Feedback form</a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right visible-xs">
<?php if (is_user_logged_in() ) { ?>
          <li><a href="https://auth.ala.org.au/userdetails/myprofile/"><span class="nav-login">View profile</span></a></li>
          <li><a href="https://auth.ala.org.au/userdetails/registration/editAccount"><span class="nav-login">Account settings</span></a></li>
          <li><a href="<?php echo wp_logout_url( home_url() ); ?>"><span class="nav-login">Log out</span></a></li>
<?php } else { ?>
          <li><a href="<?php echo wp_login_url( home_url() ); ?>"><span class="nav-login">Log in</span></a></li>
<?php } ?>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <!-- End Navbar -->

