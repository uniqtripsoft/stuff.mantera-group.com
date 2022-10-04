<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Mantera Group");
LocalRedirect("/events/")?>
<div class="section-bg section-bg--new">
</div>
<div class="section-yellow-block section-yellow-block--sm"></div>

<? $APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "mg_news_popup",
    array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "ADD_SECTIONS_CHAIN" => "Y",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "N",
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array(
            0 => "NAME",
            1 => "PREVIEW_TEXT",
            2 => "DATE_ACTIVE_FROM",
            3 => "",
        ),
        "FILTER_NAME" => "",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => "28",
        "IBLOCK_TYPE" => "-",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
        "INCLUDE_SUBSECTIONS" => "Y",
        "MESSAGE_404" => "",
        "NEWS_COUNT" => "3",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "Новости",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PREVIEW_TRUNCATE_LEN" => "",
        "PROPERTY_CODE" => array(
            0 => "LINK_NEWS",
            1 => "",
        ),
        "SET_BROWSER_TITLE" => "Y",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "Y",
        "SET_META_KEYWORDS" => "Y",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SHOW_404" => "N",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_BY2" => "SORT",
        "SORT_ORDER1" => "DESC",
        "SORT_ORDER2" => "ASC",
        "STRICT_SECTION_CHECK" => "N",
        "COMPONENT_TEMPLATE" => "mg_news_popup",
        "SHOW_BUTTON_ALL" => "Y"
    ),
    false
); ?>

<section id="about" class="section-new row justify-content-start align-items-center h100">
    <div class="container">
        <div>
            <div class="section-title-right">
                <span class="section-title-right__span">
                    О компании
                    <hr class="section-title-right__hr" />
                </span>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-2 section-montera-vertical"></div>
            <div class="col-md-8 col-sm-12 about__text-new">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "/include/about.php"
                    )
                ); ?>
            </div>
        </div>
    </div>
</section>

<section class="section-new">
    <div class="container">
        <div class="row align-items-center section-mobile-reverse">
            <div class="col-lg-3 col-xl-4 col-xxl-5 col-sm-12">
                <div class="facts__big-m"></div>
            </div>
            <div class="col-lg-9 col-xl-8 col-xxl-7 col-sm-12 facts__table">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "/include/facts.php"
                    )
                ); ?>
            </div>
        </div>
</section>

<section id="solutions"
    class="section-new row justify-content-md-between align-items-center justify-content-sm-cener h100">

    <div class="container">
        <div class="section-title-left">
            Экспертные решения
        </div>
        <div class="row align-items-center section-experts">
            <div class="col-md-6 col-sm-12 section-image">
                <div class="section-image" style="background-image: url('<?= SITE_TEMPLATE_PATH ?>/assets/images/photo2.png');"></div>
            </div>

            <div class="col-md-1"></div>
            <div class="col-md-5 col-sm-12">
                <p class="typography-body2 typography-uppercase typography-bold mb22">Цифровой сервис</p>
                <p class="typography-body2 mb65">MANTERA разработала и успешно применяет собственную цифровую систему
                    управления гостеприимством, которая позволяет максимизировать как эффективность бизнес-модели, так и
                    уровень удовлетворённости гостей.</p>

                <p class="typography-body2 typography-uppercase typography-bold mb22">КОМПЛЕКСНОЕ РАЗВИТИЕ</p>
                <p class="typography-body2 mb65">За каждым проектом MANTERA стоит продуманный сценарий consumer journey,
                    что позволяет наиболее эффективно использовать возможности каждой территории и предложить
                    разнообразие сервисов, охватывающие все сегменты потенциальной аудитории.</p>

                <p class="typography-body2 typography-uppercase typography-bold mb22">ЭСТЕТИКА ПРОСТРАНСТВА</p>
                <p class="typography-body2">Команда MANTERA уделяет особое внимание архитектуре и благоустройству
                    территории, используя лучший мировой опыт и привлекая современных дизайнеров и архитекторов к
                    созданию образа новых территорий</p>
            </div>
        </div>
    </div>
</section>

<section class="section-new">
    <div class="container">
        <div class="row justify-content-md-between align-items-center section-mobile-reverse">

            <div class="col-md-5 col-sm-12">
                <p class="typography-body2 typography-uppercase typography-bold mb22">ЯРКИЕ ЭМОЦИИ И ВПЕЧАТЛЕНИЯ</p>
                <p class="typography-body2 mb65">Гармоничное сочетание интерьеров и природы вдохновляет, настраивая на
                    безмятежный лад с самой первой минуты. Продуманная и разнообразная инфраструктура развлечений
                    формирует культуру осознанной жизни, наполненной яркими событиями.</p>

                <p class="typography-body2 typography-uppercase typography-bold mb22">ЗДОРОВАЯ СРЕДА</p>
                <p class="typography-body2 mb65">Комплексная система заботы о здоровье гостей MANTERA, включает системы
                    очистки воды и воздуха, программы функциональной медицины и физической активности, а также контроль
                    качества питания, включая собственное производство экологически чистых продуктов.</p>

                <p class="typography-body2 typography-uppercase typography-bold mb22">ЭКОЛОГИЧЕСКАЯ ОТВЕТСТВЕННОСТЬ</p>
                <p class="typography-body2">MANTERA обладает огромным опытом гармоничного развития туристической
                    инфраструктуры вблизи охраняемых природных территорий.</p>
            </div>
            <div class="col-md-6 col-sm-12 section-image">
                <div class="section-image__inner" style="background-image: url('<?= SITE_TEMPLATE_PATH ?>/assets/images/photo3.png');"></div>
            </div>
        </div>

</section>

<? $APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "mg_assets_slider",
    array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "ADD_SECTIONS_CHAIN" => "Y",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "N",
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array(
            0 => "",
            1 => "",
        ),
        "FILTER_NAME" => "",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => "30",
        "IBLOCK_TYPE" => "mg_content",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
        "INCLUDE_SUBSECTIONS" => "Y",
        "MESSAGE_404" => "",
        "NEWS_COUNT" => "10",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "Новости",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PREVIEW_TRUNCATE_LEN" => "",
        "PROPERTY_CODE" => array(
            0 => "LINK",
            1 => "LOGO",
        ),
        "SET_BROWSER_TITLE" => "Y",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "Y",
        "SET_META_KEYWORDS" => "Y",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SHOW_404" => "N",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_BY2" => "SORT",
        "SORT_ORDER1" => "DESC",
        "SORT_ORDER2" => "ASC",
        "STRICT_SECTION_CHECK" => "N",
        "COMPONENT_TEMPLATE" => "mg_assets_slider"
    ),
    false
); ?>

<section id="projects" class="section-new section-new--projects">
    <div class="container">

        <div class="section-title-left">
            Перспективные проекты
        </div>

        <div class="projects__items  row justify-content-md-center align-content-center">
            <div class="projects__item-new col-md-6 projects__item-new--mt80px">
                <div class="projects__item-new-logo"
                    style="background-image: url('<?= SITE_TEMPLATE_PATH ?>/assets/images/activ/svg/mantera_cut.svg');"></div>
                <div class="projects__item-new-text typography-body2 typography-uppercase typography-grey">
                    <div>Год реализации: <span class="typography-h3">2024</span></div>
                    <div>Инвестиции: <span class="typography-h3">13 МЛРД РУБ.</span></div>
                </div>
            </div>

            <div class="projects__item-new col-md-6">
                <div class="projects__item-new-logo"
                    style="background-image: url('<?= SITE_TEMPLATE_PATH ?>/assets/images/activ/svg/lagonaki_cut.svg');">
                </div>
                <div class="projects__item-new-text typography-body2 typography-uppercase typography-grey">
                    <div>Год реализации: <span class="typography-h3">2024</span></div>
                    <div>Инвестиции: <span class="typography-h3">35 МЛРД РУБ.</span></div>
                </div>
            </div>

            <div class="projects__item-new col-md-6">
                <div class="projects__item-new-logo" style="background-image: url('<?= SITE_TEMPLATE_PATH ?>/assets/images/projects/golf.svg');">
                </div>
                <div class="projects__item-new-text typography-body2 typography-uppercase typography-grey">
                    <div>Год реализации: <span class="typography-h3">2025</span></div>
                    <div>Инвестиции: <span class="typography-h3">8 МЛРД РУБ.</span></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="media" class="section-new">
    <div class="container">
        <div>
            <div class="section-title-right">
                <span class="section-title-right__span">
                    Медиа
                    <hr class="section-title-right__hr" />
                </span>
            </div>
        </div>
        <div class="row justify-content-md-center align-content-center">

            <div class="media-slider col-md-11">
                <div class="slider-general-image">
                    <div style="background-image: url('<?= SITE_TEMPLATE_PATH ?>/assets/images/media/1.jpg')"
                        class="slider-general-image__item"></div>
                    <div style="background-image: url('<?= SITE_TEMPLATE_PATH ?>/assets/images/media/2.jpg')"
                        class="slider-general-image__item"></div>
                    <div style="background-image: url('<?= SITE_TEMPLATE_PATH ?>/assets/images/media/3.jpg')"
                        class="slider-general-image__item"></div>
                    <div style="background-image: url('<?= SITE_TEMPLATE_PATH ?>/assets/images/media/4.jpg')"
                        class="slider-general-image__item"></div>
                    <div style="background-image: url('<?= SITE_TEMPLATE_PATH ?>/assets/images/media/5.jpg')"
                        class="slider-general-image__item"></div>
                    <div style="background-image: url('<?= SITE_TEMPLATE_PATH ?>/assets/images/media/6.jpg')"
                        class="slider-general-image__item"></div>
                </div>

                <div class="slider-navigation">
                    <div style="background-image: url('<?= SITE_TEMPLATE_PATH ?>/assets/images/media/1.jpg')" class="slider-navigation__item">
                    </div>
                    <div style="background-image: url('<?= SITE_TEMPLATE_PATH ?>/assets/images/media/2.jpg')" class="slider-navigation__item">
                    </div>
                    <div style="background-image: url('<?= SITE_TEMPLATE_PATH ?>/assets/images/media/3.jpg')" class="slider-navigation__item">
                    </div>
                    <div style="background-image: url('<?= SITE_TEMPLATE_PATH ?>/assets/images/media/4.jpg')" class="slider-navigation__item">
                    </div>
                    <div style="background-image: url('<?= SITE_TEMPLATE_PATH ?>/assets/images/media/5.jpg')" class="slider-navigation__item">
                    </div>
                    <div style="background-image: url('<?= SITE_TEMPLATE_PATH ?>/assets/images/media/6.jpg')" class="slider-navigation__item">
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>