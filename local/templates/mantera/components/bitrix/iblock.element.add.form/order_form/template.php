<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
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
$this->setFrameMode(false);?>

<?
	$propertyPageId = 115;
	$propertyName = 114;
	$propertyEmail = 113; 
	$propertyMessage = 116;
	$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>

<div class="container">
    <div class="feedback">
        <button class="feedback__btn" type="button" data-modal="feedback-modal">Обратная связь</button>
    </div>
</div><!-- /.container -->

<!-- Modal -->
<div class="modal-custom" id="feedback-modal">
    <div class="modal-custom__content">
        <button class="modal-custom__close" type="button">
            <img src="<?=SITE_TEMPLATE_PATH?>/assets/images/close.svg" alt="close">
        </button>
        <h1 class="modal-custom__title">Написать сообщение | send</h1>
        <form class="form-custom" name="iblock_add" action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data">
			<?=bitrix_sessid_post()?>
            <div class="message">
                <div class="message__form">
					<?if (!empty($arResult["ERRORS"])):?>
						<p style="text-align: center;"><?ShowError(implode("<br />", $arResult["ERRORS"]))?></p>
					<?endif;
					if ($arResult["MESSAGE"] <> ''):?>
						<p style="text-align: center;"><?ShowNote($arResult["MESSAGE"])?></p>
					<?endif?>
                    <div class="form-custom__group">
                        <input class="form-custom__control" name="PROPERTY[<?=$propertyName?>][0]" type="text" placeholder="имя | name">
                    </div>
                    <div class="form-custom__group">
                        <input class="form-custom__control" name="PROPERTY[NAME][0]" type="tel" placeholder="телефон | phone" require>
                    </div>
                    <div class="form-custom__group form-custom__group--last">
                        <input class="form-custom__control" name="PROPERTY[<?=$propertyEmail?>][0]" type="email" placeholder="почта | e-mail">
                    </div>
                    <div class="form-custom__group">
                        <textarea class="message__textarea" name="PROPERTY[<?=$propertyMessage?>][0]" type="text" placeholder="сообщение | message" require></textarea>
                    </div>
					<input type="hidden" name="PROPERTY[<?=$propertyPageId?>]" value="<?=$url;?>" />
                    <div class="form-custom__footer">
                        <div class="form-custom__group">
                            <input class="btn btn--yellow w-50" type="submit" name="iblock_submit" value="Отправить" />
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

