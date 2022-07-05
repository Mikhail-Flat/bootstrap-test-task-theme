<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php wp_title(); ?></title>

	<?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
	<div class="navbar navbar-inverse navbar-static-top">
		<div class="container">
			<a href="<?php echo get_home_url(); ?>" class="navbar-brand">WordPress Theme</a>

			<ul class="nav navbar-right d-none d-md-flex">
				<li><a class="p-2" href="<?php echo get_home_url(); ?>">Home</a></li>
				<li><a class="p-2" href="<?php echo get_post_type_archive_link( 'news' ); ?>">Новости</a></li>
				<li><a class="p-2" href="<?php echo get_post_type_archive_link( 'products' ); ?>">Продукция</a></li>
			</ul>

			<button class="navbar-toggler d-md-none" type="button"
				data-toggle="collapse"
				data-target=".navHeaderCollapse"
				aria-controls="navHeaderCollapse"
				aria-expanded="false"
				aria-label="Toggle navigation"
			>
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse navHeaderCollapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?php echo get_home_url(); ?>">Home</a></li>
					<li><a href="<?php echo get_post_type_archive_link( 'news' ); ?>">Новости</a></li>
					<li><a href="<?php echo get_post_type_archive_link( 'products' ); ?>">Продукция</a></li>
				</ul>
			</div>
		</div>
	</div>