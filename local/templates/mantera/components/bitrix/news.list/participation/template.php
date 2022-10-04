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

<div class="section-new participation">
    <div class="container">

        <div class="section-title-left"><?=Loc::getMessage('HOW_TO_PARTICIPATE')?></div>

        <div class="row align-items-center participation__content">
            <div class="col-lg-9 col-xl-8 col-xxl-7 col-sm-12">
                <? $i = 1;
                foreach($arResult["ITEMS"] as $arItem):?>
                    <?{if($i % 2 != 0){?>
                        <div class="participation-item">
                            <div class="participation-item__number"><?=$arItem['DISPLAY_PROPERTIES']['NUMBER']['VALUE']?></div>
                            <p class="participation-item__text"><?=$arItem["PREVIEW_TEXT"]?></p>
                        </div>
                    <?}else{?>
                        <div class="participation-item participation-item--pd">
                            <div class="participation-item__number"><?=$arItem['DISPLAY_PROPERTIES']['NUMBER']['VALUE']?></div>
                            <p class="participation-item__text"><?=$arItem["PREVIEW_TEXT"]?></p>
                        </div>
                    <?}$i++;}?>   
                <?endforeach;?>
            </div>

            <div class="col-lg-3 col-xl-4 col-xxl-5 col-sm-12">
                <div class="participation__big-m"></div>
            </div>
        </div>

    </div>
</div>