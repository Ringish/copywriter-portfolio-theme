
<?php
/**
 * The index template file
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
					echo '<a href="'.esc_url(get_permalink()).'" class="read-more">';
					echo '<h2>'.__('Read more','copywriter-portfolio').'</h2>';
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