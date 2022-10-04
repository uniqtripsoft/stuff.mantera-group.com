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

<section class="section-promo">
	<div class="container">
		<div class="promo">
			<div class="tabs-promo">
				<div class="tabs-promo__nav tabs-promo__nav-slider">
					<? foreach ($arResult["sections"] as $key => $arSection) :?>
						<button class="tabs-promo__nav-btn" type="button" data-tab-item="#tab_<?=$arSection['ID']?>"><?=$arSection['NAME']?></button>
					<? endforeach; ?>
				</div>
				<div class="tabs-promo__content">
					<? foreach ($arResult["sections"] as $key => $arSection) :?>
					<div class="tabs-promo__item" id="tab_<?=$arSection['ID']?>">
						<div class="promo-slider promo-slider--items promo-slider-<?= $key?>">
							<?foreach($arResult["ITEMS"] as $arItem){
								if($arSection["ID"] !== $arItem["IBLOCK_SECTION_ID"]) continue;
							?>
								<div class="promo-slider__item">
									<div class="promo-card">
										<div class="promo-card__photo" style="background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>)"></div>
										<div class="promo-card__content">
											<div class="promo-card__title">
												<?=$arItem["NAME"];?>
											</div>
											<div class="promo-card__address">
												<?=$arItem["PROPERTIES"]["ADDRESS"]["VALUE"];?>
											</div>
											<div class="promo-card__discount">
												<?=$arItem["PROPERTIES"]["PROMOTION_DISCOUNT"]["VALUE"];?>
											</div>
											<div class="promo-card__text">
												<?=$arItem["PREVIEW_TEXT"];?>
											</div>
											<?if(!empty($arItem["PROPERTIES"]["LINK_DETAILS"]["VALUE"]) || !empty($arItem["DETAIL_TEXT"])) :?>
											<div class="promo-card__text">
												Подробности:
											</div>
											<?endif;?>
											<a class="promo-card__website" href="https://<?=$arItem["PROPERTIES"]["LINK_DETAILS"]["VALUE"];?>">
												<?=$arItem["PROPERTIES"]["LINK_DETAILS"]["VALUE"];?>
											</a>
											<div class="promo-card__text truncate-row truncate-row-5">
												<?=$arItem["DETAIL_TEXT"];?>
											</div>
										</div>
									</div>
								</div>
							<?}?>
						</div>
					</div>
					<? endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="map" id="map"></div>
	</div>
</section>
<script>
	BX.ready(function(){
		BX.message({TASK: <? echo \CUtil::PhpToJSObject($arResult["tabsArr"]); ?>});
		// const TABS_ARR = '<?=\Bitrix\Main\Web\Json::encode($arResult["tabsArr"])?>';
	});
</script>


