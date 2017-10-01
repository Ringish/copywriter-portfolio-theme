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
		<div class="boxes">
			<?php
			for ($i=1; $i <= 5; $i++) { 
				$heading = get_theme_mod('box_'.$i.'_heading');
				$icon = get_theme_mod('box_'.$i.'_icon');
				$bgcolor = get_theme_mod('box_'.$i.'_bgcolor','#cfcfcf');
				$bgimg = get_theme_mod('box_'.$i.'_bgimg');
				$link = get_theme_mod('box_'.$i.'_link','#');
				if ($i == 1 || $i == 4) {
					echo '<div class="column">';
				}
				echo '<a style="background-color:'.$bgcolor.';background-image:url('.$bgimg.');" href="'.$link.'" class="box box-'.$i.'"><i class="fa '.$icon.'"></i><h2>'.$heading.'</h2></a>';
				if ($i == 2 || $i == 5) {
					echo '</div>';
				}
			}



			?>
		</div>
		<?php
		$args = array(
			'post__in'     => array(92,112,196),
			);
		
		$query = new WP_Query( $args );
		$color = "#eabcb6";
		if ( $query->have_posts() ) {
			echo '<div class="posts">';
			/* Start the Loop */
			while ( $query->have_posts() ) { 
				$query->the_post();
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