<div id="sidebar">
  <ul>
    <?php $active_sidebar = is_active_sidebar('homepage-sidebar'); ?>
    <?php if ($active_sidebar) { ?>
      <?php dynamic_sidebar('homepage-sidebar'); ?>
    <?php }else{  ?>
      <li>Please activate some widgets </li>
    <?php } ?>

  </ul>
</div>
