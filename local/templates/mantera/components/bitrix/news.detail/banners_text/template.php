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

<div class="section-bg section-bg--new section-bg--calendar section-bg--mg" style="background-image: url(<?=$arResult['PREVIEW_PICTURE']['SRC']?>);">
	<div class="section-bg__inner">
		<div class="section-bg__content">
			<h1 class="section-bg__title"><?=$arResult['PREVIEW_TEXT'];?></h1>
			<h2 class="section-bg__subtitle"><?=$arResult['DETAIL_TEXT'];?></h2>
		</div>
	</div>
</div>
<div class="section-yellow-block section-yellow-block--sm"></div>