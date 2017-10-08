<?php
// Custom logo
add_theme_support( 'custom-logo' );

// Featured image
add_theme_support( 'post-thumbnails' ); 

// Customizer
require get_template_directory() . '/inc/customizer.php';

// Register menu
function main_menus() {
	register_nav_menu('header-menu',__( 'Header Menu', 'copywriter-portfolio' ));
}
add_action( 'init', 'main_menus' );

// Enqueue styles and scripts
function add_theme_scripts() {
	wp_enqueue_style( 'style', get_template_directory_uri().'/dist/styles/theme.css', array(), time() );
	wp_enqueue_script( 'script', get_template_directory_uri() . '/dist/scripts/main.js', array ( 'jquery' ), time(), true);

}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );


/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function cpt_entry_footer() {

	/* translators: used between list items, there is a space after the comma */
	$separate_meta = __( ', ', 'copywriter-portfolio' );

	// Get Categories for posts.
	$categories_list = get_the_category_list( $separate_meta );

	// Get Tags for posts.
	$tags_list = get_the_tag_list( '', $separate_meta );

	// We don't want to output .entry-footer if it will be empty, so make sure its not.
	if ( ( $categories_list  || $tags_list ) || get_edit_post_link() ) {

		echo '<footer class="entry-footer">';

			if ( 'post' === get_post_type() ) {
				if (  $categories_list  || $tags_list ) {
					echo '<span class="cat-tags-links">';

						// Make sure there's more than one category before displaying.
						if ( $categories_list  ) {
							echo '<span class="cat-links"><span class="screen-reader-text">' . __( 'Categories', 'copywriter-portfolio' ) . ': </span>' . $categories_list . '</span>';
						}

						if ( $tags_list ) {
							echo '<span class="tags-links"><span class="screen-reader-text">' . __( 'Tags', 'copywriter-portfolio' ) . ': </span>' . $tags_list . '</span>';
						}

					echo '</span>';
				}
			}


		echo '</footer> <!-- .entry-footer -->';
	}
}

add_action( 'after_setup_theme', 'cpt_theme_setup' );
function cpt_theme_setup() {
    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );
}

if ( ! isset( $content_width ) ) $content_width = 1400;

add_theme_support( 'automatic-feed-links' )

?>