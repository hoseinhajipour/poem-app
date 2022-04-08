<style>
    footer {
        position: fixed;
        bottom: -33px;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #0093e9;
        background-image: linear-gradient(160deg, #0093e9 0%, #80d0c7 100%);
        border-radius: 10px;
        height: 10vh;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100vw;
    }

    footer .tab {
        display: flex;
        align-items: center;
        padding: 5px 0;
        margin: 0px 10px;
        width: 50px;
        overflow: hidden;
        border-radius: 10px;
        transition: all 0.5s;
    }

    footer .icon {
        font-size: 2.2rem;
        color: white;
        margin: 0 10px;
    }

    footer .icon:hover {
        color: rgb(238, 238, 238);
    }

    footer .tab p {
        margin-right: 8px;
        cursor: pointer;
    }

    footer .tab.active {
        width: 60px;
        justify-content: center;
        background: rgba(228, 228, 228, 0.459);
    }
</style>
<footer>
    <div class="tab {{ Request::is('settings') ? 'active' : '' }}">
        <a href="/settings" class="icon">
            <i class="fas fa-cog"></i>
        </a>
    </div>
    <div class="tab {{ Request::is('leaderboards') ? 'active' : '' }}">
        <a href="/leaderboards" class="icon">
            <i class="fas fa-trophy"></i>
        </a>
    </div>
    <div class="tab {{ Request::is('home') ? 'active' : '' }}">
        <a href="/home" class="icon">
            <i class="fas fa-home"></i>

        </a>
    </div>
    <div class="tab {{ Request::is('myfriends') ? 'active' : '' }}">
        <a href="/myfriends" class="icon">
            <i class="fas fa-user-friends"></i>
        </a>
    </div>
    <div class="tab {{ Request::is('shop') ? 'active' : '' }}">
        <a href="/shop" class="icon">
            <i class="fas fa-shopping-bag"></i>
        </a>
    </div>
</footer>
<script>
    document.addEventListener("DOMContentLoaded", function(event) {

        const icon = document.getElementsByClassName("icon");
        const tab = document.getElementsByClassName("tab");
        for (var i = 0; i < icon.length; i++) {
            icon[i].addEventListener('click', function(event){
                for (i = 0; i < tab.length; i++){
                    tab[i].classList.remove("active");
                }
                this.parentElement.classList.toggle("active");
            });
        }
    });
</script>
