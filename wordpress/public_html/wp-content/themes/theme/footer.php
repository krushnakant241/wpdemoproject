<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * The template for displaying the footer
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>
</div><!-- #content -->
<footer class="site-footer">
	<?php include sbm_theme_path('/partials/footer_menu.php'); ?>
	<?php include sbm_theme_path('/partials/footer_notice.php'); ?>
</footer>
<?php wp_footer(); ?>

<!-- DEVELOPMENT ONLY - REMOVE ON GO LIVE -->
<?php include sbm_theme_path('/partials/footer_development.php'); ?>
<!-- END DEVELOPMENT ONLY - REMOVE ON GO LIVE -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
