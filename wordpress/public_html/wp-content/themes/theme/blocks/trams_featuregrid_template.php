<?php

$feature_grid_title = get_field('trams_feature_grid_title');
$feature_grid_url = get_field('feature_grid_url');
$trams_feature_grid_repeater = get_field('trams_feature_grid_repeater');
$alignment = get_field('content_alignment');
$bg_color = get_field('feature_grid_bg_color');
$content_align = ($alignment=='left')? 'text-left':'text-center';

$total_row=0;
foreach ($trams_feature_grid_repeater as $value) {
	$total_row++;
}
?>

<section class="feature_grid  animatable fadeIn" style="background-color: <?php echo $bg_color; ?>">
	<div class="container">
		<div class="">
			
			<?php if ( !empty( $feature_grid_title ) ) { ?>
				<div class="feature_grid__title">
					<h2><?php echo $feature_grid_title; ?></h2>
				</div>
			<?php } ?>

			<?php if ( !empty($trams_feature_grid_repeater) ) { ?>
				<div class="feature_grid__wrapper d-flex <?php echo $total_row==3?'row_three_wrap':'row_four_wrap';?>">
					
					<?php foreach ($trams_feature_grid_repeater as $key => $trams_feature_grid_value) { ?>
						<div class="feature_grid__wrapper__wrap col <?php echo $total_row==3?'row_three':'row_four';?>">
							<div class="feature_grid__wrapper__wrap__inner <?php echo esc_attr($content_align);?>">
								
								<?php if ( !empty( $trams_feature_grid_value['feature_image'] ) ) { ?>
									<div class="feature_grid__wrapper__wrap__inner__image align-items-center justify-content-center  d-flex rounded-circle <?php echo $alignment=='center'?'m-auto':'m-0';?> ">
										<img src="<?php echo esc_url($trams_feature_grid_value['feature_image']['url']); ?>" alt="<?php echo esc_html__('Feature Image') ?>">
									</div>
								<?php } ?>
								<?php if ( !empty( $trams_feature_grid_value['feature_title'] ) ) { ?>	
									<h5 class="text-uppercase"><?php echo $trams_feature_grid_value['feature_title']; ?></h5>
								<?php } ?>
								<?php if ( !empty( $trams_feature_grid_value['feature_description'] ) ) { ?>
									<?php echo $trams_feature_grid_value['feature_description']; ?>
								<?php } ?>

							</div>
						</div>
					<?php } ?>

				

				</div>
			<?php } ?>

		</div>
			<?php if ( !empty( $feature_grid_url ) ) { ?>
					<div class="feature_grid__url button">
						<a href="<?php echo $feature_grid_url['url']; ?>" target="<?php echo $feature_grid_url['target'] ?>"><?php echo $feature_grid_url['title']; ?></a>
					</div>
			<?php } ?>
	</div>
</section>