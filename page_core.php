<?php get_header(); ?>

<?php get_template_part('template-part', 'topnav'); ?>

 <!-- Breadcrumb -->
  <section id="breadcrumb">
    <div class="container">
      <div class="row">
        <ul class="breadcrumb-list">
          <li><a href="/">Home</a></li>
          <!-- <li><a href="/"><span class="glyphicon glyphicon-menu-right"></span><?php // echo $GLOBALS['ALAcontentType'] ;?></a></li> -->
          <li active"><span class="glyphicon glyphicon-menu-right"></span><?php the_title() ;?></li>
        </ul>
      </div>
    </div>
  </section>
  <!-- End breadcrumb -->

  <div class="container">
    <section class="content-container">
      <div class="row">

        <?php // theloop
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <article class="col-md-12 header-wrap margin-bottom-half-1">
          <h5 class="subject-category-overline"><?php echo $GLOBALS['ALAcontentType'] ;?></h5>
          <h2 class="subject-title"><?php the_title() ;?></h2>
          <h3 class="subject-subtitle"><?php echo $post->post_excerpt ;?></h3>
<?php if ( $GLOBALS['ALAcontentType'] != 'Channel' ) : ?>
          <p class="subject-byline"><?php echo get_the_date() ;?></p>
<?php endif; ?>
        </article>

<?php if ( $GLOBALS['ALAcontentType'] == 'Channel' ) : ?>

        <article class="col-md-12">
        <!-- Start editable content -->
            <?php the_content(); ?>
            <?php wp_link_pages(); ?>
        <!-- End editable content -->
        </article><?php // End .col-md-12  ?>

<?php else: ?>

        <article class="col-md-3 col-md-push-9 sidebar-col">
          <div class="toc-floating-menu">
<!--           <h4>Page contents:</h4>
            <div class="profile-usermenu margin-bottom-2">
            <?php //echo '<ul class="nav">' . toc_get_index() . '</ul>'; ?>
            </div> -->
          </div>
        </article>

        <article class="col-md-8 col-md-pull-3">
        <!-- Start editable content -->
            <?php the_content(); ?>
            <?php wp_link_pages(); ?>
        <!-- End editable content -->
        </article><?php // End .col-md-8 col-md-pull-3  ?>

<?php endif; ?>

        <?php endwhile; ?>
        <?php else: ?>

            <?php get_404_template(); ?>

        <?php endif; ?>

      </div><?php // End .row  ?>
    </section><?php // End .content-container  ?>

  </div><?php // End .container  ?>

<?php get_footer(); ?>
