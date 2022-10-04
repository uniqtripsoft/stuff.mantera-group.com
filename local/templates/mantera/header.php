<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/assets/css/style.min.css"> -->

    <!-- Useful meta tags -->
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="index, follow">
    <meta name="google" content="notranslate">
    <!-- <meta name="format-detection" content="telephone=no"> -->
    <meta name="description" content="">

    <? $APPLICATION->ShowHead() ?>
    <title><? $APPLICATION->ShowTitle() ?></title>

    <?

    use Bitrix\Main\Page\Asset;

    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/css/style.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/fonts/stylesheet.css");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/js/vendor/datepicker.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/js/vendor/bitrix24.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/js/vendor/multiselect-ui.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/js/inputmask.js');
    // Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/js/vendor/map-yandex.js.js");
    CUtil::InitJSCore(['ajax']);
    ?>  
</head>

<body>
    <? $APPLICATION->ShowPanel() ?>
    <div class="page calendar">
        <div class="header-phantom"></div>
        <header id="header" class="header">
            <div class="container">
                <div class="header__inner header__inner--new">
                    <div class="nav-burger">
                        <div id="nav_burger__open" class="nav-burger__open" onclick="openNav()"></div>
                        <div id="nav_burger__close" class="nav-burger__close" onclick="closeNav()"></div>
                    </div>
                    <div class="header__logo header__logo--new">
                        <a href="/">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/images/logos/logo_mantera.svg" alt="logo">
                        </a>
                    </div>
                    <div class="header__center">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "menu-top",
                            array(
                                "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
                                "CHILD_MENU_TYPE" => "left",    // Тип меню для остальных уровней
                                "DELAY" => "N",    // Откладывать выполнение шаблона меню
                                "MAX_LEVEL" => "1",    // Уровень вложенности меню
                                "MENU_CACHE_GET_VARS" => array(    // Значимые переменные запроса
                                    0 => "",
                                ),
                                "MENU_CACHE_TIME" => "0",    // Время кеширования (сек.)
                                "MENU_CACHE_TYPE" => "N",    // Тип кеширования
                                "MENU_CACHE_USE_GROUPS" => "Y",    // Учитывать права доступа
                                "ROOT_MENU_TYPE" => "main",    // Тип меню для первого уровня
                                "USE_EXT" => "N",    // Подключать файлы с именами вида .тип_меню.menu_ext.php
                            ),
                            false
                        ); ?>

                    </div>

                    <div class="header-right">
                        <!-- <ul class="nav nav--new nav--languages">
                            <li class="nav__item nav__item--new"><a href="/" class="language-toggler">ru</a> / <a href="/en/" class="language-toggler">eng</a></li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </header>
        <? $APPLICATION->IncludeComponent(
            "bitrix:menu",
            "menu-top-mobile",
            array(
                "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
                "CHILD_MENU_TYPE" => "left",    // Тип меню для остальных уровней
                "DELAY" => "N",    // Откладывать выполнение шаблона меню
                "MAX_LEVEL" => "1",    // Уровень вложенности меню
                "MENU_CACHE_GET_VARS" => array(    // Значимые переменные запроса
                    0 => "",
                ),
                "MENU_CACHE_TIME" => "3600",    // Время кеширования (сек.)
                "MENU_CACHE_TYPE" => "N",    // Тип кеширования
                "MENU_CACHE_USE_GROUPS" => "Y",    // Учитывать права доступа
                "ROOT_MENU_TYPE" => "main",    // Тип меню для первого уровня
                "USE_EXT" => "N",    // Подключать файлы с именами вида .тип_меню.menu_ext.php
            ),
            false
        ); ?>

        <!-- Main -->
        <main class="main main--new">