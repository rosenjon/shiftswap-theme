<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Post thumbnail.
		twentyfifteen_post_thumbnail();
	?>

	<header class="entry-header">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
				$date_field = get_field('date_of_shift');
				$date_year = substr($date_field, 0, 4);
				$date_month = substr($date_field, 4, 2);
				$date_day = substr($date_field, 6, 2);
		
				echo 'Date of Shift: '.$date_month.'/'.$date_day.'/'.$date_year;
				echo '<br>';
				echo 'Time of Shift: ';the_field('hour_of_shift'); echo '&nbsp;';the_field('am/pm');
				echo '<br>';
				echo 'Type of Shift: ';the_field('type_of_shift');
				

			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
				$date_field = get_field('date_of_shift');
				$date_year = substr($date_field, 0, 4);
				$date_month = substr($date_field, 4, 2);
				$date_day = substr($date_field, 6, 2);
		
				echo 'Date of Shift: '.$date_month.'/'.$date_day.'/'.$date_year;
				echo '<br>';
				echo 'Time of Shift: ';the_field('hour_of_shift'); echo '&nbsp;';the_field('am/pm');
				echo '<br>';
				echo 'Type of Shift: ';the_field('type_of_shift');			
			endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s', 'twentyfifteen' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php
		// Author bio.
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;
	?>

	<footer class="entry-footer">
		<?php twentyfifteen_entry_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
