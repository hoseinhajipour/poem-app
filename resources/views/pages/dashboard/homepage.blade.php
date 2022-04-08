<div class="container">
    <div class="row">
        <div class="col-12">
            <button class="btn3d btn btn-success form-control">
                <span>شروع بازی رو در رو</span>
                <i class="fas fa-play"></i>
            </button>
        </div>
    </div>
    <div class="row">
        @foreach($categories as $category)
            <div class="col-6">
                <button class="btn3d btn btn-primary form-control">
                    <span>{{$category->name}}</span>
                    <i class="fas fa-play"></i>
                </button>
            </div>
        @endforeach

    </div>


    <div class="row">
        <div class="col-12 text-center">
            <b>بازی اخیر</b>
        </div>

        <div class="col-12">
            <div class="alert alert-success" role="alert">
                <div class="row">
                    <div class="col-3 text-center">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="col-6">
                        Player 1234
                    </div>
                    <div class="col-3 text-center">
                        4-2
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
