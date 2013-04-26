<div id="sidebar">
  <ul>
    <?php $active_sidebar1 = is_active_sidebar('sidebar1'); ?>
    <?php if ($active_sidebar1) { ?>
      <?php dynamic_sidebar('sidebar1'); ?>
    <?php }else{  ?>
      <li>Please activate some widgets </li>
    <?php } ?>

  </ul>
</div>
