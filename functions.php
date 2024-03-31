<?php

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}


function testtheme_setup() : void {

	load_theme_textdomain( 'testtheme', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );


	add_theme_support( 'title-tag' );


	add_theme_support( 'post-thumbnails' );


	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'testtheme' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	add_theme_support(
		'custom-background',
		apply_filters(
			'testtheme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	add_theme_support( 'customize-selective-refresh-widgets' );


	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'testtheme_setup' );


function testtheme_content_width() :void {
	$GLOBALS['content_width'] = apply_filters( 'testtheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'testtheme_content_width', 0 );


function testtheme_widgets_init(): void
{
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'testtheme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'testtheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'testtheme_widgets_init' );


function testtheme_scripts(): void
{
    wp_enqueue_style('init', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('normalize-style', get_template_directory_uri() . '/assets/style/normalize.css');
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/style/main.css');
    wp_enqueue_script('mail-script', get_template_directory_uri() . '/assets/js/mail.js', array('jquery'), _S_VERSION, true);
    $translation_array = ['ajax_url' => admin_url('admin-ajax.php')];
    wp_localize_script('mail-script', "lets", $translation_array);





}
add_action( 'wp_enqueue_scripts', 'testtheme_scripts' );


require get_template_directory() . '/ajax/mail-form.php';



if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Mail Form Settings',
        'menu_title'    => 'Mail Form Settings',
        'menu_slug'     => 'mail-form-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}


function dd($variable)
{
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
}