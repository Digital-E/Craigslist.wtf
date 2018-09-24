<?php get_header(); ?>
<div class="main-wrapper container-listing-page container col-12">
<div class="main row">
<div class="left-column left-column-search d-sm-block col-12 col-sm-12 col-md-12">
  <?php
  $str = get_search_query();
  ?>

  <?php global $wp_query;
  $total_results = $wp_query->found_posts;

   ?>

  <!-- <div class="list">
  <div class="list-item"> -->


<?php
    if(have_posts()) :
      echo '<span class="search-category class="col-12 col-sm-none">'. $total_results .' result(s) for <b>' . get_search_query() .'</b></span></br>';
      while(have_posts()) : the_post();  ?>

      <?php get_template_part('content', 'search');?>

    <?php endwhile;?>
    <?php else : ?>
<span class="search-category">0 results for <?php echo $str ?> ... an absolute shame. </span> </br>
<a href="<?php echo esc_url( home_url( '/?page_id=329' ) ); ?>"><button class="button-search-page" type="button" name="button">post a listing about <b><?php echo $str ?></b> > </button></a>
    <?php endif;
    wp_reset_query();
     ?>

</div>





<div class="left-column left-column-search secondary-queries d-sm-block col-12 col-sm-12 col-md-12">

<div class="secondary-queries">

  <!-- Second Query -->

     <?php $exploded = explode(" ",$str); ?>

     <?php
     if(count($exploded) > 1 && $total_results == 0 ) { ?>

     <?php

     $args = array(
         's' => $exploded[0],
         'posts_per_page'   => -1,
         'post_type'        => 'post',
     );


     $my_secondary_loop = new WP_Query($args);
     $count = $my_secondary_loop->post_count;
     echo '<span class="search-category">' . $count . ' result(s) for <b>' . $exploded[0] . '</b></span></br>';
     if( $my_secondary_loop->have_posts() ):
         while( $my_secondary_loop->have_posts() ): $my_secondary_loop->the_post();
            get_template_part('content', 'search');

         endwhile;
     endif;
     wp_reset_postdata(); ?>



     <!-- Third Query -->

     <?php $exploded = explode(" ",$str); ?>

     <?php

     $args = array(
         's' => $exploded[1],
         'posts_per_page'   => -1,
         'post_type'        => 'post',
     );


     $my_third_loop = new WP_Query($args);
     $count = $my_third_loop->post_count;
     echo '<span class="search-category">' . $count . ' result(s) for <b>' . $exploded[1] . '</b></span></br>';
     if( $my_third_loop->have_posts() ):
         while( $my_third_loop->have_posts() ): $my_third_loop->the_post();
            get_template_part('content', 'search');

         endwhile;
     endif;
     wp_reset_postdata(); ?>
<?php } ?>

<!-- </div>
</div> -->


</div>

</div>

</div>
</div>
</div>

<script>
//
// (function($){
// $(document).ready(function(){
//   let searchQuery = $('#general-nav-search form input:nth-child(1)').attr('value');
//   let searchQueryArray = searchQuery.split(' ');
//   let listItems = $('.list-item a');
//   let listItemsArray = Array.from(listItems);
//   let newArray = [];
//
// console.log(newArray);
//
//   for(var i = 0; i < searchQueryArray.length; i++) {
//     console.log(searchQueryArray[i]);
//     var div = document.createElement("div");
//     div.className = searchQueryArray[i]
//     div.innerHTML = "Results for " + searchQueryArray[i];
//     document.getElementsByClassName('left-column')[0].appendChild(div);
//
//     for(var j = 0; j < listItemsArray.length; j++) {
//       newArray[j] = listItemsArray[j].innerHTML.toLowerCase().split(' ');
//       for (var k = 0; k < searchQueryArray.length; k++) {
//         if(searchQueryArray[i] == newArray[j][k]) {
//           var div = document.createElement("div");
//           div.innerHTML = newArray[j].join(' ');
//           document.getElementsByClassName('left-column')[0].appendChild(div);
//           console.log(newArray[j].join(' '));
//
//         }
//       }
//     }
//   }
//
// });
//
//
//
//
// })(jQuery);
</script>

<?php get_footer(); ?>
