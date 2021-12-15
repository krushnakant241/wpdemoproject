<?php 
	$feature_content_url=get_field('feature_content_url');
	$content_header = get_field('feature_content_header');
	$background_image = get_field('feature_content_bg');
	$background_mobile_image = get_field('feature_content_mobile_bg');
	$content_size = get_field('feature_content_size');
	$aligntment = get_field('feature_content_aligntment');
	$bg_color = get_field('feature_content_bg_color');
	$bg_img_align = get_field('feature_content_bg_option');

	$img_size = $bg_img_align=='full'?  'cover':'auto';
	$bg_imgalign = $bg_img_align=='full'?  'center': $bg_img_align;

	$fg_img_align = get_field('feature_content_bg_option');
	$content_aligntment = $aligntment=='left' ?  'left_align':  'right_align';
	
	switch ($content_size) {
		case 'one_third':
			$content_col='col-4';
			break;

		case 'two_third':
			$content_col='col-8';
			break;

		case 'half':
			$content_col='col-5';
			break;
		
		default:
			$content_col='col-5';
			break;
	}
	
	
?>
<section class="feature_content "  style="background-image: url(<?php echo $background_image['url']?>);background-color: <?php echo $bg_color?>; background-position: <?php echo $bg_imgalign; ?>; background-size: <?php echo $img_size;?> ">
	
	<?php if ( !empty( $background_mobile_image['url'] ) ){ ?>
		<div class="feature_content_image_mobile">
			<img src="<?php echo $background_mobile_image['url']?>">
		</div>
	<?php } ?>
	
	<div class="container">
		<div class="">
			<div class="feature_content__wrapper <?php echo esc_attr($content_col)?> <?php echo esc_attr($content_aligntment);?>" >
				<div class="feature_content__wrapper__title">
				
				<?php if( $content_header == 'Yes' && !empty(get_field('feature_content_heading'))): ?>
					<h2><?php echo get_field('feature_content_heading')?></h2>
				<?php endif;?>

						<div class="feature_content__wrapper__text">
							<?php echo get_field('feature_content')?>
						</div>
					<?php if($feature_content_url):?>
						
					<div class="button">
						<a href="<?php echo esc_url($feature_content_url['url'])?>" title="<?php echo esc_attr($feature_content_url['url'])?>" target="<?php echo esc_attr($feature_content_url['target'])?>">		<i class="fa fa-angle-right" aria-hidden="true"></i>
							 <?php echo $feature_content_url['title']?>
						</a>
					</div>
				<?php endif;?>
				</div>
			</div>
		</div>
	</div>
</section>