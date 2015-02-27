<?php
/**
 * Template Name: Blogs & news
 *
 * Selectable from a dropdown menu on the edit page screen.
 */
define('WP_USE_THEMES', false);
get_header(); ?>

<?php get_template_part('template-part', 'topnav'); ?>

<div id="main" class="container dmbs-container">

<?php // get_template_part('template-part', 'head'); ?>


    <?php //left sidebar ?>
    <?php get_sidebar( 'left' ); ?>

   <div class="col-sm-12 col-md-9 col-lg-9">
    <h1 class="hidden"><?php the_title() ;?></h1>
    <h2 class="heading-medium"><?php the_title() ;?></h2>
     <div class="row dmbs-content">

	  <div class="panel panel-default">
       <div class="panel-body">

<ul>

		<?php 
	
			$sticky = get_option( 'sticky_posts' );

			$args=array(
				'post_type' => 'post',
				'category_name' => 'blogs-news',
				'posts_per_page' => 50,
				'ignore_sticky_posts' => 0
			);
			$my_query = new WP_Query( $args );
			if( $my_query->have_posts() ) {
				while ( $my_query->have_posts()) : $my_query->the_post(); 
				// start of posts loop ?>

	<li class="post">

	 	<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>

	 	<?php the_time('F jS, Y'); ?>

 	</li> 

	<?php 
		// end of posts loop
		endwhile;
	} ?>

		</ul>
	</div><!-- /panel-body -->
	</div><!-- /panel -->

   </div><!-- End row -->
</div><!-- End col --> 

    <?php //get the right sidebar ?>
    <?php get_sidebar( 'right' ); ?>

 </div><!-- End container #main col -->  
<!-- end content container -->

<?php get_footer(); ?>
