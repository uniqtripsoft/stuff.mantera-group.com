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

<?$getiblock = CIBlockSection::GetList(
   Array("SORT"=>"ASC"),
   Array("IBLOCK_ID"=>$arParams['IBLOCK_ID'])
);
 
while($sectionwhile = $getiblock->GetNext())
{
	$arS[] = $sectionwhile;
}?>

<section class="section section--assets" id="assets">
    <div class="container">
        <div class="section__header section__header--left-lines">
            <h2 class="section-title section-title--left-line">АКТИВЫ</h2>
        </div>
        <div class="assets">
            <div class="row assets-row justify-content-between">
				<?foreach($arS as $arSection):?>
                <div class="col-xl-2 col-lg-6">
					<div class="assets__item">
					<div class="assets__title"><?=$arSection["NAME"]?></div>
						<div class="assets__wrapper-img">
							<?foreach($arResult["ITEMS"] as $arItem):?>
								<?if($arItem["IBLOCK_SECTION_ID"] == $arSection["ID"]):?>
									<a href="<?=$arItem["DISPLAY_PROPERTIES"]["LINK"]["VALUE"]?>" target="blank">
										<div class="assets__img">
											<img class="assets__item" src="<?=$arItem["DISPLAY_PROPERTIES"]["LOGO"]["FILE_VALUE"]["SRC"]?>" alt="logo">
										</div>
									</a>
								<?endif;?>
							<?endforeach;?>
						</div>
					</div>  
                </div>
				<?endforeach;?>
			</div>
        </div>
    </div><!-- /.container -->
</section><!-- /.section assets -->

<script>
	console.log(<?=json_encode($arResult["ITEMS"])?>);
	console.log(<?=json_encode($arS)?>);
</script>