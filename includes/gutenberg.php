<?php
/**
 * Functions pertaining to the block editor
 */

/**
 * Add editor styles
 *
 * @return void
 */
function toc_editor_styles() {
	add_editor_style();
}
add_action( 'admin_init', 'toc_editor_styles' );

/**
 * Adjust editor styles
 *
 * @param $colors
 * @return mixed
 */
function toc_editor_color_palette() {

	$toc_colors = array(
		array(
			'name'  => __( 'White', 'toc' ),
			'slug'  => 'white',
			'color' => '#fff',
		),
		array(
			'name'  => __( 'Body Text', 'toc' ),
			'slug'  => 'body',
			'color' => get_theme_mod( 'body_color', '#002959' ),
		),
		array(
			'name'  => __( 'Body Text - Subdued', 'toc' ),
			'slug'  => 'subdued-body',
			'color' => get_theme_mod( 'subdued_body_color', '#315b82' ),
		),
		array(
			'name'  => __( 'The Lightest Color', 'toc' ),
			'slug'  => 'the-lightest',
			'color' => get_theme_mod( 'lightest_color', '#f7f9fc' ),
		),
		array(
			'name'  => __( 'The Darkest Color', 'toc' ),
			'slug'  => 'the-darkest',
			'color' => get_theme_mod( 'darkest_color', '#002959' ),
		),
		array(
			'name'  => __( 'Action', 'toc' ),
			'slug'  => 'action',
			'color' => get_theme_mod( 'action_color', '#00bca9' ),
		),
		array(
			'name'  => __( 'Translucent Background - Light', 'toc' ),
			'slug'  => 'translucent-light',
			'color' => 'rgba(255,255,255,0.1)',
		),
		array(
			'name'  => __( 'Translucent Background - Dark', 'toc' ),
			'slug'  => 'translucent-dark',
			'color' => 'rgba(0,0,0,0.1)',
		),
	);

	add_theme_support( 'editor-color-palette', $toc_colors );
}
add_action( 'after_setup_theme', 'toc_editor_color_palette' );