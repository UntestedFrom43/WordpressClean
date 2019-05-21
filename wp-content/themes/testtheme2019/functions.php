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

//Функция для поддержки изображений миниатюр, параметры
function testtheme2019_setup(){
    //Добавление функций локализации
    load_theme_textdomain('testtheme2019', get_template_directory() . '/languages');
    //Добавление возможности прикрепления миниатюры к посту.
    add_theme_support('post_thumbnails');
    //Функция мультиформатов для изображений
    //Собственный тип миниатюр; регистрация
    add_image_size('my-thumbname', 100, 100);
    //Поддержка тайтла
    add_theme_support('title-tag');
    //Регистрация новых меню
    register_nav_menus( array(
        'header_menu' => __('Меню header', 'testtheme2019'),
        'footer_menu' => __('Меню footer', 'testtheme2019'),
    ) );
    //Функция для кастомайзера под логотип
    add_theme_support('custom-logo', array(
        'width' => '150',
        'height' => '40',
    ));
    //Функция для кастомайзера background
    add_theme_support('custom-background', array(
        'default-color' => 'f586cc',
        //'default-image' => 'get_template_directory_uri() . '/assets/img/background.png',
    ));
    //Функция для кастомайзера custom-header
    add_theme_support('custom-header', array(
        'default-image' => get_template_directory_uri() . '/assets/img/wallhaven-580293.png',
        'width' => '1024',
        'height' => '768',   
    ));
}
// Запуск
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

//Функция, регистрация и хуки для sidebar
function testtheme2019_widgets_init(){
    register_sidebar(array(
        'name' => __('Правый sidebar', 'testtheme2019'),
        'id' => 'right-sidebar',
        'description' => __('Область для виджетов правого sidebar', 'testtheme2019'),
        'class' => 'Tested_Widget',
        //Для виджетов, из кодекса
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>\n",
    ));
}
//Запуск 
add_action('widgets_init', 'testtheme2019_widgets_init');

//Customizer - можно вынести в отдельный модуль
function testtheme2019_customize_register($wp_customize){
    //Работа с секцией, элементами, блоком управления
    //Цвет для ссылок;
    $wp_customize->add_setting('testtheme2019_link_color', array(
        'default' => '#007bff',
        'sanitize_callback' => 'sanitize_hex_color',
        //Асинхронное обновление
        'transport' => 'postMessage',
    ));
    //Элемент управления
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'testtheme2019_link_color',
            array(
                'label' => __('Цвет ссылок', 'testtheme2019'),
                'section' => 'colors',
                'setting' => 'testtheme2019_link_color',
            )
        )
    );

    //Добавление новой секции
    $wp_customize->add_section('testtheme2019_site_data', array(
        title => __('Информация о сайте', 'testtheme2019'),
        'priority' => 20,
    ));
    //Настройка для секции, на примере с телефоном
    $wp_customize->add_setting('testtheme2019_phone', array(
        'default' => '',
        //Асинхронное обновление
        'transport' => 'postMessage',
    ));
    //Элемент управления секцией
    $wp_customize->add_control(
        'testtheme2019_phone',
        array(
            'label' => __('Контактный телефон', 'testtheme2019'),
            'section' => 'testtheme2019_site_data',
            'type' => 'text',            
        )
    );

    // Новая опция для отображения номера телефона
    //Настройка для секции, на примере с телефоном
    $wp_customize->add_setting('testtheme2019_show_phone', array(
        //Чекбокс отмечен
        'default' => true,
        //Асинхронное обновление
        'transport' => 'postMessage',
    ));
    //Элемент управления секцией
    $wp_customize->add_control(
        'testtheme2019_show_phone',
        array(
            'label' => __('Показать контактный номер?', 'testtheme2019'),
            'section' => 'testtheme2019_site_data',
            'type' => 'checkbox',            
        )
    );
}
//Запуск
add_action('customize_register', 'testtheme2019_customize_register');

//Функция запуска кастомного css
function testtheme2019_customize_css(){
    // Получаем данные из css
    $testtheme2019_link_color = get_theme_mod('testtheme2019_link_color');
    // here синтаксис
    echo <<<HEREDOC
<style type="text/css">
a { color: $testtheme2019_link_color; }
</style>
HEREDOC;
}
//Запуск
add_action('wp_head', 'testtheme2019_customize_css');

//Подключение js-файла для live-preview
function testtheme2019_customize_js(){
    wp_enqueue_script('testtheme2019-customizer', get_template_directory_uri() . '/assets/js/testtheme2019-customize.js', array( 'jquery','customize-preview' ),	'', true);
}
//Запуск
add_action('customize_preview_init', 'testtheme2019_customize_js');

//Добавление новой секции
