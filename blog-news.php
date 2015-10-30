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
  <div class="col-xs-12">
    <h1 class="hidden">Welcome to the Atlas of Living Australia</h1>
    <ol class="breadcrumb hidden-print">
      <li><a class="font-xxsmall" href="/">Home</a></li>
      <li class="font-xxsmall active"><?php the_title() ;?></li>
    </ol>
    <h2 class="heading-medium"><?php the_title() ;?></h2>
  </div>

<?php
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
// cat of -18 means exclude spatial portal help posts
$args = array(
  'posts_per_page'   => 4,
  'cat'              => '-18',
  'post_type'        => 'post',
  'post_status'      => 'publish',
  'paged'            => $paged
);
?>
<?php
// the query
$the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) :
  // start The Loop
  while ( $the_query->have_posts() ) : $the_query->the_post();
    $category = get_the_category();
    if ($category_id == 72) { // Blogs & News has id 72
      $category_name = $category[0]->cat_name;
      $category_id = $category[0]->cat_ID;
      $category_link = get_category_link( $category_id );
    } else {
      $category_name = $category[1]->cat_name;
      $category_id = $category[1]->cat_ID;
      $category_link = get_category_link( $category_id );
    }
    echo '<!-- $category_name: ' . $category_name . ', $category_id: ' . $$category_id . ' -->';

    $thumbsize = 'thumb-med'; //$imgsize = 'width="152" height="200"';

    $blog_thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id(), $thumbsize);
?>

<div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-body row">
      <div class="col-md-2">
        <p class="stat__title">
          <a href="<?php echo $category_link; ?>" class="color--pink"><?php echo $category_name ?></a>
        </p>
      </div>
      <div class="col-md-6">
        <h3 class="blog-heading-large">
          <a href="<?php the_permalink();?>" class="color--pink"><?php the_title(); ?></a>
        </h3>
        <p class="font-xxsmall heading-underlined"><?php the_time('j F, Y'); ?></p>
        <?php
        $posttags = get_the_tags();
        if ($posttags) {
          echo '<p class="font-xxsmall">Tags: ';
          foreach($posttags as $tag) {
            echo '<a href="/blogs-news/tag/' . $tag->term_id . '" class="label label-primary">' . $tag->name . '</a> ';
          }
          echo '</p>';
        }
        ?>
      </div>
      <div class="col-md-4">
      <?php if ($blog_thumb_url) { ?>
        <img class="img-responsive" src="<?php echo $blog_thumb_url[0]; ?>" alt="Image: <?php the_title(); ?>">
      <?php } ?>
      </div>
    </div>
  </div>
</div><!-- .col-md-12 -->
  <?php endwhile;
  // end The Loop
  ?>


  <?php if ($the_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
    <nav class="prev-next-posts">
      <div class="prev-posts-link">
        <?php echo get_next_posts_link( 'Older Entries', $the_query->max_num_pages ); // display older posts link ?>
      </div>
      <div class="next-posts-link">
        <?php echo get_previous_posts_link( 'Newer Entries' ); // display newer posts link ?>
      </div>
    </nav>
  <?php } ?>

    <?php
      if (function_exists(custom_pagination)) {
        custom_pagination($the_query->max_num_pages,"",$paged);
      }
    ?>

  <?php wp_reset_postdata(); ?>

  <?php else: ?>
    <article>
      <h1>Sorry...</h1>
      <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    </article>
  <?php endif; ?>

 </div><!-- End container #main col -->
<!-- end content container -->

<?php get_footer(); ?>
