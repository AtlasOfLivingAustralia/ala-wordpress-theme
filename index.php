<?php get_header(); ?>

<?php get_template_part('template-part', 'topnav'); ?>

<div id="main" class="container dmbs-container">

<?php // get_template_part('template-part', 'head'); ?>


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

            <div class="row"><!-- post info bar: author, date etc -->
              <div class="col-md-12">
                <ul class="list-inline heading-underlined">
                  <li class="font-xxsmall">By <?php the_author(); ?></li>
                  <li class="font-xxsmall"><i class="fa fa-calendar"></i>&ensp;<?php echo get_the_date(); ?></li>
                  <li class="font-xxsmall"><i class="fa fa-tag"></i>&ensp;Tags:&ensp;
                    <?php
                    $categories = get_the_category();
                    $separator = ' ';
                    $output = '';
                    if($categories){
                      foreach($categories as $category) {
                        # $output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '"><span class="label label-primary">'.$category->cat_name.'</span></a>'.$separator;
                        $output .= '<span class="label label-primary">'.$category->cat_name.'</span>'.$separator;
                      }
                    echo trim($output, $separator);
                    }
                    ?>
                  </li>
                </ul>
              </div>
            </div>


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
