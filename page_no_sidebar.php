<?php /* Template Name: No Sidebar */ ?>

<?php get_header(); ?>

<?php get_template_part('template-part', 'topnav'); ?>

<div id="main" class="container dmbs-container">

<?php // get_template_part('template-part', 'head'); ?>

   <div class="col-xs-12">
    <h1 class="hidden"><?php the_title() ;?></h1>
    <h2 class="heading-medium"><?php the_title() ;?></h2>
     <div class="row dmbs-content">

         <div class="panel panel-default">
         <div class="panel-body">

        <?php // theloop
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <?php the_content(); ?>
            <?php wp_link_pages(); ?>


        <?php endwhile; ?>
        <?php else: ?>

            <?php get_404_template(); ?>

        <?php endif; ?>
         </div><?php //  End panel-body  ?>
       </div><?php // End panel  ?>
   </div><?php // End row  ?>
</div><?php // End col ?>


 </div><?php // End container #main col  ?>
<?php // end content container ?>

<?php get_footer(); ?>
