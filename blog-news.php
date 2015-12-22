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
$postsperpage = get_option('posts_per_page');
// cat of -18 means exclude spatial portal help posts
$args = array(
  'posts_per_page'   => $postsperpage,
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
  $postCounter = 0;
  // start The Loop
  while ( $the_query->have_posts() ) : $the_query->the_post();
    $postCounter = ++$postCounter;

    // 'thumb-lg' $imgsize = 'width="316" height="200"';
    // 'thumb-med' $imgsize = 'width="152" height="200"';
    // 'thumbnail' $imgsize = 'width="70" height="82"';
    $thumbsize = 'thumb-med';

    $blog_thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id(), $thumbsize);

    if ( $paged == 1 && $postCounter == 1){
      // first post on first page gets featured display
      $blog_thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumb-lg');
?>
<div class="row-fluid">
  <div class="col-lg-12">
<?php if ($blog_thumb_url) { ?>
    <img class="img-responsive" src="<?php echo $blog_thumb_url[0]; ?>" alt="Main image: <?php the_title(); ?>">
<?php } ?>
    <div class="panel panel-default">
      <div class="panel-body row">
        <div class="col-md-2">
          <p class="stat__title">
            <?php
            $this_post_categories = get_the_category();
            post_category_links($this_post_categories);
            ?>
          </p>
        </div>
        <div class="col-md-10">
          <h3 class="blog-heading-large">
            <a href="<?php the_permalink();?>" class="color--mellow-red"><?php the_title(); ?></a>
          </h3>
          <p class="font-xxsmall heading-underlined"><?php the_time('j F, Y'); ?></p>
          <?php
          $posttags = get_the_tags();
          if ($posttags) {
            echo '<p class="font-xxsmall">Tags: ';
            foreach($posttags as $tag) {
              echo '<a href="/tag/' . $tag->slug . '" class="label label-primary">' . $tag->name . '</a> ';
            }
            echo '</p>';
          }
          ?>
        </div>
      </div>
    </div>
  </div><!-- .col-lg-12 -->
</div><!-- .row-fluid -->
<?php
    } else {
      // all other posts get normal display
?>

<div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-body row">
      <div class="col-md-2">
        <p class="stat__title">
          <?php
          $this_post_categories = get_the_category();
          post_category_links($this_post_categories);
          ?>
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
            echo '<a href="/tag/' . $tag->slug . '" class="label label-primary">' . $tag->name . '</a> ';
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
  <?php
    }
  endwhile;
  // end The Loop
  ?>


  <?php if ($the_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
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

 </div><!-- End container #main col -->
<!-- end content container -->

<?php get_footer(); ?>
