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

<section class="section section--news" id="news">
    <div class="section-yellow-block"></div>
    <div class="container">
        <div class="news">
            <div class="row justify-content-between">
                <div class="col-md-4">
                    <div class="section__header">
                        <h2 class="section-title section-title--news">Новости</h2>
                    </div>
                    <div class="news-list">
						<?foreach($arResult["ITEMS"] as $arItem):?>
							<div class="news-list__item">
								<h3 class="news-list__date"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></h3>
								<p class="news-list__text news-list__text--bold">
									<?=$arItem["NAME"]?>
								</p>
								<p class="news-list__text news-list__text clamp">
									<?=$arItem["PREVIEW_TEXT"]?>
								</p>
								<a class="news-list__link" href="<?=$arItem["DISPLAY_PROPERTIES"]["LINK_NEWS"]["DISPLAY_VALUE"]?>">Подробнее</a>
							</div>
                       <?endforeach;?>
                    </div>
                </div>
                <div class="col-md-6">
                    <img class="news__img" src="<?=SITE_TEMPLATE_PATH?>/assets/images/news.png" alt="">
                </div>
            </div>
        </div><!-- /.news -->
    </div><!-- /.container -->
    <div class="section-yellow-block section-yellow-block--sm"></div>
</section><!-- /.section news -->