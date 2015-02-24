
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
        <a class="navbar-brand font-xsmall" href="/">The Atlas Of Living Australia</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->  
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li >
            <a href="/about-the-atlas/contact-us/">
              Contact us
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li >
            <a href="/get-involved/">Get involved</a>
          </li>

          <li class="dropdown font-xsmall">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              ALA Apps
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="http://spatial.ala.org.au/">Spatial portal</a></li>
              <li ><a href="http://biocache.ala.org.au/">Occurrence search</a></li>
              <li ><a href="http://fish.ala.org.au/">Fish map</a></li>
              <li ><a href="http://regions.ala.org.au/">Regions</a></li>
              <li ><a href="http://biocache.ala.org.au/explore/your-area">Explore your area</a></li>

              <li class="divider"></li>
              <li><a href="http://sightings.ala.org.au/">Record a sighting</a></li>
              <li><a href="http://collections.ala.org.au/">Collections</a></li>
              <li><a href="http://volunteer.ala.org.au">DigiVol</a></li>
              <li><a href="https://fieldcapture.ala.org.au">Fieldcapture</a></li>
              <li><a href="#">Soils to satellite</a></li>
              <li><a href="#">Traits, species lists</a></li>

              <li class="divider"></li>
              <li><a href="#">Community portals</a></li>
              <li><a href="http://dashboard.ala.org.au">Dashboard</a></li>
              <li><a href="http://collections.ala.org.au/datasets">Datasets browser</a></li>
            </ul>
          </li>

        </ul>
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search the Atlas"></div>
          <button type="submit" class="btn btn-primary">Search</button>
        </form>
        <small>
          <ul class="nav navbar-nav navbar-right">
            <li ><a href="#">My profile</a></li>
            <li ><a href="#">Login</a></li>
          </ul>
        </small>
      </div>
      <!-- /.navbar-collapse --> </div>
    <!-- /.container-fluid --> </nav>