<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

<?
    use Bitrix\Main\Localization\Loc;
    Loc::loadMessages(__FILE__);
?>

<?if (!empty($arResult['ITEMS'])) {?>
    <div class="section-new events">
        <div class="container">
            <div class="section-title-left"><?=Loc::getMessage('RECENT_EVENTS')?></div>
            <div class="row justify-content-md-center align-content-center events__content">
                <div class="col-md-10">
                    <div class="events-slider slick-slider--big-arrows">
                        <?foreach($arResult['ITEMS'] as $item) {?>
                            <div class="events-slider-item">
                                <div class="row events-slider-item__wrap">
                                    <div class="col-xl-8 col-md-12 events-slider-item__video">
                                        <?if (!empty($item['PROPERTIES']['VIDEO_URL']['VALUE'])) {?>
                                            <div class="media-block media-block--video media-block--mb-0">
                                                <div class="embed">
                                                    <iframe src="<?=$item['PROPERTIES']['VIDEO_URL']['VALUE']?>"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen class="js-iframe"></iframe>
                                                </div>
                                            </div>
                                        <?} else if(!empty($item['PROPERTIES']['VIDEO']['VALUE']['path'])){?>   
                                            <div class="media-block media-block--video media-block--mb-0">
                                                <div class="embed">
                                                    <iframe src="<?=$item['PROPERTIES']['VIDEO']['VALUE']['path']?>"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen class="js-iframe"></iframe>
                                                </div>
                                            </div>
                                        <?} else if($item['PROPERTIES']['EVENT_PHOTO']['VALUE']) {?>
                                            <div class="media-block" style="background: url(<?=CFile::GetPath($item['PROPERTIES']['EVENT_PHOTO']['VALUE']);?>);"></div>
                                        <?}?>
                                    </div>

                                    <div class="col-xl-4 col-md-12 events-slider-item__content">
                                        <?
                                            $dateActiveFrom = strtotime($item['DATE_ACTIVE_FROM']);
                                            $dateActiveTo = strtotime($item['DATE_ACTIVE_TO']);
                                        if ($dateActiveTo != $dateActiveFrom && !empty($dateActiveFrom) && !empty($dateActiveTo))  {?>
                                            <p class="events-slider-item__date">c <?= date("d.m.Y", $dateActiveFrom)?> по <?= date("d.m.Y", $dateActiveTo)?></p>
                                        <?} else {?>
                                            <p class="events-slider-item__date"><?=date("d.m.Y", $dateActiveTo)?></p>
                                        <?}?>
                                        <p></p>
                                        <p class="events-slider-item__name"> <?=$item['NAME']?></p>
                                        <div class="events-slider-item__text truncate-row truncate-row-4">
                                            <?
                                            if (!empty($item['PROPERTIES']["EVENT_PREVIEW_TEXT"]["VALUE"]["TEXT"])) {?>
                                                <?=htmlspecialcharsBack($item['PROPERTIES']["EVENT_PREVIEW_TEXT"]["VALUE"]["TEXT"])?>
                                            <?} else {?>
                                                <?=htmlspecialcharsBack($item['PROPERTIES']["EVENT_DETAIL_TEXT"]["VALUE"]["TEXT"])?>
                                            <?}?>
                                        </div>
                                        <p></p>
                                        <a class="btn-underline" href="javascript:void(0)"
                                            data-modal="schedule_item_<?=$item['ID']?>_past">Подробнее</a>
                                    </div>
                                </div>
                            </div>
                        <?}?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?foreach($arResult['ITEMS'] as $item) {?>
        <div id="schedule_item_<?=$item['ID']?>_past" class="modal-custom modal-custom--fullscreen">
            <div class="modal-custom__content schedule-modal-item">
                <section class="section-new section-new--fullscreen row justify-content-start align-items-center">
                    <div class="container">
                        <button class="modal-custom__close" type="button">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/images/times.svg" alt="close">
                        </button>
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-10 schedule-modal-item__container">
                                <div class="row align-items-start">
                                    <div
                                        class="col-1 section-montera-vertical section-montera-vertical--bordered section-montera-vertical--mt">
                                    </div>
                                    <div class="col-md-11 col-sm-12 section-vertical-line">
                                        <div class="news-item__header">
                                            <div class="row align-items-center">
                                                <div class="col-md-12">
                                                    <div class="schedule-modal-item__header schedule-modal-item__header--event">
                                                    <?if ($item['PROPERTIES']['VIDEO_URL']['VALUE']) {?>
                                                        <div class="media-block media-block--detail media-block--video">
                                                            <div class="embed">
                                                                <iframe src="<?=$item['PROPERTIES']['VIDEO_URL']['VALUE']?>"
                                                                title="YouTube video player" frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                                allowfullscreen class="js-iframe"></iframe>
                                                            </div>
                                                        </div>
                                                    <?} else if($item['PROPERTIES']['VIDEO']['VALUE']['path']){?>   
                                                        <div class="media-block media-block--video">
                                                            <div class="embed">
                                                                <iframe src="<?=$item['PROPERTIES']['VIDEO']['VALUE']['path']?>"
                                                                title="YouTube video player" frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                                allowfullscreen class="js-iframe"></iframe>
                                                            </div>
                                                        </div>
                                                    <?}else if($item['PROPERTIES']["EVENT_PHOTO"]['VALUE']){?>
                                                        <? $file = CFile::ResizeImageGet($item['PROPERTIES']["EVENT_PHOTO"]['VALUE'], array('width'=>660, 'height'=>395), BX_RESIZE_IMAGE_EXACT , true); ?>
                                                        <div class="media-block media-block--detail" style="background-image: url('<?= $file["src"] ?>')"></div>
                                                    <?}?>
                                                        <?
                                                            $dateActiveFrom = strtotime($item['DATE_ACTIVE_FROM']);
                                                            $dateActiveTo = strtotime($item['DATE_ACTIVE_TO']);
                                                        if ($dateActiveTo != $dateActiveFrom && !empty($dateActiveFrom) && !empty($dateActiveTo))  {?>
                                                            <p class="schedule-modal-item__date">c <?=date("d.m.Y", $dateActiveFrom)?> по <?=date("d.m.Y", $dateActiveTo)?></p>
                                                        <?} else {?>
                                                            <p class="schedule-modal-item__date"><?=date("d.m.Y", $dateActiveTo)?></p>
                                                        <?}?>
                                                    <p class="schedule-modal-item__name"> <?=$item['NAME']?></p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="schedule-modal-item__text">
                                            <?
                                            if (!empty($item['PROPERTIES']["EVENT_DETAIL_TEXT"]["VALUE"]["TEXT"])) {?>
                                                <?=htmlspecialcharsBack($item['PROPERTIES']["EVENT_DETAIL_TEXT"]["VALUE"]["TEXT"])?>
                                            <?} else {?>
                                                <?=htmlspecialcharsBack($item['PROPERTIES']["EVENT_PREVIEW_TEXT"]["VALUE"]["TEXT"])?>
                                            <?}?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    <?}?>
<?}?>