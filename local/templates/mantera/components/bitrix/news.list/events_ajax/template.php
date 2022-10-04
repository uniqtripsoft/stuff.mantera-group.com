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
$this->setFrameMode(true);?>

<?
    use Bitrix\Main\Localization\Loc;
    Loc::loadMessages(__FILE__);
?> 

<?
if (!empty($arResult["ITEMS"])) {
    foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="schedule-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <div class="schedule-item__header">
            <?  
            $data = !empty($arItem['DATE_ACTIVE_TO']) ? $arItem['DATE_ACTIVE_TO'] : $arItem['DATE_ACTIVE_FROM']; 
            $dateActiveFrom = strtotime($arItem['DATE_ACTIVE_FROM']);
            $dateActiveTo = strtotime($arItem['DATE_ACTIVE_TO']);
            if ($dateActiveTo != $dateActiveFrom && (!empty($arItem['DATE_ACTIVE_FROM']) && !empty($arItem['DATE_ACTIVE_TO'])))  {
                $dateStart = date('d.m.Y', $dateActiveFrom);
                $dateEnd = date('d.m.Y', $dateActiveTo);
                $dataHidden = $dateStart . '_' . $dateEnd;?>
                <div class="events-slider-item__date events-slider-item__date--no-space">c <?=$dateStart?> по <?=$dateEnd?></div>
            <?} else {
                $dataHidden = !empty($arItem['DATE_ACTIVE_FROM']) ? $arItem['DATE_ACTIVE_FROM'] : $arItem['DATE_ACTIVE_TO'];?>
                <div class="events-slider-item__date events-slider-item__date--no-space"><?=date('d.m.Y', strtotime($data))?></div>
            <?}?>
            <div class="schedule-item__name"><?=$arItem["NAME"]?></div>
            <input hidden id="dateEvent_<?=$arItem["ID"]?>" value="<?=$dataHidden?>" type="text">
            </div>

            <div class="row schedule-item__main">
                <div class="col-xl-6 col-lg-6 col-md-12 schedule-item-img">
                    <?if(is_array($arItem['PREVIEW_PICTURE'])){?>
                        <div class="schedule-item-img__inner" style="background-image: url('<?=$arItem['PREVIEW_PICTURE']['SRC']?>')">
                    </div>
                    <?}else{?>
                        <div class="schedule-item-img__inner" style="background-image: url('<?=$arItem['DETAIL_PICTURE']['SRC']?>')">
                        </div>
                    <?}?>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-12 schedule-item__info">
                    <div class="schedule-item__inner truncate-row truncate-row-9 truncate-row-blur">
                        <?if (!empty($arItem["PREVIEW_TEXT"])) {?>
                            <?=htmlspecialcharsBack($arItem["PREVIEW_TEXT"])?>
                        <?} else {?>
                            <?=htmlspecialcharsBack($arItem["DETAIL_TEXT"])?>
                        <?}?>
                    </div>
                    <a class="btn-underline mr-auto" href="javascript:void(0)" data-modal="schedule_item_<?=$arItem["ID"]?>"><?=Loc::getMessage('MORE_DETAILS')?></a>
                    <button class="btn btn--yellow schedule-item__btn mr-auto" type="button" data-modal="fm_sign_up" data-eventId="<?=$arItem["ID"]?>" data-eventName="<?=$arItem["NAME"]?>">Записаться</button>
                </div>
            </div>
        </div>

        <div id="schedule_item_<?=$arItem['ID']?>" class="modal-custom modal-custom--fullscreen">
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
                                    <div class="col-md-11 col-sm-12">
                                        <div class="news-item__header">
                                            <div class="row align-items-center">
                                                <!-- <div class="col-md-3"><div class="news-item__preview" style="background-image: url(../assets/images/news.png);"></div></div> -->
                                                <div class="col-md-12">
                                                    <div class="schedule-modal-item__header">
                                                        <?
                                                        if (!empty($arItem["DETAIL_PICTURE"]["SRC"])) {
                                                            $photo = $arItem["DETAIL_PICTURE"]["SRC"];
                                                        } else {
                                                            $photo = $arItem["PREVIEW_PICTURE"]["SRC"];
                                                        }
                                                        ?>
                                                        <div class="schedule-modal-item__img" style="background-image: url('<?= $photo ?>')"></div>
                                                        <div class="schedule-modal-item__inner">
                                                        <?
                                                            $data = !empty($arItem['DATE_ACTIVE_TO']) ? $arItem['DATE_ACTIVE_TO'] : $arItem['DATE_ACTIVE_FROM']; 
                                                            $dateActiveFrom = strtotime($arItem['DATE_ACTIVE_FROM']);
                                                            $dateActiveTo = strtotime($arItem['DATE_ACTIVE_TO']);
                                                        if ($dateActiveTo != $dateActiveFrom && (!empty($arItem['DATE_ACTIVE_FROM']) && !empty($arItem['DATE_ACTIVE_TO'])))  {
                                                            $dateStart = date('d.m.Y', $dateActiveFrom);
                                                            $dateEnd = date('d.m.Y', $dateActiveTo);
                                                            $dataHidden = $dateStart . '_' . $dateEnd;?>
                                                            <div class="schedule-modal-item__date">c <?=$dateStart?> по <?=$dateEnd?></div>
                                                        <?} else {
                                                            $dataHidden = !empty($arItem['DATE_ACTIVE_FROM']) ? $arItem['DATE_ACTIVE_FROM'] : $arItem['DATE_ACTIVE_TO'];?>
                                                            <div class="schedule-modal-item__date"><?=date('d.m.Y', strtotime($data))?></div>
                                                        <?}?>
                                                            <div class="schedule-modal-item__name"><?=$arItem["NAME"]?></в>
                                                    </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="schedule-modal-item__text">
                                            <?if (!empty($arItem["DETAIL_TEXT"])) {?>
                                                <?=htmlspecialcharsBack($arItem["DETAIL_TEXT"])?>
                                            <?} else {?>
                                                <?=htmlspecialcharsBack($arItem["PREVIEW_TEXT"])?>
                                            <?}?>
                                        </div>
                                        <button class="btn btn--yellow schedule-item__btn schedule-modal-item__btn"
                                            type="button" data-modal="fm_sign_up" data-eventId="<?=$arItem["ID"]?>" data-eventName="<?=$arItem["NAME"]?>">Записаться</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>		
    <?endforeach;?>
<?} else {?>
    Поиск по указанным параметрам не дал результатов.
<?}?>
            
<input type="text" name="NavPageNomer" hidden value="<?=intval($arResult['NAV_RESULT']->NavPageNomer)?>"> 
<input type="text" name="NavPageCount" hidden value="<?=$arResult['NAV_RESULT']->NavPageCount?>"> 






