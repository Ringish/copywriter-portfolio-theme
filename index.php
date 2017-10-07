
<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage copywriter-portfolio-theme
 * @since 1.0
 * @version 1.0
 */

get_header(); 
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		the_archive_title( '<h1 class="page-title">', '</h1>' );
		the_archive_description( '<div class="taxonomy-description">', '</div>' );
		?>

		<?php
		if ( have_posts() ) {
			echo '<div class="posts">';
			/* Start the Loop */
			while ( have_posts() ) { 
				the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><div class="post-content">
					<?php
					echo '<div class="img-holder">';
					the_post_thumbnail('large');
					echo '</div>';
					echo '<a href="'.get_permalink().'" class="read-more">';
					echo '<h2>'.__('Read more','copywriter-portfolio-theme').'</h2>';
					echo '</a>';
					echo '</div></article>';

				}
				echo '</div>';
				the_posts_pagination();
			}
			?>
		</main>
	</div>

	<?php
	get_footer();
	?>