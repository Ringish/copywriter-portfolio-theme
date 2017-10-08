<?php
/**
 * The page template file
 */

get_header();
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<h1><?php the_title(); ?></h1>
		<?php
		if ( have_posts() ) {

			/* Start the Loop */
			while ( have_posts() ) { 
				the_post();
				the_content();

			}
		}
		?>
	</main>
</div>
<?php
get_footer();
?>