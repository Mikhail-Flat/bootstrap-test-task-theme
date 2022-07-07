<?php get_header(); ?>

<div class="container mb-3">
	<div class="mb-3">
		<h2>Новости:</h2>
	</div>

	<div class="row">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();

				$image_id = carbon_get_post_meta( get_the_ID(), 'crb_image' );
				$title = carbon_get_post_meta( get_the_ID(), 'crb_title' );
				$text = carbon_get_post_meta( get_the_ID(), 'crb_rich_text' );
		?>
		<div class="col-sm-12 col-md-4 mb-3">
			<div class="card">
				<?php
				if( $image_id == '' ){
					echo wp_get_attachment_image( 38, 'medium', false, array( 'class' => 'card-img-top' ) );
				}
				else{
					echo wp_get_attachment_image( $image_id, 'medium', false, array( 'class' => 'card-img-top' ) );
				}
				?>

				<div class="card-body">
					<h5 class="card-title"><?php echo $title; ?></h5>
					<p class="card-text"><?php echo wp_trim_excerpt( $text ); ?></p>
				</div>

				<a href="<?php echo get_the_permalink(); ?>" class="btn btn-primary">Перейти к новости</a>
			</div>
		</div>
		<?php
			}
		} wp_reset_postdata();
		?>
	</div>
</div>

<?php get_footer(); ?>