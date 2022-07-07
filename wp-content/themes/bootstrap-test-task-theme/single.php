<?php get_header(); ?>

<main role="main" class="container">
	<div class="row">
		<div class="col-md-8 blog-main">
			<?php
			$image_id = carbon_get_post_meta( get_the_ID(), 'crb_image' );
			if( $image_id != '' ){
				echo wp_get_attachment_image( $image_id, 'large', false, array( 'class' => 'card-img-top d-block mb-3' ) );
			}
			?>

			<h1 class="pb-3 mb-4 font-italic border-bottom"><?php echo get_the_title(); ?></h1>

			<div class="blog-post">
				<?php echo apply_filters( 'the_content', carbon_get_post_meta( get_the_ID(), 'crb_rich_text' ) ); ?>
			</div>
		</div>

		<aside class="col-md-4 blog-sidebar">
			
		</aside>

	</div>
</main>

<?php get_footer(); ?>