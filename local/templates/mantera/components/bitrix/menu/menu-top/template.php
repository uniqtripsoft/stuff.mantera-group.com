<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<style>
    .nav__item--active .nav__link {
        position: relative;
    }

    .nav__item--active .nav__link::after {
        opacity: 1;
    }

    @media (max-width: 1431px) {
        .nav__item--active .nav__link::after {
            opacity: 0;
        }
    }
</style>
<? $page = $APPLICATION->GetCurPage(); ?>

<? if (!empty($arResult)) : ?>
    <nav class="nav nav--new" id="nav">
        <ul class="nav__list nav__list--new">
            <? foreach ($arResult as $arItem) : ?>
                <? $is_current = $arItem['LINK'] == $page; ?>
                <li class="nav__item nav__item--new<?= $is_current ? " nav__item--active" : ""; ?>">
                    <a href="<?= $arItem["LINK"] ?>" class="nav__link nav__link--new"><?= $arItem["TEXT"] ?></a>
                </li>
            <? endforeach ?>
            <?
                $page = $APPLICATION->GetCurPage();
                if($page !== '/calendar/' && $page !== '/promo/' && $page !== '/' && $page !== '/events/') {
            ?>  
            <li class="nav__item nav__item--new">
                <a href="#" class="nav__link nav__link--new has-subnav">Сотрудникам</a>

                <ul class="subnav">
                    <li>
                        <a class="subnav__link" href="/events/">КАЛЕНДАРЬ МЕРОПРИЯТИЙ</a>
                    </li>
                    <li>
                        <a class="subnav__link" href="/promo/">СКИДКИ ДЛЯ СОТРУДНИКОВ</a>
                    </li>
                </ul>
            </li>
            <? } ?>
        </ul>
    </nav>
<? endif ?>