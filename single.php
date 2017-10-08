<?php
/**
 * The single template file
 */

get_header(); 
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) {

			/* Start the Loop */
			while ( have_posts() ) { 
				the_post();

				echo '<h1>'.esc_html(get_the_title()).'</h1>';
				the_content();

				echo cpt_entry_footer();

					// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			}
			 wp_link_pages();
		}
		?>
	</main>
</div>

<?php
get_footer();
?>