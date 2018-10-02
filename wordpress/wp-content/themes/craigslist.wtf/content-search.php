<?php


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

?>
