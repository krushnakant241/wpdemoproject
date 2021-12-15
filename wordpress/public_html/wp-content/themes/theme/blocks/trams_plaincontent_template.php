<?php

$plain_content = get_field('plain_content');
$plain_content_half_version = get_field('plain_content_half_version');
$plain_content_size = get_field('plain_content_size');
$plain_content_title = get_field('plain_content_title');
$plain_content_img = get_field('plain_content_img');
$plain_content_img_align = get_field('plain_content_img_align');
$plain_content_bgcolor = get_field('plain_content_bgcolor');
$plain_content_cta = get_field('plain_content_cta');
$plain_content_css_class = get_field('plain_content_css_class');
$plain_content_padding = get_field('plain_content_padding');
$plain_content_border = get_field('plain_content_border');

	
	switch ($plain_content_size) {
		case 'full':
			$content_col='col-12';
			$content_class='full_ver';
			break;

		case 'one_third':
			$content_col='col-4';
			$content_class='one_third_ver';
			break;

		case 'two_third':
			$content_col='col-9';
			$content_class='two_third_ver';
			break;

		case 'one_half':
			$content_col='col-6';
			$content_class='one_half_ver';
			break;

		case 'half':
			$content_col='col-6';
			$content_class='half_ver';
			break;
		
		default:
			$content_col='col-6';
			break;
	}

	switch ($content_col) {
		case 'col-6':
			$nex_col='col-6';
			break;

		case 'col-9':
			$nex_col='col-3';
			break;

		case 'col-4':
			$nex_col='col-8';
			break;
		
		case 'col-12':
			$nex_col='col-12';
			break;
		
		default:
			$nex_col='col-6';
			break;
	}
?>

<section class="plain-content <?php echo esc_attr($plain_content_css_class); ?>"  style=" background-color: <?php echo $plain_content_bgcolor;?>; padding: <?php echo $plain_content_padding; ?> !important; border: <?php echo $plain_content_border; ?>;">
	<div class="container">
		<div class="row d-flex align-items-center ">
			<?php if(!empty($plain_content_title)){?>	
				<div class="plain_content__wrapper__title">
					<h2><?php echo $plain_content_title;?></h2>
				</div>						
						
				<?php } ?>
				
	<?php if($plain_content_size=='half'){ ?>
			<div class="plain_content__wrapper  <?php echo esc_attr($content_col)?> ">
				
				<div class="plain_content__wrapper__text">
					<?php echo $plain_content;?>
				</div>
			
				
			</div>
			<div class="plain_content__wrapper  <?php echo esc_attr($content_col)?>">
				
				<div class="plain_content__wrapper__text">
					<?php echo $plain_content_half_version;?>
				</div>
			
				
			</div>
			
		<?php }else{?>
			<div class="plain_content__wrapper  <?php echo esc_attr($content_col)?> <?php echo $plain_content_img_align=='right' ? 'order-lg-0':'order-lg-1'; ?>">
				
				<div class="plain_content__wrapper__text">
					<?php echo $plain_content;?>
				</div>
			
				<?php if($plain_content_cta){ ?>
					<div class="button">
						<a href="<?php echo esc_url($plain_content_cta['url']) ?>" alt="<?php echo esc_attr($plain_content_cta['title']) ?>" target="<?php echo $plain_content_cta['target']?>">
							<?php echo $plain_content_cta['title'];?>
						</a>
					</div>
				<?php } ?>
			
			</div>
			
			<?php if(!empty($plain_content_img)){?>
			<div class="plain_content__image <?php echo esc_attr($nex_col)?> <?php echo $plain_content_img_align=='right' ? 'order-lg-1':'order-lg-0'; ?>">
					<img src="<?php echo esc_url($plain_content_img['url'])?>" alt="<?php echo $plain_content_title ?>" class="mw-100" />
			</div>
			<?php } ?>
	<?php }	?>
			
		</div>
	</div>
</section>
