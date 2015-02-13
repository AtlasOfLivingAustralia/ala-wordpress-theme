<?php get_header(); ?>

<?php get_template_part('template-part', 'topnav'); ?>

<div id="main" class="container dmbs-container">

<?php get_template_part('template-part', 'head'); ?>


    <?php //left sidebar ?>
    <?php get_sidebar( 'left' ); ?>

   <div class="col-sm-12 col-md-9 col-lg-9">
    <h1 class="hidden"><?php the_title() ;?></h1>
    <h2 class="heading-medium"><?php the_title() ;?></h2>
     <div class="row dmbs-content">

       <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dmbs-main"> -->
         <div class="panel panel-default">
         <div class="panel-body">

        <?php // theloop
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <div class="word-limit">
            <!-- <h1 class="heading-xlarge"><?php the_title() ;?></h2> -->
            <?php the_content(); ?>
            <?php wp_link_pages(); ?>
            <?php //comments_template(); ?>
          </div>

        <?php endwhile; ?>
        <?php else: ?>

            <?php get_404_template(); ?>

        <?php endif; ?>
         </div><!-- End panel-body -->
       </div><!-- End panel --> 
     <!-- </div> --><!-- End col --> 
   </div><!-- End row -->
</div><!-- End col --> 

    <?php //get the right sidebar ?>
    <?php get_sidebar( 'right' ); ?>

 </div><!-- End container #main col -->  
<!-- end content container -->

<?php get_footer(); ?>
