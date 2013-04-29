<?php
/*-----------------------------------------------------------------------------------
  Plugin Name: Recent Posts Widget
  Plugin URI: http://zebrasweb.com
  Description: Displays recent blog posts with images from a standard post type.
  Version: 1.0
  Author: Zehra Ozdemir
  Author URI: http://zehwouaweb.com
-----------------------------------------------------------------------------------*/


add_action( 'widgets_init', 'zebras_recent_blog_posts' );


function zebras_recent_blog_posts() {
  register_widget( 'Zebras_Recent_Blog_Posts' );
}

class Zebras_Recent_Blog_Posts extends WP_Widget {

  function Zebras_Recent_Blog_Posts() {
    $widget_ops = array( 'classname' => 'example', 'description' => __('A widget that displays recent posts with thumbs ', 'example') );

    $control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'recent-post-widget' );

    $this->WP_Widget( 'recent-post-widget', __('Zebras Recent Posts', 'example'), $widget_ops, $control_ops );
  }

  function widget( $args, $instance ) {
    extract( $args );

    //Our variables from the widget settings.
    $title = apply_filters('widget_title', $instance['title'] );
    $number = $instance['number'];
    $image_size = $instance['image_size'];
    $show_info = isset( $instance['show_info'] ) ? $instance['show_info'] : false;

    echo $before_widget;

    // Display the widget title
    if ( $title )
      echo $before_title . $title . $after_title;

    //Display the name
    if ( $number > 0 )
      echo '<ul class="zebras_posts">';
      $args = array(
      'post_type' => 'post',
      'post_per_page' => $number);

      query_posts($args);
      if (have_posts()) : while (have_posts()) : the_post();
      $image = '';
      if ( has_post_thumbnail() ) {
        $image = get_the_post_thumbnail($post_id, array($image_size,$image_size) );
      }else{
        $image = '<span style="width:'.$image_size.'px;height:'.$image_size.'px" class="no-image"></span>';
      }
        echo '<li class="clearfix"><a href="'.get_permalink().'">'.$image.'</a><div class="zebras_widget_content"><a href="'.get_permalink().'"><h4>'.get_the_title() .'</h4><p class="readmore">Read More >> </p></a></div></li>';
      endwhile; endif;
      echo '</ul>';


    echo $after_widget;
  }

  //Update the widget

  function update( $new_instance, $old_instance ) {
    $instance = $old_instance;

    //Strip tags from title and number to remove HTML
    $instance['title'] = strip_tags( $new_instance['title'] );
    $instance['number'] = strip_tags( $new_instance['number'] );
    $instance['image_size'] = strip_tags( $new_instance['image_size'] );
    $instance['show_info'] = $new_instance['show_info'];

    return $instance;
  }


  function form( $instance ) {

    //Set up some default widget settings.
    $defaults = array( 'title' => __('Recent posts', 'example'), 'number' => __('4', 'example'),'image_size' => __('50', 'example'), 'show_info' => true );
    $instance = wp_parse_args( (array) $instance, $defaults ); ?>

    <?php // Widget Title: Text Input. ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'example'); ?></label>
      <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
    </p>

    <?php  //Text Input. ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Number of post to display: ', 'example'); ?></label>
      <input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" style="width:100%;" />
    </p>

    <?php  //Text Input. ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'image_size' ); ?>"><?php _e('Image Size: ', 'example'); ?></label>
      <input id="<?php echo $this->get_field_id( 'image_size' ); ?>" name="<?php echo $this->get_field_name( 'image_size' ); ?>" value="<?php echo $instance['image_size']; ?>" style="width:100%;" />
    </p>


    <?php //Checkbox. ?>
    <p>
      <input class="checkbox" type="checkbox" <?php checked( $instance['show_info'], on ); ?> id="<?php echo $this->get_field_id( 'show_info' ); ?>" name="<?php echo $this->get_field_name( 'show_info' ); ?>" />
      <label for="<?php echo $this->get_field_id( 'show_info' ); ?>"><?php _e('Display info publicly?', 'example'); ?></label>
    </p>

  <?php
  }
}

?>
