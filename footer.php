    </div><!--/inner-->
  </div><!--/main_content-->
</div><!--#body_wrap-->
<div id="footer">
  <div id="footer_wrap" class="wrap <?php if(get_option('zbr_body_layout')) echo get_option('zbr_body_layout'); ?>">
    <div class="inner">
      <div class="footer-bg clearfix">
        <p>Footer</p>
        <p><?php echo get_option('zbr_footer_text'); ?></p>
        <?php
          $footer_number = get_option('zbr_footer_widget_layout');
          for($i=1; $i<= $footer_number; $i++){ ?>
            <div class="footer_widget size size<?php echo $footer_number; if($i == $footer_number)echo " last-size" ?>">
              <ul>
                <?php
                  $footer_layout = 'footer_widget_'.$i;
                  dynamic_sidebar($footer_layout);
                ?>
              </ul>
            </div>
          <?php } ?>
      </div><!--/footer-bg-->
    </div><!--/inner-->
  </div><!--/footer-wrap-->
</div><!--/footer-->

<?php wp_footer(); ?>
</body>
</html>
