<?php get_header();?>
<?php
$admin = dirname( __FILE__ ) ;
$admin = substr( $admin , 0 , strpos( $admin , "wp-content" ) ) ;
echo basename( dirname( __FILE__ ));
?>
<script type="text/javascript" src="<?php echo $admin; ?>wp-includes/js/tinymce/tiny_mce_popup.js"></script>

<style type="text/css" src="<?php echo $admin; ?>wp-includes/js/tinymce/themes/advanced/skins/wp_theme/dialog.css"></style>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <?php setPostViews(get_the_ID()); ?>

  <div <?php post_class('clearfix post_container') ?> id="post-<?php the_ID(); ?>">
    <div class="blog_info">
      <div class="post_date">
        <span class="month"><?php the_time('M'); ?></span>
        <span class="day"><?php the_time('j'); ?></span>
        <span class="year"><?php the_time('Y'); ?></span>
      </div><!--/post_date-->
      <div class="post_comments_number">
        <?php comments_popup_link(__('<span>0</span> Comment'), __('<span>1</span> Comment'), __('<span>%</span> Comments')); ?>
      </div><!--/post_comments-->
    </div><!--/blog_info-->

    <div class="post_content single_post">
      <h1 class="post_title"><?php the_title(); ?></h1>
      <div class="meta">
        Posted by <span class="author"><a href=""><?php the_author() ?></a></span>
        In <span class="post_category"><?php the_category(',') ?></span>
      </div><!--/meta-->

        <div class="post_article_container">
          <div class="storycontent">
            <?php the_content(); ?>
          </div><!--/storycontent-->
        </div><!--/post_article_container-->
      <div class="feedback">
        <?php wp_link_pages(); ?>
      </div><!--/feedback-->

    </div><!--/post content-->
    <div class="post_tags"><?php the_tags(__(''), ' ', ''); ?></div>
</div><!--/post-->
<?php comments_template(); // Get wp-comments.php template ?>
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php posts_nav_link(' &#8212; ', __('&laquo; Newer Posts'), __('Older Posts &raquo;')); ?>
      </div><!--/content-->
      <?php get_sidebar(); ?>
<?php get_footer(); ?>
