<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */


get_header(); 


?>
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

					<?php
						$message = "";
						if(isset($_GET['shifttype']) && strlen($_GET['shifttype']) > 0) {
							$shifttype = $_GET['shifttype'];
							$message .= '<br>Shift Type: '.$shifttype;
						}
						if(isset($_GET['startdate']) && strlen($_GET['startdate']) > 0) {
							$startdate = $_GET['startdate'];
							$message .= '<br>Start Date: '.$startdate;
							
						}
						if(isset($_GET['enddate']) && strlen($_GET['enddate']) > 0) {
							$enddate = $_GET['enddate'];
							$message .= '<br>End Date: '.$enddate;
							
						}

					?>
			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyfifteen' ), $message ); ?></h1>
			</header><!-- .page-header -->
			<?php
			// Start the loop.
			while ( have_posts() ) : the_post(); ?>

				<?php
				/*
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'search' );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
				'next_text'          => __( 'Next page', 'twentyfifteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php get_footer(); ?>
