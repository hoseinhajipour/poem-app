<footer>
    <div class="tab {{ Request::is('settings') ? 'active' : '' }}">
        <button onclick="swiper.slideTo(0);" class="icon">
            <i class="fas fa-cog"></i>
        </button>
    </div>
    <div class="tab {{ Request::is('leaderboards') ? 'active' : '' }}">
        <button onclick="swiper.slideTo(1);" class="icon">
            <i class="fas fa-trophy"></i>
        </button>
    </div>
    <div class="tab {{ Request::is('home') ? 'active' : '' }}">
        <button onclick="swiper.slideTo(2);" class="icon">
            <i class="fas fa-home"></i>

        </button>
    </div>
    <div class="tab {{ Request::is('myfriends') ? 'active' : '' }}">
        <button onclick="swiper.slideTo(3);" class="icon">
            <i class="fas fa-user-friends"></i>
        </button>
    </div>
    <div class="tab {{ Request::is('shop') ? 'active' : '' }}">
        <button onclick="swiper.slideTo(4);" class="icon">
            <i class="fas fa-shopping-bag"></i>
        </button>
    </div>
</footer>


