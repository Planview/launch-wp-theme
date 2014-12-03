<?php 
/**
 * Search Results post content
 */

 ?>

 <div class="search-result">
 	<h2 class="result-title h4">
 		<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo launch_search_icon(); ?><?php the_title(); ?></a>
 		<small class="search-type"><?php echo launch_search_type(); ?></small>
 	</h2>
 </div>