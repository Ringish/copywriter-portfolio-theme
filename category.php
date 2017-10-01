
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
		<header id="cat-header" class="category-header">
			<?php
			echo '<h1>'.single_cat_title( '', false ).'</h1>';
			the_archive_description( '<div class="taxonomy-description">', '</div>' );
			echo get_field('farg');

			$queried_object = get_queried_object(); 
			$taxonomy = $queried_object->taxonomy;
			$term_id = $queried_object->term_id;  

			$color = get_field('farg', $queried_object);
			?>
		</header><!-- .page-header -->

		<?php
		if ( have_posts() ) {
			echo '<div class="posts">';
			/* Start the Loop */
			while ( have_posts() ) { 
				the_post();
				echo '<article class="post"><div class="post-content">';
				echo '<div class="img-holder">';
				the_post_thumbnail('large');
				echo '</div>';
				echo '<a href="'.get_permalink().'" class="post-title" style="background:'.$color.';">';
				echo '<h2>'.get_the_title().'</h2>';
				echo '</a>';
				echo '</div></article>';

			}
			echo '</div>';
		}
		?>
	</main>
</div>

<?php
get_footer();
?>