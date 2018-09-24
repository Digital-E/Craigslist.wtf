<?php get_header(); ?>
<div class="main-wrapper container-listing-page container col-12">
<div class="main row">
<div class="left-column d-sm-block col-12 col-sm-5 col-md-5">
  <div class="list">
  <div class="list-item">

    <?php
    if(have_posts()) :
      while(have_posts()) : the_post();  ?>

      <?php get_template_part('content', 'search') ?>

    <?php endwhile;
    endif;
    wp_reset_query();
     ?>



</div>
</div>
</div>
</div>
</div>


<?php get_footer(); ?>
