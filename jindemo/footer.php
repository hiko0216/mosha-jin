<footer>
  <div class="container foot">
    <div class="row footer justify-content-around">



  <?php if ( is_active_sidebar('footer') ) : ?>
   <?php dynamic_sidebar('footer'); ?>
  <?php endif; ?>



      
  </div>
  <div class="fborder"></div>
  <div class="cp">
    <p class="text-center"><?php bloginfo('name'); ?> Copyright 2012<?php if(date("Y")!=2012)echo date("-Y");?>All rights</p>
  </div>
</footer>
  <?php wp_footer(); ?>
  </body>
</html>
