</main>

<footer class="footer-new">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                    <!-- <div class="footer-new__logo"></div> -->
                    
                    <div class="typography-body2 typography-bold typography-uppercase mb22">Контакты</div>
                    <div class="typography-body2 mb22">Юридический адрес: 354340, Россия, Краснодарский край, г. Сочи, проспект континентальный, дом 6, офис 1</div>
                    <!-- <div class="typography-body2 mb22">E-mail: info@mantera-group.com</div> -->
                    <div class="typography-body2 typography-bold typography-uppercase mb22">По всем вопросам:</div>
                    <div class="typography-body2 mb22">Telegram: <a href="https://t.me/MANTERAHREVENTS" target="_blank">https://t.me/MANTERAHREVENTS</a></div>
                    <div class="row mb-3">
                        <div class="col-md-6 col-12 mb22">
                            <button class="btn btn--yellow btn--w100" type="button" data-modal="fm_question">Задать вопрос</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="typography-body2 typography-bold typography-uppercase mb-8">Сотрудникам</div>
                            <a class="typography-link typography-link--line" href="https://stuff.mantera-group.com/events/">Календарь</a>
                            <span class="line-separator"></span>
							<a class="typography-link" href="https://stuff.mantera-group.com/promo/">Скидки</a>
                        </div>
                    </div>
                    
                    <div class="footer__social-list">
                        <!-- <a target="_blank" class="footer__social-item"
                            style="background-image: url('<?= SITE_TEMPLATE_PATH ?>/assets/images/social/fb.png');"></a>
                        <a target="_blank" class="footer__social-item"
                            style="background-image: url('<?= SITE_TEMPLATE_PATH ?>/assets/images/social/inst.png');"></a> -->
                        <!-- <a class="footer__social-item" href="#">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/images/social/telegram.svg" alt="telegram">
                        </a> -->
                    </div>
            </div>
            <div class="col-md-6 align-self-end">
                <div class="footer-new__photo"></div>
            </div>
            <div class="col-md-12">
                <hr class="footer__hr">
                <div class="typography-body2 typography-bold">&copy; <?=date("Y")?> MANTERA</div>
            </div>
        </div>
        
    </div>
</footer>

<button class="arrow-up" id="buttonUp" title="Меню">
    <img src="<?= SITE_TEMPLATE_PATH ?>/assets/images/up.svg" alt="меню">
</button>

<div class="modal-custom" id="fm_question">
    <div class="modal-custom__content modal-custom__content--white modal-custom__content--wide">
        <div class="modal-custom__header pb-5">
            <button class="modal-custom__close" type="button">
                <img src="<?= SITE_TEMPLATE_PATH ?>/assets/images/times.svg" alt="close">
            </button>
            <img class="modal-custom__logo" src="<?= SITE_TEMPLATE_PATH ?>/assets/images/logos/logo_mantera.svg" height="18px" />
            <h3 class="modal-custom__subtitle">Оставьте свой вопрос или пожелание</h3>
        </div>
        <form class="form-custom" name="fm_question" data-name="question" data-title="Задать вопрос" action="/" method="POST">
            <div class="message">
                <div class="message__form">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-custom__group">
                                <label for="name">Имя: <span class="required">*</span></label>
                                <input name="name" pattern="[A-Za-zА-Яа-яЁё]+$" class="form-custom__input" minlength="2" type="text" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-custom__group">
                                <label for="name">Фамилия: <span class="required">*</span></label>
                                <input name="last_name" pattern="[A-Za-zА-Яа-яЁё]+$" minlength="2" class="form-custom__input" type="text" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-custom__group form-custom__group--last">
                                <label for="name">Телефон: <span class="required">*</span></label>
                                <input name="phone" class="form-custom__input" type="text">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-custom__group form-custom__group--last">
                                <label for="name">E-mail: <span class="required">*</span></label>
                                <input name="email" class="form-custom__input js-email" type="email" required>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="name">Комментарий: <span class="required">*</span></label>
                        <textarea maxlength="1000" name="comment" class="form-custom__textarea" type="text" required></textarea>
                    </div>
                    <div class="form-custom__footer form-custom__footer--center">
                        <div class="form-custom__policy">
                            Нажимая кнопку «Отправить» вы подтверждаете свое согласие на обработку <a target="_blank" href="https://mantera-group.com/policy/">персональных данных</a>
                        </div>
                        <input type="submit" class="btn btn--yellow btn--w50" value="Отправить" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal-custom" id="fm_sign_up">
	<div class="modal-custom__content modal-custom__content--white modal-custom__content--wide">
		<div class="modal-custom__header mb22">
			<button class="modal-custom__close" type="button">
				<img src="<?= SITE_TEMPLATE_PATH ?>/assets/images/times.svg" alt="close">
			</button>
			<img class="modal-custom__logo" src="<?= SITE_TEMPLATE_PATH ?>/assets/images/logos/logo_mantera.svg" height="18px" />
			<h3 class="modal-custom__subtitle">Запись на участие в мероприятии</h3>
		</div>
		<form class="form-custom" name="fm_sign_up" data-name="events" data-title="Записаться на мероприятие" action="/"
			method="POST">
			<div class="message">
				<div class="message__form">
					<div class="row">
						<input name="eventId" value="" hidden/>
						<input name="eventName" value="" hidden/>
						<div class="col-md-6 col-12">
							<div class="form-custom__group">
								<label for="date">Дата: <span class="required">*</span></label>
								<input 
									name="date" 
									id='datePickerEvent_MultiDate' 
									class="datepicker-here form-custom__input" 
									type="text" 
                                    data-type="date-picker-custom"
                                    data-classes="popup-datepicker"
									required
                                    readonly>
							</div>
						</div>
						<div class="col-md-6 col-12">
							<div class="form-custom__group">
								<label for="company">Компания: <span class="required">*</span></label>
								<input name="company" class="form-custom__input " type="text" required>
							</div>
						</div>
						<div class="col-md-6 col-12">
							<div class="form-custom__group">
								<label for="name">Имя: <span class="required">*</span></label>
								<input name="name" pattern="[A-Za-zА-Яа-яЁё]+$" class="form-custom__input" minlength="2" type="text" required>
							</div>
						</div>
						<div class="col-md-6 col-12">
							<div class="form-custom__group">
								<label for="name">Фамилия: <span class="required">*</span></label>
								<input name="last_name" pattern="[A-Za-zА-Яа-яЁё]+$" minlength="2" class="form-custom__input" type="text" required>
							</div>
						</div>
						<div class="col-md-6 col-12">
							<div class="form-custom__group form-custom__group--last">
								<label for="name">Телефон: <span class="required">*</span></label>
								<input name="phone" class="form-custom__input" type="text">
							</div>
						</div>
						<div class="col-md-6 col-12">
							<div class="form-custom__group form-custom__group--last">
								<label for="name">E-mail: <span class="required">*</span></label>
								<input name="email" class="form-custom__input" type="email" required>
							</div>
						</div>
						<div class="col-md-12 col-12" id="multiselectEventBlock">
							<div class="form-custom__group form-custom__group--last">
								<label for="name">Афиша мероприятия: <span class="required">*</span></label>
								<div id="multiselectEvent"></div>
							</div>
						</div>
					</div>
					<div>
						<label for="name">Вопрос или пожелание: <span class="required">*</span></label>
						<textarea maxlength="1000" name="comment" class="form-custom__textarea" type="text" required></textarea>
					</div>
					<div class="form-custom__footer form-custom__footer--center">
						<div class="form-custom__policy form-custom__policy--pd">
							Нажимая кнопку «Отправить» вы подтверждаете свое согласие на обработку <a target="_blank"
								href="https://mantera-group.com/policy/">персональных данных</a>
						</div>
						<input type="submit" class="btn btn--yellow btn--w50 btn--h60" value="Отправить" />
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let im = new Inputmask("+7 (999) 999 99 99");
        im.mask( $("input[name=phone]"));
        //$("input[name=phone]").mask("+7 (999)999-99-99");
    })

</script>

<script defer src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&coordorder=longlat"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/assets/js/app.js?<?= time()?>"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>
<?
    use Bitrix\Main\Page\Asset; 
    CJSCore::Init(array("jquery"));
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/libs/slick/slick.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/js/vendor/a-slick-sliders.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/js/vendor/map-yandex.js");
    // Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/js/dist/map-yandex-tabs.js");
    // Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/js/app.js');
    
?>
</body>
</html>