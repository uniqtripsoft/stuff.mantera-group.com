// const API_URL = 'https://uniqtrip.bitrix24.ru/rest/120/2elobk773mhqauv1/';
const API_URL = 'https://profservice24.bitrix24.ru/rest/752/25cqm6pnw703j2ab/';

document.addEventListener("DOMContentLoaded", function() {
    const formAsk = document.querySelector('[name=fm_question]');
    const formEvent = document.querySelector('[name=fm_sign_up]');
    window.eventSheduler = [];
    window.multi = [];  

    formAsk.addEventListener('submit', createLead);   

    setModal();
    formEvent.addEventListener('submit', function(event) {
        event.preventDefault();
        const formName = formEvent.getAttribute("name");
        data = [];

        if (formName == 'fm_sign_up') {
            data = $("[name=fm_sign_up]").serializeArray();
    
            if ($("#multiselectEvent").length) {
                strSheduler = '';
    
                if (window.multi.length != 0) {
                    if ( window.multi.items.length < 1) {
                        alert("Не выбрана афиша мероприятия");
                        return false;
                    }
                }
                
                for (const key in window.multi.items) {
                    value = window.multi.items[key].value;
                    nameEventSheduler = window.multi.items[key].id +"_eventSheduler"
                    if (strSheduler) {
                        strSheduler += ', ' + value;
                    } else {
                        strSheduler += value;
                    }
                    
                    data['eventSheduler'] = {'name': 'eventSheduler', 'value': strSheduler};
                }
            }
        }

        createLead(event, data);

    })
    
    function getRequestParams() {
        const urlSearchParams = new URLSearchParams(window.location.search);
        return Object.fromEntries(urlSearchParams.entries());
    }
    
    function getCookies() {
        let cookie = [];
        document.cookie.split(';').forEach(function (value, index) {
            let item = value.trim().split('=');
            cookie[item[0]] = item[1];
        });
        return cookie;
    }

    function validateEmail(email) {
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }
    
    function checkFields(fieldsForm, formName, btn) {
        let message = "";
    
        if (!fieldsForm.name || fieldsForm.name.length < 2)
            message = 'Поле "Имя" Обязательно для заполнения!';
    
        let regPhone = fieldsForm.phone.replace(/[^0-9]/g, '');
        if (regPhone == "" || regPhone.length < 11) {
            message = 'Поле "Телефон" Обязательно для заполнения, и должно содержать больше 10 символов!';
        }
    
        if (formName === "order" || formName === "present" || formName === "villas" || formName === "penthouses") {
            if (!fieldsForm.email)
                message = 'Поле "E-mail" обязательно для заполнения!';
    
            if (!validateEmail(fieldsForm.email))
                message = 'Поле "E-mail" указано в неверном формате!';
        }
    
        if (formName === "events") {
            if (!fieldsForm.date)
                message = 'Вы не выбрали дату мероприятия';
        }
    
        if (!message) return true;
        else alert(message);
    
        return false;
    }
    
    function setComment(fieldsForm) {
        let comments = '';
        if (fieldsForm['comment']) {
            comments += fieldsForm['comment']
        }
    
        if (fieldsForm['select_person']) {
            const type = fieldsForm['select_person'];
            comments = type === "agency" ? "Агентство: Да" : (type === "private_person" ? "Частное лицо: Да" : "");
        }
    
        if (fieldsForm['agency_name']) {
            comments += "\u003Cbr\u003E\r\nНазвание агентства: " + fieldsForm['agency_name']
        }
    
        if (fieldsForm['date']) {
            comments += "\u003Cbr\u003E\r\nДата мероприятия: " + fieldsForm['date']
        }
    
        if (fieldsForm['eventSheduler']) {
            comments += "\u003Cbr\u003E\r\nВремя мероприятия: " + fieldsForm['eventSheduler']
        }
    
        if (fieldsForm['eventId']) {
            comments += "\u003Cbr\u003E\r\nID мероприятия: " + fieldsForm['eventId']
        }
    
        if (fieldsForm['eventName']) {
            comments += "\u003Cbr\u003E\r\nНазвание мероприятия: " + fieldsForm['eventName']
        }
    
    
        if (fieldsForm['select_date_penthouses']) {
            const type = fieldsForm['select_date_penthouses'];
            comments = type === "date_penthouses" ? "Сообщить о дате presale по пентхаусам: Да" : "";
        }
    
        if (fieldsForm['select_date_villas']) {
            const type = fieldsForm['select_date_villas'];
            comments = type === "date_villas" ? "Сообщить о дате presale по виллам: Да" : "";
        }
    
        return comments;
    }
    
    function comagicSendData(data) {
        if (window.Comagic) {
            Comagic.addOfflineRequest({
                name: data.name || "",
                email: data.email || "", 
                phone: data.phone || "",
                message: data.comments || ""
            })
        }
    }
    
    function createLead(e, fieldsList = []) {
        e.preventDefault();
        // let error = formValidate(e.target);
    
        const form = e.target;
        const modal = document.getElementById(form.getAttribute("name"));
        const formName = form.getAttribute("data-name");
        const formTitle = form.getAttribute("data-title");
        const scbFrom = getCookies()['SCBfrom'];
        const request_params = getRequestParams();
    
        console.log('modal', modal);
    
        const btn = form.querySelector('input[type="submit"]');
        btn.setAttribute("disabled", true);
    
        var fieldsForm = {};
        if (fieldsList.length == 0) {
            var inputs_text = form.querySelectorAll('textarea[name=comment], input[type=text], input[type=email], input[type=tel], input[type=radio]:checked, input[type=checkbox]:checked');
    
            for (const key in inputs_text) {
                if (inputs_text.hasOwnProperty(key)) {
                    const input = inputs_text[key];
                    var value = input.value;
                    var name = input.getAttribute('name') || input.getAttribute('type');
                    fieldsForm[name] = value;
                }
            }
        } else {
            inputs_text = fieldsList;
            for (const key in inputs_text) {
                if (inputs_text.hasOwnProperty(key)) {
                    var value = inputs_text[key].value;
                    var name = inputs_text[key].name;
                    fieldsForm[name] = value;
                }
            }
        }
    
        if (!checkFields(fieldsForm, formName, btn)) {
            btn.removeAttribute("disabled");
            return false;
        }
    
        const comment = setComment(fieldsForm);
        // comagicSendData(fieldsForm);
    
        let fields =
        {
            "TITLE": "Заявка с сайта mantera-group.com (" + formTitle + ") - " + fieldsForm.name,
            "SOURCE_DESCRIPTION": "Форма: " + formTitle + " [" + formName + "] mantera-group.com",
            "NAME": fieldsForm.name + " " + fieldsForm.last_name,
            "STATUS_ID": "NEW",
            "SOURCE_ID": "STORE",
            "OPENED": "Y",
            "ASSIGNED_BY_ID": 752,
            "PHONE": [{ "VALUE": fieldsForm.phone, "VALUE_TYPE": "WORK" }],
            "EMAIL": [{ "VALUE": fieldsForm.email, "VALUE_TYPE": "WORK" }],
            "UF_CRM_1627910760409": scbFrom,
            'UTM_CAMPAIGN': request_params['utm_campaign'],
            'UTM_CONTENT': request_params['utm_content'],
            'UTM_MEDIUM': request_params['utm_medium'],
            'UTM_SOURCE': request_params['utm_source'],
            'UTM_TERM': request_params['utm_term'],
            'COMMENTS': comment,
            'COMPANY_TITLE': fieldsForm.company,
            // 'UF_CRM_1642063938': fieldsForm.eventName,
            // 'UF_CRM_1642067433': fieldsForm.date + " " + fieldsForm.eventSheduler,
        };
    
        const params = { REGISTER_SONET_EVENT: "Y" };
        const data = { fields, params };
        const url = `${API_URL}crm.lead.add`;
    
        // return console.log({ data, fieldsForm }); 
    
        $.ajax({
            type: "POST",
            global: true,
            dataType: 'json',
            url,
            data,
            success: function (data) {
                alert('Ваша заявка успешно отправлена!');
                console.log('data', data);
                btn.removeAttribute("disabled");
                closeModal(modal);
            },
            error: function (err) {
                alert('Ошибка при отправке заявки, попробуйте еще раз!');
                console.log('err', err);
                btn.removeAttribute("disabled");
                closeModal(modal);
            }
    
        });
    };

    // Functions modalSignUpEvent
    function MultiSelectEventInit() {
        if ($("#multiselectEvent").length ) {
    
            list = [];
            if (window.eventSheduler.length > 0 ) {
                list = JSON.parse(window.eventSheduler);
            }
    
            if (typeof(window.multi.destroy) == 'function') {
                window.multi.destroy();
            }
    
            if (list.length > 0) {
                window.multi = new MultiselectUI('#multiselectEvent', {
                    placeholder: 'Выберите мероприятие',
                    name: 'multiselectEvent',
                    // selectedId: '2',
                    data: list,
                        onSelect(item){
                        console.log('selected Item', item)
                    }
                });
                $("#multiselectEventBlock").css('display', 'block');
            } else {
                $("#multiselectEventBlock").css('display', 'none');
            }
        }
    }
    
    function convert_date_format(date_string, delim = '.') {
        let date = date_string.split(delim, 3);
        return date[1] + '/' + date[0] + '/' + date[2];
    }
    
    function setEventDatePicker(eventId) {
        dateString = $("#dateEvent_"+eventId).val();
        date = dateString.split("_");
    
        if (date) {
            start = date[0];
            end = date[1];
        
            if (typeof(end) != 'undefined') {
                $('#datePickerEvent_MultiDate').css('display', 'block');
                startDate = new Date(convert_date_format(start));
                endDate = new Date(convert_date_format(end));
                nowData = new Date();
    
                date = "";
                if (startDate > nowData) {
                    date = startDate;
                } else {
                    date = nowData;
                }
            
                $('#datePickerEvent_MultiDate').datepicker({
                    minDate: date,
                    maxDate: endDate,
                    autoClose: true,
                    range: false,
                });
    
                picker = $('#datePickerEvent_MultiDate');
                picker.data('datepicker').selectDate(date);
            } else {
                startDate = new Date(convert_date_format(start));
                nowData = new Date();
    
                date = "";
                if (startDate > nowData) {
                    date = startDate;
                } else {
                    date = nowData;
                }
    
                $('#datePickerEvent_MultiDate').datepicker({
                    minDate: date,
                    maxDate: startDate,
                    autoClose: true,
                    range: false,
                });
                picker = $('#datePickerEvent_MultiDate');
                picker.data('datepicker').selectDate(startDate);
            }	
        }
    }
    
    function getEventSheduler(eventId, eventName) {
        data = {'eventID' : eventId};
        $.ajax({
            type: "GET",
            data: data,
            url: '/calendar/ajax/getEventShedulerList.php',
            success: function (data) {
                window.eventSheduler = data;
                MultiSelectEventInit();
                $("[name=fm_sign_up] input[name=eventId]").val(eventId);
                $("[name=fm_sign_up] input[name=eventName]").val(eventName);
                setEventDatePicker(eventId);
            },
            error: function (jqXHR, text, error) {
               
            }
        });
    }
    
    function setModal() {
        e = document.querySelectorAll("[data-modal]");
        var n = document.body,
            o = document.querySelectorAll(".modal-custom__close"),
            r = document.querySelectorAll(".modal-custom");
        $(document).ready((function() {
            document.querySelectorAll("[data-modal]").forEach((function(e) {
                e.addEventListener("click", (function(e) {
                    var data = e.currentTarget.getAttribute("data-modal"),
                        o = document.getElementById(data),
                        r = o.querySelector(".modal-custom__content"),
                        eventId = e.currentTarget.getAttribute("data-eventId");
                        eventName = e.currentTarget.getAttribute("data-eventName");
                        if (data == 'fm_sign_up') {
                            getEventSheduler(eventId, eventName)
                        }
                    r.addEventListener("click", (function(e) {
                        e.stopPropagation()
                    })), o.classList.add("show"), n.classList.add("no-scroll"), setTimeout((function() {
                        r.style.transform = "none", r.style.opacity = "1"
                    }), 1)
                }))
            }))
        })), o.forEach((function(e) {
            e.addEventListener("click", (function(e) {
                var t = e.currentTarget.closest(".modal-custom");
                closeModal(t)
            }))
        })), r.forEach((function(e) {
            e.addEventListener("click", (function(e) {
                var t = e.currentTarget;
                closeModal(t)
            }))
        })), window.closeModal = function(e) {
            e && (e.querySelector(".modal-custom__content").removeAttribute("style"), setTimeout((function() {
                e.classList.remove("show"), n.classList.remove("no-scroll")
            }), 200))
        }
    }
    
});


