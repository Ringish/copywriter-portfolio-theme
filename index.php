<?php
get_header();
?>
hej
<?php
while (have_posts()) {
	the_post();
	the_content();
}
?>
<?php
get_footer();
?>