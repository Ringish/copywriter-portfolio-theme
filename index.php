<?php
get_header();
?>
<?php
while (have_posts()) {
	the_post();
	the_content();
}
the_posts_pagination();
?>
<?php
get_footer();
?>