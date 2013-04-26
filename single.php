<?php get_header();?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div <?php post_class('clearfix post_container') ?> id="post-<?php the_ID(); ?>">
    <div class="blog_info">
      <div class="post_date">
        <span class="month"><?php the_time('M'); ?></span>
        <span class="day"><?php the_time('j'); ?></span>
        <span class="year"><?php the_time('Y'); ?></span>
      </div><!--/post_date-->
      <div class="post_comments_number">
        <?php comments_popup_link(__('<span>0</span> Comment'), __('<span>1</span> Comment'), __('<span>(%)</span> Comments')); ?>
      </div><!--/post_comments-->
    </div><!--/blog_info-->

    <div class="post_content">
        <?php if ( has_post_thumbnail() ) {
          the_post_thumbnail();
        } ?>
        <h2 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        <div class="meta">
          Posted by <span class="author"><a href=""><?php the_author() ?></a></span>
          In <span class="post_category"><?php the_category(',') ?></span>
        </div><!--/meta-->
    <?php
      global $more;
      $more = 0;
    ?>
      <div class="storycontent">
        <?php //the_content(__('(more...)')); ?>
        <?php the_content(); ?>
      </div><!--/storycontent-->
      <div class="post_tags"><?php the_tags(__('TAGS: '), ' ', ''); ?></div>
      <div class="feedback">
        <?php wp_link_pages(); ?>
      </div><!--/feedback-->

    </div><!--/post content-->

    <div id="comments_section" class="clearfix"><?php comments_template(); // Get wp-comments.php template ?></div>
</div><!--/post-->
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php posts_nav_link(' &#8212; ', __('&laquo; Newer Posts'), __('Older Posts &raquo;')); ?>
        </div><!--/inner-->
      </div><!--/content-->
      <?php get_sidebar(); ?>

      <?php get_sidebar('homepage'); ?>
<?php get_footer(); ?>
