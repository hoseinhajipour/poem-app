<div>
    <div class="swiper swiper-container ">
        <div class="swiper-wrapper">
            <div class="swiper-slide" data-history="1" data-hash="slide1">
                <livewire:pages.dashboard.settings/>
            </div>
            <div class="swiper-slide" data-history="1" data-hash="slide2">
                <livewire:pages.dashboard.leaderboard/>
            </div>
            <div class="swiper-slide" data-history="2" data-hash="slide3">
                <livewire:pages.dashboard.index/>
            </div>
            <div class="swiper-slide" data-history="3" data-hash="slide4">
                <livewire:pages.dashboard.friends/>
            </div>
            <div class="swiper-slide" data-history="4" data-hash="slide5">
                <livewire:pages.dashboard.shop/>
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination custom-pagination"></div>


    </div>

    <script>
        $(document).ready(function () {
            GenerateSwiper();
            if (getOS() === "Android") {
                Android.getfirebaseToken();
            }

        });
        window.onpageshow = function (event) {
            if (event.persisted) {
                window.location.reload();
            }
        };
        function SaveFireBaseToken(token) {
        @this.SaveToken(token);
            console.log(token);
        }
    </script>
</div>



