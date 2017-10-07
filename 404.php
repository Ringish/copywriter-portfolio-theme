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
		<h1><?php echo __('404 - The content could not be found','copywriter-portfolio-theme') ?></h1>
		
	</main>
</div>
<?php
get_footer();
?>