@auth
    <div class="container fixed-top shadow bg-light">

        <div class="row">
            <div class="col-6">
                <div class="coins">
                    <i class="fas fa-coins"></i>
                    <b>{{auth()->user()->wallet}}</b>
                </div>
            </div>
            <div class="col-6">
                <div class="score_box">
                    <b>{{auth()->user()->score}}</b>
                    <i class="fas fa-star"></i>

                </div>
            </div>
        </div>

    </div>
@endauth
