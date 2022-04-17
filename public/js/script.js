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
    var menu = ['fas fa-cog center_icon', 'fas fa-trophy center_icon', 'fas fa-home center_icon', 'fas fa-user-friends center_icon', 'fas fa-shopping-bag center_icon'];
    swiper = new Swiper('.swiper-container', {
        initialSlide: 2,
        spaceBetween: 30,
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
});


document.addEventListener("turbolinks:before-cache", function () {
    console.log("before-cache");
});
document.addEventListener("turbolinks:load", () => {
    console.log("turbolinks:load");
});

function getOS() {

    var uA = navigator.userAgent || navigator.vendor || window.opera;
    if ((/iPad|iPhone|iPod/.test(uA) && !window.MSStream) || (uA.includes('Mac') && 'ontouchend' in document)) return 'iOS';

    var i, os = ['Windows', 'Android', 'Unix', 'Mac', 'Linux', 'BlackBerry'];
    for (i = 0; i < os.length; i++) if (new RegExp(os[i], 'i').test(uA)) return os[i];
}
