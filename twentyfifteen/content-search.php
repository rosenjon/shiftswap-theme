<?php
/**
 * The template part for displaying results in search pages
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php twentyfifteen_post_thumbnail(); ?>

	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); 
		//echo 'Date of Shift: ';the_field('date_of_shift');
		$date_field = get_field('date_of_shift');
		$date_year = substr($date_field, 0, 4);
		$date_month = substr($date_field, 4, 2);
		$date_day = substr($date_field, 6, 2);
		
		echo 'Date of Shift: '.$date_month.'/'.$date_day.'/'.$date_year;
		echo '<br>';
		echo 'Time of Shift: ';the_field('hour_of_shift'); echo '&nbsp;';the_field('am/pm');
		echo '<br>';
		echo 'Type of Shift: ';the_field('type_of_shift');
		?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<?php if ( 'post' == get_post_type() ) : ?>

		<footer class="entry-footer">
			<?php twentyfifteen_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-footer -->

	<?php else : ?>

		<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

	<?php endif; ?>

</article><!-- #post-## -->
