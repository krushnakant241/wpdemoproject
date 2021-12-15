<?php

if (get_field('sbm_theme_options_embed_superheader_content', 'option')) :
?>
	<div class="header__alert">
		<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
			<i class="fad fa-bolt"></i>
			<?= the_field('sbm_theme_options_embed_superheader_content', 'option'); ?>
			<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	</div>
<?php
endif;
?>
