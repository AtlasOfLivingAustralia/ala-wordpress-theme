<?php
//define('WP_USE_THEMES', false);
get_header(); ?>

<?php get_template_part('template-part', 'topnav'); ?>
<!-- category.php -->
 <!-- Breadcrumb -->
  <section id="breadcrumb">
    <div class="container">
      <div class="row">
        <ul class="breadcrumb-list">
          <li><a href="/">Home</a></li>
<?php if ( get_cat_slug($cat) == "blogs-news" ) : ?>
          <li><span class="glyphicon glyphicon-menu-right"></span>ALA News</li>
<?php else: ?>
          <li><span class="glyphicon glyphicon-menu-right"></span><a href="/blogs-news/">ALA News</a></li>
          <li active"><span class="glyphicon glyphicon-menu-right"></span><?php single_cat_title(); ?></li>
<?php endif; ?>
        </ul>
      </div>
    </div>
  </section>
  <!-- End breadcrumb -->

  <div class="container">
    <section class="content-container">
      <div class="row">

<?php
$postsperpage = get_option('posts_per_page');
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$args = array(
  'posts_per_page'   => $postsperpage,
  'cat'              => $cat,
  'post_type'        => 'post',
  'post_status'      => 'publish',
  'paged'            => $paged
);
?>
        <article class="col-md-12 header-wrap margin-bottom-half-1">
          <h5 class="subject-category-overline">Channel</h5>
<?php if ( get_cat_slug($cat) == "blogs-news" ) : ?>
          <h2 class="subject-title">The Atlas of Living Australia News</h2>
          <h3 class="subject-subtitle">News and events from around the ALA community.</h3>
<?php else: ?>
          <h2 class="subject-title"><?php single_cat_title(); ?></h2>
          <h3 class="subject-subtitle"><?php echo category_description($cat); ?></h3>
<?php endif; ?>
        </article>
<?php
// the query
$the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) :
  $postCounter = 0;
  // start The Loop
  while ( $the_query->have_posts() ) : $the_query->the_post();
    $postCounter = ++$postCounter;
    $thumbsize = 'thumb-med';
    $blog_thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id(), $thumbsize);
?>
<div class="col-md-12">
  <div class="panel panel-default panel-blog">
    <div class="panel-body row">
      <div class="col-md-2">
        <h4>
          <?php
          $this_post_categories = get_the_category();
          post_category_links($this_post_categories);
          ?>
        </h4>
      </div>
      <div class="col-md-6">
        <h3>
          <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
        </h3>
        <p class="heading-underlined"><?php the_time('j F, Y'); ?></p>
        <?php
        // $posttags = get_the_tags();
        // if ($posttags) {
        //   echo '<p class="subject-byline">Tags: ';
        //   foreach($posttags as $tag) {
        //     echo '<span class="label label-ala">' . $tag->name . '</span> ';
        //   }
        //   echo '</p>';
        // }
        ?>


        <!-- <p class="subject-byline">Tags:&ensp;<span class="label label-ala">News</span> <span class="label label-ala">Data</span></p> -->
      </div>
<?php if ($blog_thumb_url) { ?>
      <div class="col-md-4"><img class="img-responsive" src="<?php echo $blog_thumb_url[0]; ?>" alt="Image: <?php the_title(); ?>"></div>
<?php } ?>
    </div>
  </div>
</div>

  <?php
  endwhile;
  // end The Loop
  ?>

  <?php if ($the_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
    <!-- total list pages for this category: <?php echo $the_query->max_num_pages ?> -->
    <nav>
      <ul class="pager">
        <li class="previous"><?php echo get_previous_posts_link( '<span aria-hidden="true">&larr;</span> Newer posts' ); ?></li>
        <li class="next"><?php echo get_next_posts_link( 'Older posts <span aria-hidden="true">&rarr;</span>', $the_query->max_num_pages ); ?></li>
      </ul>
    </nav>
  <?php } ?>

  <?php wp_reset_postdata(); ?>

  <?php else: ?>
    <article>
      <h1>Sorry...</h1>
      <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    </article>
  <?php endif; ?>



      </div><?php // End .row  ?>
    </section><?php // End .content-container  ?>

  </div><?php // End .container  ?>

<?php get_footer(); ?>
