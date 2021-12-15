<?php
$highlightbar_title = get_field('highlightbar_title');
$highlightbar_author_name = get_field('highlightbar_author_name');
$highlightbar_link = get_field('highlightbar_link');
$highlightbar_expand = get_field('highlightbar_expand');
$is_expanded='';
if(is_array($highlightbar_expand) && !empty($highlightbar_expand) ){
	$is_expanded = $highlightbar_expand[0];
}


?>




<?php if ( !empty( $highlightbar_title ) ) { ?>
	<section class="highlight_bar  <?php echo ($is_expanded == 'yes')? 'expanded_highlighbar':'short_highlighbar'; ?>">
		<div class="container">
			<div class="">
				<div class="highlight_bar__row">
					<?php if ($is_expanded == 'yes') { ?>
					<p><?php echo $highlightbar_title; ?></p>
				<?php } else{ ?>
					<h2><?php echo $highlightbar_title; ?></h2>
				<?php } ?>			
				</div>
			</div>
		<?php if ($is_expanded == 'yes') { ?>	
			<div class="row">
				<?php if ( !empty( $highlightbar_author_name ) ) { ?>
				<div class="author_name">
					<span>- <?php echo $highlightbar_author_name; ?></span>
				</div>
					<?php } ?>
				<?php if ( !empty( $highlightbar_link ) ) { ?>
				<div class="highlight_cta_link button">
					 <a href="<?php echo $highlightbar_link['url']; ?>" title="<?php echo esc_attr($highlightbar_link['title'])?>" target="<?php echo $highlightbar_link['target'] ?>"><?php echo $highlightbar_link['title']; ?></a>
				</div>
				<?php } ?>
			</div>
					
		<?php } ?>					
		</div>
	</section>
<?php } ?>

	