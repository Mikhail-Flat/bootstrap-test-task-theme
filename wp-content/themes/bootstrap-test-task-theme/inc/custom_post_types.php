<?php
add_action( 'init', 'register_post_type_theme' );
function register_post_type_theme(){
	register_post_type( 'news', array(
		'label'  => 'Новости',
		'labels' => array(
			'name'               => 'Новости',
			'singular_name'      => 'Новости',
			'add_new'            => 'Добавить новость',
			'add_new_item'       => 'Добавление новости',
			'edit_item'          => 'Редактирование новости',
			'new_item'           => 'Новая новость',
			'view_item'          => 'Смотреть новость',
			'search_items'       => 'Искать новость',
			'not_found'          => 'Новостей не найдено',
			'not_found_in_trash' => 'Новостей не найдено в корзине',
			'parent_item_colon'  => '',
			'menu_name'          => 'Новости',
		),
		'description'   => 'Новости',
		'public'        => true,
		'show_ui'       => true,
		'menu_position' => 22,
		'menu_icon'     => 'dashicons-admin-page',
		'hierarchical'  => true,
		'supports'      => array( 'title' ),
		'has_archive'   => true,
		'rewrite'       => true,
		'query_var'     => true,
	) );

	register_post_type( 'products', array(
		'label'  => 'Продукция',
		'labels' => array(
			'name'               => 'Продукция',
			'singular_name'      => 'Продукция',
			'add_new'            => 'Добавить продукт',
			'add_new_item'       => 'Добавление продукта',
			'edit_item'          => 'Редактирование продукта',
			'new_item'           => 'Новый продукт',
			'view_item'          => 'Смотреть продукт',
			'search_items'       => 'Искать продукт',
			'not_found'          => 'Продуктов не найдено',
			'not_found_in_trash' => 'Продуктов не найдено в корзине',
			'parent_item_colon'  => '',
			'menu_name'          => 'Продукция',
		),
		'description'   => 'Продукция',
		'public'        => true,
		'show_ui'       => true,
		'menu_position' => 22,
		'menu_icon'     => 'dashicons-admin-page',
		'hierarchical'  => true,
		'supports'      => array( 'title' ),
		'has_archive'   => true,
		'rewrite'       => true,
		'query_var'     => true,
	) );
}

add_action( 'after_switch_theme', 'flush_rewrite_rules_theme' );
function flush_rewrite_rules_theme() {
	flush_rewrite_rules();
}