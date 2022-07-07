<?php get_header(); ?>

<div class="container mb-3">
	<div class="mb-3">
		<h2>Новости:</h2>
	</div>

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

<div class="container mb-3">
	<div class="mb-3">
		<h2>Продукция:</h2>
	</div>

	<div class="row">
		<?php
		$args = array(
			'post_type' => 'products',
			'posts_per_page' => 3,
			'order' => 'ASC',
			'orderby' => 'meta_value_num',
			'meta_key' => '_crb_price'
		);

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();

				$media_gallery = carbon_get_post_meta( get_the_ID(), 'crb_media_gallery' );
				$media_gallery_count = count( $media_gallery );
				$title = carbon_get_post_meta( get_the_ID(), 'crb_title' );
				$text = carbon_get_post_meta( get_the_ID(), 'crb_rich_text' );
		?>
		<div class="col-sm-12 col-md-4 mb-3">
			<div class="card">
				<?php
				if( $media_gallery_count == 0 ){
					echo wp_get_attachment_image( 38, 'medium', false, array( 'class' => 'card-img-top' ) );
				}

				if( $media_gallery_count > 0 && $media_gallery_count < 2 ){
					echo wp_get_attachment_image( $media_gallery[0], 'medium', false, array( 'class' => 'card-img-top' ) );
				}

				if( $media_gallery_count > 1 ){
				?>
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<?php foreach ( $media_gallery as $key => $image_id ) { ?>

						<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $key; ?>"<?php if( $key == 0 ) echo ' class="active"' ?>></li>

						<?php } ?>
					</ol>

					<div class="carousel-inner">
						<?php foreach ( $media_gallery as $key => $image_id ) { ?>

						<div class="carousel-item<?php if( $key == 0 ) echo ' active' ?>">
							<?php echo wp_get_attachment_image( $image_id, 'medium', false, array( 'class' => 'card-img-top d-block w-100' ) ); ?>
						</div>

						<?php } ?>
					</div>

					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Предыдущий</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Следующий</span>
					</a>
				</div>
				<?php
				}
				?>

				<div class="card-body">
					<h5 class="card-title"><?php echo $title; ?></h5>
					<p class="card-text"><?php echo wp_trim_excerpt( $text ); ?></p>
				</div>

				<a href="<?php echo get_the_permalink(); ?>" class="btn btn-primary">Перейти к продукту</a>
			</div>
		</div>
		<?php
			}
		} wp_reset_postdata();
		?>
	</div>
</div>

<?php get_footer(); ?>