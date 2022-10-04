// window.eventSheduler = [];
// window.multi = [];
// document.addEventListener("DOMContentLoaded", function(){
//     setModal()
//     $("form").submit(function( event ) {
//         event.preventDefault();

//         const form = event.target;
//         const formName = form.getAttribute("name");
//         data = [];

//         if (formName == 'fm_sign_up') {
//             data = $("[name=fm_sign_up]").serializeArray();

//             if ($("#multiselectEvent").length) {
//                 strSheduler = '';

//                 if (window.multi.length != 0) {
//                     if ( window.multi.items.length < 1) {
//                         alert("Не выбрана афиша мероприятия");
//                         return false;
//                     }
//                 }
                
//                 for (const key in window.multi.items) {
//                     value = window.multi.items[key].value;
//                     nameEventSheduler = window.multi.items[key].id +"_eventSheduler"
//                     if (strSheduler) {
//                         strSheduler += ', ' + value;
//                     } else {
//                         strSheduler += value;
//                     }
                    
//                     data['eventSheduler'] = {'name': 'eventSheduler', 'value': strSheduler};
//                 }
//             }
//         }
        
//         createLead(event, data);
//         return false;
//     });
// })
// function MultiSelectEventInit() {
//     if ($("#multiselectEvent").length ) {

//         list = [];
//         if (window.eventSheduler.length > 0 ) {
//             list = JSON.parse(window.eventSheduler);
//         }

//         if (typeof(window.multi.destroy) == 'function') {
//             window.multi.destroy();
//         }

//         if (list.length > 0) {
//             window.multi = new MultiselectUI('#multiselectEvent', {
//                 placeholder: 'Выберите мероприятие',
//                 name: 'multiselectEvent',
//                 // selectedId: '2',
//                 data: list,
//                     onSelect(item){
//                     console.log('selected Item', item)
//                 }
//             });
//             $("#multiselectEventBlock").css('display', 'block');
//         } else {
//             $("#multiselectEventBlock").css('display', 'none');
//         }
//     }
// }

// function convert_date_format(date_string, delim = '.') {
// 	let date = date_string.split(delim, 3);
// 	return date[1] + '/' + date[0] + '/' + date[2];
// }

// function setEventDatePicker(eventId) {
//     dateString = $("#dateEvent_"+eventId).val();
//     date = dateString.split("_");

//     if (date) {
// 		start = date[0];
// 		end = date[1];
	
//         if (typeof(end) != 'undefined') {
//             $('#datePickerEvent_MultiDate').css('display', 'block');
//             startDate = new Date(convert_date_format(start));
//             endDate = new Date(convert_date_format(end));
//             nowData = new Date();

//             date = "";
//             if (startDate > nowData) {
//                 date = startDate;
//             } else {
//                 date = nowData;
//             }
        
//             $('#datePickerEvent_MultiDate').datepicker({
//                 minDate: date,
//                 maxDate: endDate,
//                 autoClose: true,
//                 range: false,
//             });

//             picker = $('#datePickerEvent_MultiDate');
//             picker.data('datepicker').selectDate(date);
//         } else {
//             startDate = new Date(convert_date_format(start));
//             nowData = new Date();

//             date = "";
//             if (startDate > nowData) {
//                 date = startDate;
//             } else {
//                 date = nowData;
//             }

//             $('#datePickerEvent_MultiDate').datepicker({
//                 minDate: date,
//                 maxDate: startDate,
//                 autoClose: true,
//                 range: false,
//             });
//             picker = $('#datePickerEvent_MultiDate');
//             picker.data('datepicker').selectDate(startDate);
//         }	
// 	}
// }

// function getEventSheduler(eventId, eventName) {
//     data = {'eventID' : eventId};
//     $.ajax({
//         type: "GET",
//         data: data,
//         url: '/calendar/ajax/getEventShedulerList.php',
//         success: function (data) {
//             window.eventSheduler = data;
//             MultiSelectEventInit();
//             $("[name=fm_sign_up] input[name=eventId]").val(eventId);
//             $("[name=fm_sign_up] input[name=eventName]").val(eventName);
//             setEventDatePicker(eventId);
//         },
//         error: function (jqXHR, text, error) {
           
//         }
//     });
// }

// function setModal() {
//     e = document.querySelectorAll("[data-modal]");
//     var n = document.body,
//         o = document.querySelectorAll(".modal-custom__close"),
//         r = document.querySelectorAll(".modal-custom");
//     $(document).ready((function() {
//         document.querySelectorAll("[data-modal]").forEach((function(e) {
//             e.addEventListener("click", (function(e) {
//                 var data = e.currentTarget.getAttribute("data-modal"),
//                     o = document.getElementById(data),
//                     r = o.querySelector(".modal-custom__content"),
//                     eventId = e.currentTarget.getAttribute("data-eventId");
//                     eventName = e.currentTarget.getAttribute("data-eventName");
//                     if (data == 'fm_sign_up') {
//                         getEventSheduler(eventId, eventName)
//                     }
//                 r.addEventListener("click", (function(e) {
//                     e.stopPropagation()
//                 })), o.classList.add("show"), n.classList.add("no-scroll"), setTimeout((function() {
//                     r.style.transform = "none", r.style.opacity = "1"
//                 }), 1)
//             }))
//         }))
//     })), o.forEach((function(e) {
//         e.addEventListener("click", (function(e) {
//             var t = e.currentTarget.closest(".modal-custom");
//             closeModal(t)
//         }))
//     })), r.forEach((function(e) {
//         e.addEventListener("click", (function(e) {
//             var t = e.currentTarget;
//             closeModal(t)
//         }))
//     })), window.closeModal = function(e) {
//         e && (e.querySelector(".modal-custom__content").removeAttribute("style"), setTimeout((function() {
//             e.classList.remove("show"), n.classList.remove("no-scroll")
//         }), 200))
//     }
// }
