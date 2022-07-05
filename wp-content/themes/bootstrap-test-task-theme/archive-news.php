<?php get_header(); ?>

<div class="container">
	<h2>Новости:</h2>

	<div class="row">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();

				$attachment_id = carbon_get_post_meta( get_the_ID(), 'crb_image' );
		?>
		<div class="col-sm-12 col-md-4">
			<p>
				<?php echo wp_get_attachment_image( $attachment_id, 'medium', false, array( 'class' => 'img-fluid' ) ) ?>
			</p>
			<a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
		</div>
		<?php
			}
		}
		?>
	</div>
	<?php the_posts_pagination(); ?>
</div>

<?php get_footer(); ?>