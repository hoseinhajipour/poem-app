window.addEventListener('alert', event => {
    toastr[event.detail.type](event.detail.message,
        event.detail.title ?? ''), toastr.options = {
        "closeButton": true,
        "progressBar": true,
    }
});

window.addEventListener('updateSwiper', event => {
    GenerateSwiper();
    console.log("swiper.update");
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

function GenerateSwiper(){
    var menu = ['fas fa-cog', 'fas fa-trophy', 'fas fa-home', 'fas fa-user-friends', 'fas fa-shopping-bag'];
    var swiper = new Swiper('.swiper-container', {
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


function getOS() {
    var uA = navigator.userAgent || navigator.vendor || window.opera;
    if ((/iPad|iPhone|iPod/.test(uA) && !window.MSStream) || (uA.includes('Mac') && 'ontouchend' in document)) return 'iOS';

    var i, os = ['Windows', 'Android', 'Unix', 'Mac', 'Linux', 'BlackBerry'];
    for (i = 0; i < os.length; i++) if (new RegExp(os[i],'i').test(uA)) return os[i];
}
