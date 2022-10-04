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

<? foreach ($arResult["ITEMS"] as $key => $arItem) : ?>
    <div id="news_item_<?= $key ?>" class="modal-custom modal-custom--fullscreen">
        <div class="modal-custom__content news-item">
            <section class="section-new section-new--fullscreen row justify-content-start align-items-center">
                <div class="container">
                    <button class="modal-custom__close" type="button">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/assets/images/times.svg" alt="close">
                    </button>
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-10">
                            <div class="row align-items-center">
                                <div class="col-1 section-montera-vertical section-montera-vertical--bordered"></div>
                                <div class="col-md-11 col-sm-12">
                                    <div class="news-item__header">
                                        <div class="row align-items-center">
                                            <!-- <div class="col-md-3"><div class="news-item__preview" style="background-image: url(../assets/images/news.png);"></div></div> -->
                                            <div class="col-md-9">
                                                <span class="typography-h3"><?= $arItem["DISPLAY_ACTIVE_FROM"] ?></span><br /><br />
                                                <span class="typography-h3"><?= $arItem["NAME"] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="typography-body2">
                                        <?if(!empty($arItem["~DETAIL_TEXT"])):?>
                                            <?= $arItem["~DETAIL_TEXT"] ?>
                                        <?else :?>
                                            <?= $arItem["~PREVIEW_TEXT"] ?> 
                                        <?endif?>
                                    </div>
                                </div>
                            </div>
                        </div>
            </section>
        </div>
    </div>
<? endforeach; ?>

<section id="news" class="section-new section-new--news">
    <div class="container">
        <div class="section-title-left">
            Новости
        </div>
        <div class="row justify-start align-items-center h100">
            <?
                $page = $APPLICATION->GetCurPage();
            ?>
            <?if($page !== '/news/') :?>  
            <div class="col-md-6 col-sm-12">
            <? else :?>
            <div class="col-md-12 col-sm-12">
            <? endif; ?>    
                <div class="news-list">
                    <? foreach ($arResult["ITEMS"] as $key => $arItem) : ?>
                        <div class="news-list__item">
                            <h3 class="news-list__title news-list__title--new"><?= $arItem["DISPLAY_ACTIVE_FROM"] ?></h3>
                            <h2 class="news-list__text news-list__text--bold news-list__text--new">
                                <?= $arItem["NAME"] ?>
                            </h2>
                            <div class="news-list__text news-list__text--new truncate-row truncate-row-5">
                                <?= strip_tags($arItem["PREVIEW_TEXT"]) ?>
                            </div>
                            <a class="news-list__link news-list__link--new" href="javascript:void(0)" data-modal="news_item_<?= $key ?>">Подробнее</a>
                        </div>
                    <? endforeach; ?>
                    <? if ($arParams["SHOW_BUTTON_ALL"] === "Y") : ?>
                        <div><a class="news-list__link" href="/news/">Все новости</a></div>
                    <? endif ?>
                </div>
            </div>
            <?if($page !== '/news/') :?>  
                <div class="col-md-6 col-sm-12 section-image">
                    <div class="section-image__inner" style="background-image: url('<?= SITE_TEMPLATE_PATH ?>/assets/images/news.png');"></div>
                </div>
            <? else :?>
            <? endif; ?>    
        </div>
    </div>

</section>