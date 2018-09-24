

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<!-- <input type="hidden" value="1" name="sentence" /> -->
	<input type="search" id="<?php echo $unique_id; ?>" class="col-12 search-field" placeholder="search" value="<?php echo get_search_query(); ?>" name="s" />
	<!-- <button type="submit" class="search-submit"><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'twentyseventeen' ); ?></span></button> -->
</form>
