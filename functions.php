<?php
/**
 * Tada Framework functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Five
 * @since Tada Framework 1.0
 */

// Enqueues editor-style.css in the editors.
if ( ! function_exists( 'tada_framework_editor_style' ) ) :
	/**
	 * Enqueues editor-style.css in the editors.
	 *
	 * @since Tada Framework 1.0
	 *
	 * @return void
	 */
	function tada_framework_editor_style() {
		add_editor_style( get_parent_theme_file_uri( 'assets/css/editor-style.css' ) );
	}
endif;
add_action( 'after_setup_theme', 'tada_framework_editor_style' );

// Enqueues style.css on the front.
if ( ! function_exists( 'tada_framework_enqueue_styles' ) ) :
	/**
	 * Enqueues style.css on the front.
	 *
	 * @since Tada Framework 1.0
	 *
	 * @return void
	 */
	function tada_framework_enqueue_styles() {
		// Main theme stylesheet
		wp_enqueue_style(
			'tada-framework-style',
			get_parent_theme_file_uri( 'style.css' ),
			array(),
			wp_get_theme()->get( 'Version' )
		);

		// Custom CSS from assets/css/style.css
		wp_enqueue_style(
			'tada-custom-style',
			get_parent_theme_file_uri( 'assets/css/style.css' ),
			array(),
			wp_get_theme()->get( 'Version' )
		);

		// Custom JS from assets/js/main.js
		wp_enqueue_script(
			'tada-custom-script',
			get_parent_theme_file_uri( 'assets/js/main.js' ),
			array( 'jquery' ), // Optional dependency
			wp_get_theme()->get( 'Version' ),
			true // Load in footer
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'tada_framework_enqueue_styles' );

// Registers custom block styles.
if ( ! function_exists( 'tada_framework_block_styles' ) ) :
	/**
	 * Registers custom block styles.
	 *
	 * @since Tada Framework 1.0
	 *
	 * @return void
	 */
	function tada_framework_block_styles() {
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __( 'Checkmark', 'tada-framework' ),
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
	}
endif;
add_action( 'init', 'tada_framework_block_styles' );

// Registers pattern categories.
if ( ! function_exists( 'tada_framework_pattern_categories' ) ) :
	/**
	 * Registers pattern categories.
	 *
	 * @since Tada Framework 1.0
	 *
	 * @return void
	 */
	function tada_framework_pattern_categories() {

		register_block_pattern_category(
			'tada_framework_page',
			array(
				'label'       => __( 'Pages', 'tada-framework' ),
				'description' => __( 'A collection of full page layouts.', 'tada-framework' ),
			)
		);

		register_block_pattern_category(
			'tada_framework_post-format',
			array(
				'label'       => __( 'Post formats', 'tada-framework' ),
				'description' => __( 'A collection of post format patterns.', 'tada-framework' ),
			)
		);
	}
endif;
add_action( 'init', 'tada_framework_pattern_categories' );

// Include necessary files.
require_once get_template_directory() . '/inc/TGM/tgm.php';