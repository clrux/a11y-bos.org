<?php
// Security    // =========================================================================
remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
remove_action('wp_head', 'wp_generator'); // remove wordpress version
remove_action('wp_head', 'feed_links', 2); // remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links
remove_action('wp_head', 'index_rel_link'); // remove link to index page
remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)
remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );

// Let WordPress manage the title tag
add_theme_support('title-tag');

// Adds theme support for custom header images
$defaults = array(
    'default-image'          => '',
    'width'                  => 0,
    'height'                 => 0,
    'flex-height'            => true,
    'flex-width'             => true,
    'uploads'                => true,
    'random-default'         => false,
    'header-text'            => true,
    'default-text-color'     => '',
    'wp-head-callback'       => '',
    'admin-head-callback'    => '',
    'admin-preview-callback' => '',
);
add_theme_support('custom-header', $defaults);

// Adds support for custom menus
function a11y_register_menus() {
    register_nav_menus(
        array(
            'main-navigation' => __('Main Navigation'),
            'footer-navigation' => __('Footer Navigation')
        )
    );
}
add_action('init', 'a11y_register_menus');

// Adds a custom Search to the main navigation on desktop
function a11y_add_search() {
    $wrap  = '<ul id="%1$s" class="%2$s">';
    $wrap .= '%3$s';
    $wrap .= '<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="/search" role="button" class="open-search">Search</a></li>';
    // $wrap .= '<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="/search">Search</a></li>';
    $wrap .= '</ul>';
    return $wrap;
}

// Adds our donation sidebar ad
function a11y_donation_widget() {
    register_sidebar(array(
        'name'          => 'Donation Request',
        'id'            => 'sidebar-donation',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'a11y_donation_widget');

// Adds our upcoming event promotional in the sidebar
function a11y_event_widget() {
    register_sidebar(array(
        'name'          => 'Upcoming Event Promo',
        'id'            => 'sidebar-upcoming-event',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'a11y_event_widget');

// Adds recent posts widget to sidebar
function a11y_recent_posts_widget() {
    register_sidebar(array(
        'name'          => 'Recent Posts',
        'id'            => 'sidebar-recent-posts',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'a11y_recent_posts_widget');

// Adds archives widget to sidebar
function a11y_blog_archives_widget() {
    register_sidebar(array(
        'name'          => 'Blog Archives',
        'id'            => 'sidebar-blog-archives',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'a11y_blog_archives_widget');

// Adds sponsor widget to the footer
function a11y_sponsor_widget() {
    register_sidebar(array(
        'name'          => 'Sponsors',
        'id'            => 'widget-sponsors',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'a11y_sponsor_widget');

// Adds our custom JS file
function a11y_register_js() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-1.11.3.min.js');
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-1.11.3.min.js', '', '', true);
    wp_register_script('onload', get_stylesheet_directory_uri() . '/lib/js/onload.js');
    wp_enqueue_script('onload', get_stylesheet_directory_uri() . '/lib/js/onload.js', array('jquery'), '1.0.0', true);
    wp_register_script('dropdowns', get_stylesheet_directory_uri() . '/lib/js/dropdown.js');
    wp_enqueue_script('dropdowns', get_stylesheet_directory_uri() . '/lib/js/dropdown.js', array('jquery', 'onload'), '1.0.0', true);
    // wp_register_script('slick', get_stylesheet_directory_uri() . '/lib/js/slick.min.js');
    // wp_enqueue_script('slick', get_stylesheet_directory_uri() . '/lib/js/slick.min.js', array('jquery'), '1.0.0', true);
    wp_register_script('a11ybos', get_stylesheet_directory_uri() . '/lib/js/script.js');
    wp_enqueue_script('a11ybos', get_stylesheet_directory_uri() . '/lib/js/script.js', array('jquery', 'dropdowns', 'onload'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'a11y_register_js');
?>
