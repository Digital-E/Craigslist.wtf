<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
get_header(); ?>


<div class="main-wrapper container-listing-page container col-12">


<div class="main row">
<div class="left-column d-none d-sm-block col-12 col-sm-5 col-md-5">
  <p id="sub-category-display" class="d-none d-sm-block col-12 col-sm-12"><?php echo get_the_category( $postId )[1]->name ?> > <?php echo get_the_category( $postId )[0]->name ?> <span id="post-count-moved"></span></p>
<?php global $post;
$postId = $post->ID;
$categoryID = get_the_category($postId)[0]->term_id;
?>
  <p class="isthismobile"></p>
  <div class="scrollable">
  <div class="list">
    <?php
    // echo '<div>'. get_the_category($postId)[0]->term_id . '</div>';
$args = array('cat' => ''.$categoryID.'' );
$query = new WP_Query( $args );
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
        &nbsp<span class="author">by ' . get_field('username') .'</span></div>
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
<div class="right-column col-12 col-sm-7 col-md-7" >
         <div id="listing_view">
           <?php $image1 = get_field('image_1');
                 $image2 = get_field('image_2');
                 $image3 = get_field('image_3');
                 $image4 = get_field('image_4');
                 $image5 = get_field('image_5');
                 $images = array($image1, $image2, $image3, $image4, $image5) ?>
           <?php if(function_exists('wp_ulike')) wp_ulike('get');?>
           <div id="title"><h2><?php the_field('title') ?>&nbsp-&nbsp<?php the_field('price') ?>&nbsp<div id="listing_view_location">(<?php the_field('location') ?>)</div></h2></div>
           <div class="scrollable">
             <div class="scrollable-gradient"></div>
             <div class="scrollable-spacer"></div>
           <div><span id="numberOfViews"><?php echo pvc_get_post_views( $post_id = $postId );?> views &nbsp &nbsp</span><span id="numberOfLikes"><span class="numberOfLikes"></span> interested</span></div>

           <?php

           if( $images ): ?>
               <div id="slider" class="flexslider">
                   <ul class="slides">
                     <!-- Loop through image array -->
                       <?php foreach( $images as $image ): ?>
                         <!-- Is image field set ? -->
                         <?php if(!empty($image)) : ?>
                           <!-- If image field is set create slide (i/5) -->
                           <li>
                               <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                           </li>
                           <?php endif; ?>

                       <?php endforeach; ?>
                   </ul>
               </div>

           <?php endif; ?>



           <div class="listing-description">
             <?php the_field('description')?>
           </div>
           <br>
           <div class="listing-author">
             by <a href="#"><?php the_field('username') ?></a>
           </div>
            </div>

      </div>

      <footer class="footer-mobile">
      <div class="list-unstyled">
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

            var numberOfLikes = $(".right-column .count-box");
            $(".numberOfLikes").append(numberOfLikes);

        })
      })(jQuery);

      </script>

			<?php

			// Start the loop.
			// while ( have_posts() ) : the_post();

			// Previous/next post navigation.
			// the_post_navigation( array(
			// 	'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentyfifteen' ) . '</span> ' .
			// 		'<span class="screen-reader-text">' . __( 'Next post:', 'twentyfifteen' ) . '</span> ' .
			// 		'<span class="post-title">%title</span>',
			// 	'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentyfifteen' ) . '</span> ' .
			// 		'<span class="screen-reader-text">' . __( 'Previous post:', 'twentyfifteen' ) . '</span> ' .
			// 		'<span class="post-title">%title</span>',
			// ) );

		// End the loop.
		// endwhile;
		?>


		</main><!-- .site-main -->
	</div><!-- .content-area -->
<?php get_footer(); ?>
