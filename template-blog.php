<?php
/*
Template Name: Blog Page
*/
?>

<?php get_header();?>
<?php $args = array(
  'post_type' => 'post');
?>
<?php query_posts($args); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="blog_info">
    <div class="post_date">
      <span class="month"><?php the_time('M'); ?></span>
      <span class="day"><?php the_time('j'); ?></span>
      <span class="year"><?php the_time('Y'); ?></span>
    </div><!--/post_date-->
    <div class="post_comments">
      <?php comments_popup_link(__('<span>0</span> Comment'), __('<span>1</span> Comment'), __('<span>(%)</span> Comments')); ?>
    </div><!--/post_comments-->
  </div><!--/blog_info-->

<div <?php post_class('post_content') ?> id="post-<?php the_ID(); ?>">
    <?php if ( has_post_thumbnail() ) {
      the_post_thumbnail();
    } ?>
    <h2 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
    <div class="meta"><?php _e("Filed under:"); ?> <?php the_category(',') ?> &#8212; <?php the_tags(__('Tags: '), ', ', ' &#8212; '); ?> <?php the_author() ?> @ <?php the_time('M j, Y') ?> <?php edit_post_link(__('Edit This')); ?></div>
<?php
                global $more;
                $more = 0;
              ?>
  <div class="storycontent">
    <?php //the_content(__('(more...)')); ?>
    <?php the_excerpt('read more'); ?>
  </div>

  <div class="feedback">
    <?php wp_link_pages(); ?>
  </div>

</div>

<?php comments_template(); // Get wp-comments.php template ?>

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php posts_nav_link(' &#8212; ', __('&laquo; Newer Posts'), __('Older Posts &raquo;')); ?>

<?php get_footer(); ?>
