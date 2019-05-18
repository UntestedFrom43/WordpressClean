<?php

/*
 * Подключение скриптов и стилей
 */
function test_scripts(){
    wp_enqueue_style('test-bootstrapcss', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('test-style', get_stylesheet_uri());

    //wp_enqueue_script('jquery');
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), false, true);
    //wp_enqueue_script( 'jquery' );
    wp_enqueue_script('test-popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array('jquery'), false, true);
    wp_enqueue_script('test-bootstrapjs', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array('jquery'), false, true);
}
add_action('wp_enqueue_scripts', 'test_scripts');

//Отключение генерации для разрешений
add_filter( 'intermediate_image_sizes', 'delete_intermediate_image_sizes' );
    function delete_intermediate_image_sizes( $sizes ){
        //указание нужных размеров для исключения
        return array_diff( $sizes, array(
            'medium_large'
        ));
    }

//Хук для поддержки изображений миниатюр, параметры
function testtheme2019_setup(){
    //Добавление возможности прикрепления миниатюры к посту.
    add_theme_support('post_thumbnails');
    //Функция мультиформатов для изображений;
    //Собственный тип миниатюр; регистрация
    add_image_size('my-thumbname', 100, 100);
    //Поддержка тайтла
    add_theme_support('title-tag');
    //Регистрация новых меню
    register_nav_menus( array(
        'header_menu' => 'Меню header',
        'footer_menu' => 'Меню footer',
    ) );
}
add_action('after_setup_theme', 'testtheme2019_setup');

//Удаление H2 для SEO
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
    /*
    Вид базового шаблона:
    <nav class="navigation %1$s" role="navigation">
        <h2 class="screen-reader-text">%2$s</h2>
        <div class="nav-links">%3$s</div>
    </nav>
    */

    return '<nav class="navigation" role="navigation">
		    <div class="nav-links">%3$s</div>
	        </nav>';
}

//Класс Walker для подключения в модуле класса
require_once __DIR__ . '/Testtheme2019_Menu.php';