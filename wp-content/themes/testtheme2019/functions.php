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
}
add_action('after_setup_theme', 'testtheme2019_setup');
