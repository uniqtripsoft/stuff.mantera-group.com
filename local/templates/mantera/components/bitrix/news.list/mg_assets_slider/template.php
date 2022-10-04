<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<? $getiblock = CIBlockSection::GetList(
    array("SORT" => "ASC"),
    array("IBLOCK_ID" => $arParams['IBLOCK_ID'])
);

while ($sectionwhile = $getiblock->GetNext()) {
    $arSestions[] = $sectionwhile;
} ?>

<section id="assets" class="section-new section-new--projects">
    <div class="container">
        <? foreach ($arResult["ITEMS"] as $key => $arItem) : ?>
            <div id="actives_item_<?= $key ?>" class="modal-custom">
                <div class="modal-custom__content news-item">
                    <div class="modal-custom__header">
                        <button class="modal-custom__close" type="button">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/images/times.svg" alt="close">
                        </button>
                    </div>
                    <div>
                        <p class="typography-body2"><?= $arItem["PREVIEW_TEXT"] ?></p>
                    </div>
                </div>
            </div>
        <? endforeach; ?>
        <div>
            <div class="section-title-right">
                <span class="section-title-right__span">
                    Активы
                    <hr class="section-title-right__hr" />
                </span>
            </div>
        </div>
        <div class="links-list__mask"></div>
        <div class="row align-items-center justify-content-md-start">
            <div class="col-1 section-montera-vertical"></div>
            <div class="links-list col-md-3 col-sm-12">
                <? foreach ($arSestions as $key => $arSection) : ?>
                    <div data-tab-link="<?= $key ?>" class="links-list__item typography-body typography-uppercase <?= !$key ? " links-list__item--active" : "" ?>">
                        <?= $arSection["NAME"] ?>
                    </div>
                <? endforeach; ?>
            </div>

            <div class="col-md-8 col-sm-12 tabs-items">
                <? foreach ($arSestions as $key => $arSection) : ?>
                    <div data-tab="<?= $key ?>">
                        <div class="slider-cards slider-cards-<?= $key?>">
                            <? foreach ($arResult["ITEMS"] as $key => $arItem) : ?>
                                <? if ($arItem["IBLOCK_SECTION_ID"] == $arSection["ID"]) : ?>
                                    <div class="assets__list-item">
                                        <? $link = $arItem["DISPLAY_PROPERTIES"]["LINK"]["VALUE"]; ?>
                                        <? if ($link) : ?><a href="<?= $arItem["DISPLAY_PROPERTIES"]["LINK"]["VALUE"] ?>" target="blank"><? endif ?>
                                            <div class="assets__list-item-header">
                                                <img class="assets__list-item-img" src="<?= $arItem["DISPLAY_PROPERTIES"]["LOGO"]["FILE_VALUE"]["SRC"] ?>" width="90%" alt="">
                                            </div>
                                            <div class="assets__list-item-text typography-body2">
                                                <div class="assets__list-item-p truncate-row truncate-row-9">
                                                    <?= strip_tags($arItem["PREVIEW_TEXT"]) ?>
                                                </div>
                                                <? if ($arItem["PREVIEW_TEXT"]) : ?>
                                                    <a class="news-list__link news-list__link--new pt-2" href="javascript:void(0)" data-modal="actives_item_<?= $key ?>">Подробнее</a>
                                                <? endif ?>
                                            </div>
                                        <? if ($link) : ?></a><? endif ?>
                                    </div>
                                <? endif; ?>
                            <? endforeach; ?>
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
        </div>
    </div>
</section>