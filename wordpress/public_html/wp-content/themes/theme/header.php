<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package sbm2021
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />

	<?php wp_enqueue_script('jquery'); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="content" class="site-content fade-in">
		<header>
			<?php include sbm_theme_path('/partials/header_alert.php'); ?>

			<div class="header">
				<?php include sbm_theme_path('/partials/header_navigation.php'); ?>
			</div>
		</header>
