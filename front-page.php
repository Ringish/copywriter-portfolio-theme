<?php
/**
 * The front page template file
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