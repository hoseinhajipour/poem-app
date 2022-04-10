window.addEventListener('alert', event => {
    toastr[event.detail.type](event.detail.message,
        event.detail.title ?? ''), toastr.options = {
        "closeButton": true,
        "progressBar": true,
    }
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
