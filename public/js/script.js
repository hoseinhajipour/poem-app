window.addEventListener('alert', event => {
    toastr[event.detail.type](event.detail.message,
        event.detail.title ?? ''), toastr.options = {
        "closeButton": true,
        "progressBar": true,
    }
});

window.addEventListener('updateSwiper', event => {
    GenerateSwiper();
});
window.addEventListener('TwochanceClickUpdate', event => {
    TwochanceClick = 1;
});
window.addEventListener('start_timer_progress', event => {
    StartTimer();
    console.log("start_timer_progress");
});

window.addEventListener('Stop_timer_progress', event => {
    $(".timer_progress").stop();
});


document.addEventListener("DOMContentLoaded", function (event) {
    const icon = document.getElementsByClassName("icon");
    const tab = document.getElementsByClassName("tab");
    for (var i = 0; i < icon.length; i++) {
        icon[i].addEventListener('click', function (event) {
            for (i = 0; i < tab.length; i++) {
                tab[i].classList.remove("active");
            }
            this.parentElement.classList.toggle("active");
        });
    }
});
var swiper;

function GenerateSwiper() {
    var menu = ['btn_footer fas fa-cog center_icon', 'btn_footer fas fa-trophy center_icon',
        'btn_footer fas fa-home center_icon', 'btn_footer fas fa-user-friends center_icon',
        'btn_footer fas fa-shopping-bag center_icon'];
    swiper = new Swiper('.swiper-container', {
        initialSlide: 2,
        spaceBetween: 30,
        autoHeight: true,
        hashNavigation: {
            watchState: true,
        },

        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            renderBullet: function (index, className) {
                var row = '<span class="' + className + '">';
                row += '<span class="' + menu[index] + '"></span>';
                row += '</span>';
                return row;
            },
        },
    });
}

function appendHomeUrl() {
    const state = {}
    const url = '/home'
    history.pushState(state, '', url)
}

function RedirectWithCurrentSatet(url_to, current) {
    history.pushState(history.state, current, current);

    Turbolinks.visit(url_to);
}

$(document).ready(function () {
    $(".appendHomeUrl").click(event => {
        appendHomeUrl();
    });
    /*
        $('.btn').on('click', function () {
            var obj = document.createElement('audio');
            obj.src = '/sound/click.mp3';
            obj.play();
        });
        $('.btn_footer').on('click', function () {
            var obj = document.createElement('audio');
            obj.src = '/sound/click.mp3';
            obj.play();
        });
    */
});


document.addEventListener("turbolinks:before-cache", function () {
    //console.log("before-cache");
});
document.addEventListener("turbolinks:load", () => {
    //console.log("turbolinks:load");
});

function getOS() {

    var uA = navigator.userAgent || navigator.vendor || window.opera;
    if ((/iPad|iPhone|iPod/.test(uA) && !window.MSStream) || (uA.includes('Mac') && 'ontouchend' in document)) return 'iOS';

    var i, os = ['Windows', 'Android', 'Unix', 'Mac', 'Linux', 'BlackBerry'];
    for (i = 0; i < os.length; i++) if (new RegExp(os[i], 'i').test(uA)) return os[i];
}


String.prototype.toPersianDigit = function (a) {
    return this.replace(/\d+/g, function (digit) {
        var enDigitArr = [], peDigitArr = [];
        for (var i = 0; i < digit.length; i++) {
            enDigitArr.push(digit.charCodeAt(i));
        }
        for (var j = 0; j < enDigitArr.length; j++) {
            peDigitArr.push(String.fromCharCode(enDigitArr[j] + ((!!a && a == true) ? 1584 : 1728)));
        }
        return peDigitArr.join('');
    });
};

function TraceNodes(Node) {
    if (Node.nodeType == 3) Node.nodeValue = Node.nodeValue.toPersianDigit(); else for (var i = 0; i < Node.childNodes.length; i++) TraceNodes(Node.childNodes[i]);
}

TraceNodes(document);
