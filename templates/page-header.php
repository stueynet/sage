<?php use Roots\Sage\Titles; ?>
<?php if( ! get_field('hide-page-title') ) : ?>
	<div class="page-header">
		<h1>
			<?= Titles\title(); ?>
		</h1>
	</div>
<?php endif; ?>