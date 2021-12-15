<?php 

$action_title = get_field('action_title');
$action_content  = get_field('action_content');
$action_link = get_field('action_link');

?>

<section class="action_bar">
 <div class="container"> 
       <div class=""> 

			<?php if ( !empty( $action_title ) ) { ?>
				<div class="action_bar__title">
					<h2><?php echo $action_title; ?></h2>
				</div>
			<?php } ?>

			<?php if ( !empty( $action_content ) ) { ?>
				<div class="action_bar__content">
					<p><?php echo $action_content; ?></p>
				</div>
			<?php } ?>

			<?php if ( !empty( $action_link ) ) { ?>
				<div class="button">
					<a href="<?php echo $action_link['url']; ?>" target="<?php echo $action_link['target']; ?>" ><?php echo $action_link['title']; ?></a>
				</div>
			<?php } ?>

		</div>
</div>
</section>
