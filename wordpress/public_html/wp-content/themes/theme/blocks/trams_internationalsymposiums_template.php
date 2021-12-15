<?php

$international_image = get_field('international_image');
$international_title = get_field('international_title');
$international_l_content = get_field('international_l_content');
$international_r_content = get_field('international_r_content');

?>

<section class="international-symposiums ">
	<div class="container">
		<div class="">
			<div class="international-symposiums__wrapper">
				<div class="international-symposiums__wrapper__inner">
					
					<?php if ( !empty( $international_image ) ) { ?>
						<div class="image">
							<img src="<?php echo $international_image['url'] ?>">
						</div>
					<?php } ?>
					
					<?php if ( !empty( $international_title ) ) { ?>
						<h2><?php echo $international_title; ?></h2>
					<?php } ?>
					
					<div class="content_wrap">
						<?php if ( !empty( $international_l_content ) ) { ?>
							<div class="left-content">
								<?php echo $international_l_content; ?>
							</div>
						<?php } ?>

						<?php if ( !empty( $international_r_content ) ) { ?>
							<div class="right-content">
								<?php echo $international_r_content; ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>	
</section>