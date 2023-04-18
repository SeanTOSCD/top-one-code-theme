<?php

/**
 * Register block pattern category.
 *
 * @return void
 */
function toc_register_block_pattern_category() {

	register_block_pattern_category(
		'toc-page-sections-elements',
		array(
			'label' => __( 'Page Sections & Elements', 'toc' )
		)
	);
}
add_action( 'init', 'toc_register_block_pattern_category' );
