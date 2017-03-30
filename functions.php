<?php 

//  Custom Functions
//  In the spirit of Zenhabit's minimalism, the functions will be as minimal as possible.
//  The idea here is to integrate the installation process with the Wordpress Admin Panel.
//  There are also some security-related and Wordpress bloat-trimming code.
//
//  All this to slightly improve an already marvelous theme!


//  Add Custom Menu Support
add_theme_support( 'menus' );
register_nav_menus(  
        array(  
            //  'sidebar_menu'           => 'Sidebar Main Navigation',
			//  REMOVED IN zh2. Maybe I will add it in an expansion to the theme.  
            //  'also_see_menu'          => 'Also See Links on Archives page.',
			//  REMOVED IN zh2. Maybe I will add it in an expansion to the theme.
			'social_menu'            => 'Social Menu.',
			'footer_menu'            => 'Footer Menu.')  
        );  

//  Remove junk from head, including the current Wordpress version number, which is a big security no-no.
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

//  Integrate the zenhabits2 installation process with the Wordpress Admin Panel


     // Adding installation functions to the Wordpress Theme Customizer:
	 
function zh2_theme_customizer( $wp_customize ) {
    $wp_customize->add_section( 'zh2', array(
        'title' => __('ZH2 Settings'), // The title of section
        'description' => __('ZH 2 Settings'), // The description of section
    ) );


    $wp_customize->remove_section( 'static_front_page');
	// Remove the /// comment lines below to remove the Tagline field from the Title & Tagline section. Not recommended.
	/// $wp_customize->remove_control( 'blogdescription');


    // This creates the dropdown list of pages in the Theme Customizer and outputs the slug into the link instead of the page_ID.
	$list_pages = array();
	$list_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$list_pages[''] = __('Select a page:');
	foreach ($list_pages_obj as $page) {
		$list_pages[$page->post_name] = $page->post_title;
	}

    // Check box to show/hide tagline.
	$wp_customize->add_setting( 'zh2_tagline', array(
        'default' => 0,
	) );

	$wp_customize->add_control( 'zh2_tagline', array(
        'label' => __('Only display the title. (Hide the tagline)'),
        'type' => 'checkbox',
        'section' => 'title_tagline',
	) );

	// Page select dropdown for the Title Tagline Link.	
    $wp_customize->add_setting('zh2_archives_pages_dropdown', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('zh2_archives_link', array(
        'label'      => __('Select your Archives Page from the list. (creates link for "See all posts >>")', 'zh2'),
        'section'    => 'nav',
        'type' => 'select',
        'choices' => $list_pages,
        'settings'   => 'zh2_archives_pages_dropdown',
    ));

	// Page select dropdown for the Archives Page Link.	
    $wp_customize->add_setting('zh2_tagline_pages_dropdown', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('zh2_tagline_link', array(
        'label'      => __('Select a page to create a tagline link', 'zh2'),
        'section'    => 'title_tagline',
        'type' => 'select',
        'choices' => $list_pages,
        'settings'   => 'zh2_tagline_pages_dropdown',
    ));

    // Add a custom social link title before the menu. Default is "Subscribe."
	$wp_customize->add_setting( 'zh2_social_links_title', array(
        'default' => 'Subscribe:',
        'type' => 'option',
	) );
 
	$wp_customize->add_control( 'zh2_social_links_title_select', array(
        'label' => __('Create a custom title before your social links navigation. Default is "Subscribe.'),
        'settings' => 'zh2_social_links_title',
        'section' => 'nav',
	) );


    // Checkbox to toggle author website link/author posts page link.
	$wp_customize->add_setting( 'zh2_author_link', array(
        'default' => 0,
	) );

	$wp_customize->add_control( 'zh2_author_link', array(
        'label' => __('Link author to website. (Instead of author posts page)'),
        'type' => 'checkbox',
        'section' => 'nav',
	) );

    // Checkbox to open links in same/new window.
	$wp_customize->add_setting( 'zh2_extlink', array(
        'default' => 0,
	) );

	$wp_customize->add_control( 'zh2_extlink', array(
        'label' => __('Open site links in a new tab/window.'),
        'type' => 'checkbox',
        'section' => 'nav',
	) );

	
}
add_action( 'customize_register', 'zh2_theme_customizer', 11 );


?>