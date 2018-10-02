
<div class="list">

  <?php
  //Get Category Name
  $postId2 = $_REQUEST['data'];
  $categoryName = '\''.get_the_category($postId2)[0]->category_nicename.'\'';

  //Get Category List
$query = new WP_Query( array( 'category_name' => $categoryName) );
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
