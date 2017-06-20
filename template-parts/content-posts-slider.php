<?php
/**
* Displays posts in slider
*
*
* @since 1.0
*
* @package copywriter-portfolio-theme
*/
?>
<article id="<?php the_ID(); ?>" class="post">
	<?php
	if (has_post_thumbnail()) {
		?>
		<a class="post-image" href="<?php the_permalink(); ?>">
			<?php
			the_post_thumbnail('large');
			?>
		</a>
		<?php
	}
	?>
	<time><?php echo get_the_date( 'd M, Y' ); ?></time>
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<blockquote class="excerpt" cite="<?php the_permalink(); ?>"><?php the_excerpt(); ?></blockquote>
</article>