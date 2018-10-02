
   <div id="listing_view">
    <?php $image1 = get_field('image_1');
          $image2 = get_field('image_2');
          $image3 = get_field('image_3');
          $image4 = get_field('image_4');
          $image5 = get_field('image_5');
          $images = array($image1, $image2, $image3, $image4, $image5) ?>
    <?php the_content();?>
   <div id="title"><h2><?php the_field('title') ?>&nbsp-&nbsp<?php the_field('price') ?>&nbsp<span id="listing_view_location">(<?php the_field('location') ?>)</span></h2></div>
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
     <?php the_field('description') ?>
   </div>
   <br>
   <div class="listing-author">
     by <a href="#"><?php the_field('username') ?></a>
   </div>
   </div>
</div>

<script>

  var numberOfLikes = jQuery(".count-box").html();
  jQuery(".numberOfLikes").append(numberOfLikes);

  //Start FlexSlider

jQuery('.flexslider').flexslider();

</script>
