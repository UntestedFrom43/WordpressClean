<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="<?php echo bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Динамический тайтл -->
    <?php wp_head(); ?>
</head>
<!-- Для корректной работы bg и сопутствующего кастома -->
<body <?php body_class(); ?>>
<!-- Проверка условия для custom_header -->
    <?php if(is_front_page()): ?>
<!-- Вывод custom_header -->
    <div class="header-image" style="
    background: url(<?php echo get_custom_header()->url; ?>)
    center no-repeat; background-size: cover; height: 50vh">
    </div>
    <!-- Вывод информации по параметрам -->
    <!-- место для echo -->
    <?php endif; ?>

<!-- Навигация -->
<div class="wrapper">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Проверка на наличие логотипа -->
    <?php if( has_custom_logo() ) : the_custom_logo(); ?>
        <?php else: ?>
        <!-- Описание и название -->
        <a class="navbar-brand" 
            href="<?php echo home_url(); ?>">
            <?php echo bloginfo('name'); ?>
        </a>
        <?php endif; ?>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <!-- Вызов меню header -->
    <?php 
        wp_nav_menu( array(
            'theme_location' => 'header_menu',
            //'menu' => '',
            'container' => '',
            // 'container_class' => 'collapse navbar-collapse',
            'menu_class' => 'navbar-nav mr-auto',
            //Параметры изменения меню через класс Walker
            'walker' => new Testtheme2019_Menu,
            // Drop-меню
            'container_id' => 'navbarSupportedContent',
       ) );
    ?>
    <!-- Проверка чекбокса для отображения номера -->
        <p class="testtheme2019-phone" <?php if(false === get_theme_mod('testtheme2019_show_phone')); echo ' style="display: none;"'?> >
            Мой контактный телефон: <span><?php echo get_theme_mod('testtheme2019_phone');?></span>
        </p>
    </div>

    <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
         <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dropdown
         </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
             <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
             <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
    </div>
         </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
         </li>
        </ul>
     <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
         <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
     </form>
    </div> -->
</nav>
