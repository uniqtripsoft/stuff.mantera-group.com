let result = "";
document.addEventListener("DOMContentLoaded", function(event) { 
    
    datepicker = $('#scheduleDate').datepicker({
        minDate: new Date()
    });
    
    let page = $('[name=NavPageNomer]').val();
    let pageCount = $('[name=NavPageCount]').val();
    if( parseInt(page) >= parseInt(pageCount)){
        $('.show-btn').css('display', 'none');
    }
    else{
        $('.show-btn').css('display', 'block');
    }

    const btnChange = document.getElementById('searchEventButton');
    const textAjax = document.getElementById('news-ajax');

    btnChange.addEventListener("click", ()=> {
        
        if (btnChange.innerHTML == "Найти") {
            const dateFilter = $("#scheduleDate").val();
            if (dateFilter.length > 0) {
                btnChange.innerHTML = "Сбросить";
                serachWithDataFilter();
            } else {
                alert("Не выбраны даты для поиска");
            }
        } else {
            btnChange.innerHTML = "Найти";

            $('[name=NavPageNomer]').remove();
            $('[name=NavPageCount]').remove();

            nowData = new Date();
            $('#scheduleDate').datepicker({
                minDate: nowData,
                autoClose: true,
            });

            $('#scheduleDate').val("");

            data = {};
            result = sendAjaxWithFilter(data);
            result.done(function(data) {
                $('[name=NavPageNomer]').remove();
                $('[name=NavPageCount]').remove();
                $('#news-ajax').html(data);
                let page = $('[name=NavPageNomer]').val();
                let pageCount = $('[name=NavPageCount]').val();
                if( parseInt(page) >= parseInt(pageCount) && result.length > 0 ) {
                    $('.show-btn').css('display', 'none');
                }
                else{
                    $('.show-btn').css('display', 'block');
                }
                setModal();
                textAjax.innerHTML = "";
            });
        }
    });

});

function serachWithDataFilter() {
    const dateFilter = $("#scheduleDate").val();
    if (dateFilter.length > 0) {
        result = News(dateFilter);
        result.done(function(data){
            $('[name=NavPageNomer]').remove();
            $('[name=NavPageCount]').remove();
            $('#news-ajax').html(data);
            let page = $('[name=NavPageNomer]').val();
            let pageCount = $('[name=NavPageCount]').val();
            if( parseInt(page) >= parseInt(pageCount) && result.length > 0 ) {
                $('.show-btn').css('display', 'none');
            }
            else{
                $('.show-btn').css('display', 'block');
            }
            setModal();
        })
    }
}


function News(formattedDate = false, Page = false){
    pageNumber = $('[name=NavPageNomer]').val();
    pageCount = $('[name=NavPageCount]').val();
    data = {};

    if(Page == true) {
        data.PAGEN_1 = parseInt(pageNumber)  + 1;
    }

    if(formattedDate != false){
        dataSplit = formattedDate.split(' - ');
        data.dateBegin = dataSplit[0];
        data.dateEnd = dataSplit[1];
    }

    data.AJAX_LOAD = "Y";
    result = "";
    return sendAjaxWithFilter(data);

}

function sendAjaxWithFilter(data) {
    return $.ajax({
        type: "GET",
        data: data,
        url: '/events/ajax/ajax.php',
        success: function (data) {
            result = data;
            $('#news-ajax > .ajax-loading').remove();
        },
        error: function (jqXHR, text, error) {
            $('#news-ajax').html(error);
        }
    });
}

function ShowMore(){
    formattedDate = $("#scheduleDate").val();
    result = News(formattedDate, true);
    result.done(function(data){
        $('[name=NavPageNomer]').remove();
        $('[name=NavPageCount]').remove();
        $('#news-ajax').append(data);
        let page = $('[name=NavPageNomer]').val();
        let pageCount = $('[name=NavPageCount]').val();
        console.log(['pageCount', page, pageCount])
        if( parseInt(page) >= parseInt(pageCount) || page == false || pageCount == false){
            $('.show-btn').css('display', 'none');
        }
        else{
            $('.show-btn').css('display', 'block');
        }
        setModal();
    })
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