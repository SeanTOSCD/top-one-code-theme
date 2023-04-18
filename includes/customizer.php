<?php

/**
 * Theme Customizer settings
 */
function toc_customize_register( $wp_customize ) {

	/**
	 * Add Customizer Sections
	 */

    /**
     * Color scheme
     */
	$wp_customize->add_section( 'toc_colors', array(
		'title'       => __( 'Theme Colors', 'toc' ),
		'description' => __( "These colors are available in the Block Editor. For custom CSS, use the CSS variables displayed above each color picker.", 'toc' ),
	) );

	$wp_customize->add_setting(
		'body_color',
		array(
			'default'           => '#002959',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'body_color',
			array(
				'label'   => __( 'Body Text Color', 'toc' ),
                'description' => __( 'This is the default color for body text. Also used for subdued links and other elements.', 'toc' ) . '<small><strong><br>CSS variable: var(--body)</strong></small>',
				'section' => 'toc_colors',
			)
		)
	);

	$wp_customize->add_setting(
		'subdued_body_color',
		array(
			'default'           => '#315b82',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'subdued_body_color',
			array(
				'label'   => __( 'Body Text Color - Subdued', 'toc' ),
				'description' => __( 'Typically the same hue as Body Text, but slightly lighter. Primarily used for subtitles.', 'toc' ) . '<small><strong><br>CSS variable: var(--subdued-body)</strong></small>',
				'section' => 'toc_colors',
			)
		)
	);

	$wp_customize->add_setting(
		'lightest_color',
		array(
			'default'           => '#f7f9fc',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'lightest_color',
			array(
				'label'   => __( 'Lightest Color', 'toc' ),
				'description' => __( "<strong>Extremely</strong> light, very close to white. Used for backgrounds that shouldn't be white, but are still very light.", 'toc' ) . '<small><strong><br>CSS variable: var(--lightest)</strong></small>',
				'section' => 'toc_colors',
			)
		)
	);

	$wp_customize->add_setting(
		'darkest_color',
		array(
			'default'           => '#002959',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'darkest_color',
			array(
				'label'   => __( 'Darkest Color', 'toc' ),
				'description' => __( "<strong>Extremely</strong> dark, similar to (or same as) Body Text. Used for backgrounds and other contrasting elements.", 'toc' ) . '<small><strong><br>CSS variable: var(--darkest)</strong></small>',
				'section' => 'toc_colors',
			)
		)
	);

	$wp_customize->add_setting(
		'action_color',
		array(
			'default'           => '#00bca9',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'action_color',
			array(
				'label'   => __( 'Action Color', 'toc' ),
				'description' => __( 'Buttons, links, and other action-oriented elements. Used sparingly for calls to action.', 'toc' ) . '<small><strong><br>CSS variable: var(--action)</strong></small>',
				'section' => 'toc_colors',
			)
		)
	);
}
add_action( 'customize_register', 'toc_customize_register' );

/**
 * Add color scheme CSS variables to front-end <head>
 *
 * These styles available in the Block Editor for customization, but are not used as default Block Editor styles.
 */
function toc_customizer_head_styles() {
	?>
    <style>
		:root{
			--body: <?php echo get_theme_mod( 'body_color', '#002959' ); ?>;
			--subdued-body: <?php echo get_theme_mod( 'subdued_body_color', '#315b82' ); ?>;
            --lightest: <?php echo get_theme_mod( 'lightest_color', '#f7f9fc' ); ?>;
            --darkest: <?php echo get_theme_mod( 'darkest_color', '#002959' ); ?>;
            --action: <?php echo get_theme_mod( 'action_color', '#00bca9' ); ?>;
            --subdued-action: <?php echo get_theme_mod( 'body_color', '#002959' ); ?>;
		}
    </style>
	<?php
}
add_action( 'wp_head', 'toc_customizer_head_styles' );

/**
 * Custom JS for Customizer controls
 *
 * @return void
 */
function toc_customize_controls_enqueue_scripts() {
	wp_enqueue_script( 'toc-custom-customizer', get_template_directory_uri() . '/assets/js/custom-customizer.js', array( 'jquery', 'customize-controls' ), THEME_VERSION, true );
}
add_action( 'customize_controls_enqueue_scripts', 'toc_customize_controls_enqueue_scripts' );

/**
 * Bind JS handlers for Customizer controls
 */
function toc_customize_preview_init() {
	wp_enqueue_script( 'toc-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), THEME_VERSION, true );
}
add_action( 'customize_preview_init', 'toc_customize_preview_init' );