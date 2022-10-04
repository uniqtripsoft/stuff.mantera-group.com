<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<div id="sidepanel_mobile" class="sidepanel">
    <!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> -->
    <? foreach ($arResult as $arItem): ?>
        <a href="<?= $arItem["LINK"] ?>"><span><?= $arItem["TEXT"] ?></span></a>
    <? endforeach ?>
    <!-- <div class="subnav-menu-mobile">
        <button class="has-subnav-mobile" type="button">Сотрудникам</button>
        <div class="subnav-menu-mobile-content">
            <a href="/calendar/">Календарь мероприятий</a>
            <a href="/promo/">Скидки для сотрудников</a>
        </div>
    </div> -->
</div>
<script>
    var sidepanel = document.getElementById("sidepanel_mobile"),
        nav_open = document.getElementById("nav_burger__open"),
        nav_close = document.getElementById("nav_burger__close"),
        menu_items = sidepanel.querySelectorAll("a");

    function transformMenu(open = true) {
        sidepanel.style.left = open ? "0" : "-300px";
        nav_open.style.opacity = open ? "0" : "1";
        nav_close.style.opacity = open ? "1" : "0";
        nav_open.style.visibility = open ? "hidden" : "visible";
        nav_close.style.visibility = open ? "visible" : "hidden";

        if(!document.querySelector('.page__mask')) {
            const page = document.querySelector('.page');
            let mask = document.createElement('div');
            mask.classList.add('page__mask');
            mask.addEventListener('click', closeNav);
            page.appendChild(mask);
        }
    }

    menu_items.forEach(item => item.addEventListener("click", closeNav))

    /* Set the width of the sidebar to 300px (show it) */
    function openNav() {
        transformMenu(true)
    }

    /* Set the width of the sidebar to 0 (hide it) */
    function closeNav() {
        transformMenu(false)
        document.querySelector('.page__mask').remove();
    }
    // $(".menuBoxAdapt").click(function () {
    //     openNav()
    // })
</script>