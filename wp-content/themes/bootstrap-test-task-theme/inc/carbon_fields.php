<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
	Container::make( 'post_meta', 'Доп. поля' )
		->set_priority( 'high' )
		->set_context( 'carbon_fields_after_title' )
		->where( 'post_type', '=', 'news' )
		->add_fields( array(
			Field::make( 'text', 'crb_title', 'Заголовок' ),
			Field::make( 'rich_text', 'crb_rich_text', 'Текст новости' ),
			Field::make( 'image', 'crb_image', 'Картинка' ),
			Field::make( 'date', 'crb_date', 'Дата новости' ),
		) );

	Container::make( 'post_meta', 'Доп. поля' )
		->set_priority( 'high' )
		->set_context( 'carbon_fields_after_title' )
		->where( 'post_type', '=', 'products' )
		->add_fields( array(
			Field::make( 'text', 'crb_title', 'Название' ),
			Field::make( 'rich_text', 'crb_rich_text', 'Описание' ),
			Field::make( 'media_gallery', 'crb_image', 'Галерея' )
				->set_type( 'image' ),
			Field::make( 'rich_text', 'crb_equipment', 'Комплектация' ),
			Field::make( 'radio', 'crb_manufacturer', 'Производитель' )
				->set_options( array(
					'apple' => 'Apple',
					'google' => 'Google',
					'xiaomi' => 'Xiaomi',
				) ),
			Field::make( 'text', 'crb_price', 'Стоимость' )
				->set_attribute( 'type', 'number' ),
		) );
}

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
	require_once( THEME_DIR . '/vendor/autoload.php' );
	\Carbon_Fields\Carbon_Fields::boot();
}