<?php
/**
 * Template part for displaying page content in page.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
        <div class="entry-thumbnail mb-4 mb-md-5">
			<?php toc_post_thumbnail(); ?>
        </div>
	<?php endif; ?>

	<div class="entry-content">
		<?php
		the_content();
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'toc' ),
				'after'  => '</div>',
			)
		);
		?>
	</div>

</article>
