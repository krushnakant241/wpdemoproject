<?php
$trams_pagerheader_title = get_field('trams_pagerheader_title');
$trams_header_subtitle = get_field('trams_pagerheader_subtitle');
$trams_header_textarea = get_field('trams_pagerheader_textarea');
$trams_header_img = get_field('trams_pagerheader_img');
$trams_pagerheader_mobile_image = get_field('trams_pagerheader_mobile_image');
$text_color=get_field('pagerheader_text_color');
$color_class = !empty($text_color)? $text_color:'';
?>

<section class="page_header full set-image  fade-in " style="background-image: url(<?php echo esc_url( $trams_header_img['url'] ); ?>) ;">
	<div class="page_header_mobile_bg get-image">
		<img src="<?php echo esc_url( $trams_pagerheader_mobile_image['url'] ); ?>">
	</div>
	<div class="page_header__top">
		<div class="container">
			<div class="row_content">
				<?php if ( !empty( $trams_pagerheader_title ) ) { ?>
				    <h1><?php echo $trams_pagerheader_title; ?></h1>
				<?php } ?>
				
								
				<?php if ( !empty( $trams_header_subtitle ) ) { ?>
				    <p><?php echo $trams_header_subtitle; ?></p>
				<?php } ?>
			</div>
		</div>	
	</div>
	<div class="page_header__bottom">
		<div class="container">
			<div class="row_content">
				<div class="content">
					<?php if ( !empty( $trams_header_textarea ) ) { ?>
					    <h3 class="<?php echo esc_attr($color_class);?>"><?php echo $trams_header_textarea; ?></h3>
					<?php } ?>
					
				</div>
			</div>
		</div>
	</div>
 </div>
</section>