<?php get_header(); ?>

<main role="main" class="container">
	<div class="row">
		<div class="col-md-8 blog-main">
			<?php
			$media_gallery = carbon_get_post_meta( get_the_ID(), 'crb_media_gallery' );
			$media_gallery_count = count( $media_gallery );
			$rich_text = carbon_get_post_meta( get_the_ID(), 'crb_rich_text' );
			$equipment = carbon_get_post_meta( get_the_ID(), 'crb_equipment' );
			$manufacturer = carbon_get_post_meta( get_the_ID(), 'crb_manufacturer' );
			$price = carbon_get_post_meta( get_the_ID(), 'crb_price' );

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

			<h1 class="pb-3 mb-4 font-italic border-bottom"><?php echo carbon_get_post_meta( get_the_ID(), 'crb_title' ); ?></h1>

			<?php if( !empty( $rich_text ) ){ ?>

			<p class="font-italic"><b>Описание:</b></p>
			<div class="blog-post border-bottom">
				<?php echo apply_filters( 'the_content', $rich_text ); ?>
			</div>

			<?php } ?>

			<?php if( !empty( $equipment ) ){ ?>

			<p class="mt-4 font-italic"><b>Комплектация:</b></p>
			<div class="blog-post border-bottom">
				<?php echo wpautop( $equipment ); ?>
			</div>

			<?php } ?>

			<?php if( !empty( $manufacturer ) ){ ?>

			<p class="mt-4 font-italic"><b>Производитель:</b></p>
			<div class="blog-post border-bottom">
				<p><?php echo $manufacturer; ?></p>
			</div>

			<?php } ?>

			<?php if( !empty( $price ) ){ ?>

			<p class="mt-4 font-italic"><b>Цена:</b></p>
			<div class="blog-post border-bottom">
				<p><?php echo $price; ?></p>
			</div>

			<?php } ?>
		</div>

		<aside class="col-md-4 blog-sidebar">
			
		</aside>

	</div>
</main>

<?php get_footer(); ?>