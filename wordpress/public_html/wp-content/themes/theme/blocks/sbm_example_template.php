<?php

/**
 * example_view.php
 * This document should render the block functions created in the previous folder
 */

// $title = get_field('sbm-b-article-previews--title');
// $articles = get_field('sbm-b-article-previews--articles');

// $queryArgs = array(
// 	'post_type' => 'post',
// 	'post_status' => 'publish',
// 	'posts_per_page' => $articles
// );
// $query = new WP_Query($queryArgs);


?>

<!-- ALL BLOCKS SHOULD BE WRAPPED IN A SECTION WITH THE BLOCK AS CLASS NAME -->
<section class="sbm_example">
	<h1> Hello <? the_field('sub_title'); ?> </h1>
</section>
