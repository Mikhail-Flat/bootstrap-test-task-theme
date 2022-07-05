<?php get_header(); ?>

<div class="container">
	<h2>Новости:</h2>

	<div class="row">
		<?php
		$args = array(
			'post_type' => 'news',
			'posts_per_page' => 3,
			'orderby' => 'meta_value_num',
			'meta_key' => '_crb_date'
		);

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();

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
		} wp_reset_postdata();
		?>
	</div>
</div>

<div class="container">
	<h2>Продукция:</h2>

	<div class="row">
		<?php
		$args = array(
			'post_type' => 'products',
			'posts_per_page' => 3,
			'orderby' => 'meta_value_num',
			'meta_key' => '_crb_price'
		);

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();

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
		} wp_reset_postdata();
		?>
	</div>
</div>

<?php get_footer(); ?>