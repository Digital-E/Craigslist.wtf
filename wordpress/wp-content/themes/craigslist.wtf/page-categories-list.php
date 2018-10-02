<?php
/* template name: Posts by Category */
get_header();

?>

<div class="main-wrapper container-listing-page container col-12">


<div class="main row">

  <!-- <div class="left-column d-none d-sm-block col-12 col-sm-5 col-md-5"> -->

  <div class="left-column col-12 col-sm-5 col-md-5">

    <p id="sub-category-display" class="col-12 col-sm-12">for sale > aphrodisiacs <span id="post-count-moved"></span></p>

<p class="isthismobile"></p>
<div class="scrollable">
    <div class="list">

      <?php

  $query = new WP_Query( array( 'category_name' => 'for-sale-aphrodisiacs') );
  $count = $query->post_count;
  echo '<div id="post-count" style="display:none;">'.$count.'</div>';

        if ( $query->have_posts() ) {
      echo '<div class="list-main">';
      while ( $query->have_posts() ) {
          $query->the_post();
          echo '
          <div class="list-item">
          <span class="list-item-line1">
          <span>' .  wp_ulike('get') . '</span>
          &nbsp<span class="post-date">' . get_the_date( 'M j', $before, $after, $echo ) . '</span>
          &nbsp<span class="title"><a class="the_link" href=' . get_the_permalink() . '>' . get_the_title() . '</a></span>
          &nbsp<span class="post-price btn btn-primary">' . get_field('price') . '</span>
          &nbsp<span class="post-location">(' . get_field('location') . ')</span>
          <div class="author">by ' . get_field('username') .'</div></div>
          ';

      }
      // echo '</div>';
  } else {
      // no posts found
     echo '<p>no posts</p>';
  }
  /* Restore original Post Data */
  wp_reset_postdata();

      ?>

    </div>
    </div>

    </div>
  </div>


  <div class="d-none d-sm-block right-column col-12 col-sm-7 col-md-7">
    <div id="listing_view"></div>

  </div>
  <footer>
  <div class="list-unstyled  d-none d-sm-inline-flex">
    <li>©craigslist.wtf</li>
    <li class="d-none d-sm-block"><a href="#">wtf?</a></li>
    <li class="d-none d-sm-block"><a href="#">disclaimer</a></li>
    <li class="d-none d-sm-block"><a href="#">subscribe</a></li>
    <li class="d-none d-sm-block"><a href="#">suggest</a></li>
    <li class="d-none d-sm-block"><a href="#">support</a></li>
    <li class="d-none d-sm-block"><a href="#">monthlies</a></li>
    <li class="d-none d-sm-block"><a href="#">contact</a></li>
  </div>
  </footer>

</div>



</div>




<script>
(function($){
  $(document).ready(function(){
    let postCount = $("#post-count").html();
    postCount = postCount + ' results';
    $("#post-count-moved").html(postCount);
  });

})(jQuery);



</script>

<?php get_footer(); ?>
