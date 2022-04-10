<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <div data-history="0" class="swiper-slide">
            <livewire:pages.dashboard.settings/>
        </div>
        <div data-history="1" class="swiper-slide">
            <livewire:pages.dashboard.leaderboard/>
        </div>
        <div data-history="2" class="swiper-slide">
            <livewire:pages.dashboard.index/>
        </div>
        <div data-history="3" class="swiper-slide">
            <livewire:pages.dashboard.friends/>
        </div>
        <div data-history="4" class="swiper-slide">
            <livewire:pages.dashboard.shop/>
        </div>
    </div>
</div>

@yield('modal')
@include('pages.dashboard.part.bottomNav')
<script>
    var swiper;
    $(document).ready(function () {
        function updateBottomNavIcon(index) {
            var icon = document.getElementsByClassName("icon");
            var tab = document.getElementsByClassName("tab");
            for (var i = 0; i < icon.length; i++) {
                for (i = 0; i < tab.length; i++) {
                    tab[i].classList.remove("active");
                    if (i === index) {
                        tab[i].classList.toggle("active");
                    }
                }
            }
        }

        var CurrentactiveIndex = 2;
        if (localStorage.getItem("activeIndex")) {
            CurrentactiveIndex = parseInt(localStorage.getItem("activeIndex"));
        }
        swiper = new Swiper(".mySwiper", {
            initialSlide: {{$currentIndex}},
            history: {
                replaceState: true,
                key: 'home'
            },
        });

        swiper.on('slideChange', function () {
            updateBottomNavIcon(swiper.activeIndex);
        });

        $(window).on('hashchange', function() {

        });
        $(window).bind('popstate', function(event) {
            let indexx =parseInt(window.location.pathname.replace("/home/", ""));
            updateBottomNavIcon(indexx);
            swiper.slideTo(indexx);
            console.log(indexx);
        });
    });

</script>
