<?php


if ( ! function_exists( 'theme_inti' ) ) :

function theme_inti() {
    add_theme_support( 'title-tag' );

    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1000, 9999 );

    if ( function_exists( 'add_image_size' ) ) {
        add_image_size( 'mobile-thumbnail', 480, 200, true );
    }

    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        )
    );

    add_theme_support( 'wp-block-styles' );

    // Add support for full and wide align images.
    add_theme_support( 'align-wide' );
    add_theme_support( 'responsive-embeds' );

    // Add support for editor styles.
    //add_theme_support( 'editor-styles' );
    // Enqueue editor styles.
    //add_editor_style( 'style-editor.css' );

    register_nav_menus( array(
        'primary'   => __( 'Primary Menu', 'emp_wpst' ),
        'secondary' => __('Secondary Menu', 'emp_wpst' )
    ) );

}
endif; // theme_inti
add_action( 'after_setup_theme', 'theme_inti' );





function add_theme_scripts() {
    //wp_enqueue_style( $handle, $src, $deps, $ver, $media );
    wp_enqueue_style( 'theme', get_template_directory_uri() . '/css/theme.css',false,'1.0','all');

    //wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer);
    //wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script( 'theme', get_template_directory_uri() . '/js/theme.js', array('jquery'), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );




function create_widget( $name, $id, $description ) {

    register_sidebar(array(
        'name' => __($name),
        'id' => $id,
        'description' => __( $description ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

}



add_action( 'widgets_init', 'emp_wpst_widgets_init' );
function emp_wpst_widgets_init() {
    create_widget( 'Sidebar', 'sidebar', '' );
}


remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );


function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
    $src = remove_query_arg( 'ver', $src );
    return $src;
}

add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );


function author_page_redirect() {
    if ( is_author() ) {
        wp_redirect( home_url() );
    }
}

add_action( 'template_redirect', 'author_page_redirect' );


function filter_acf_the_content( $value ) {
if ( class_exists( 'iworks_orphan' )) {
$orphan = new iworks_orphan();
$value = $orphan->replace( $value );
}

return $value;
};

// add the filter
add_filter( 'acf_the_content', 'filter_acf_the_content', 10, 1 );