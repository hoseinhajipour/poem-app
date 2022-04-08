<div class="container">
    <div class="row">
        <div class="col-12">
            <button class="btn3d btn btn-success form-control">
                <span>شروع بازی رو در رو</span>
                <i class="fas fa-play"></i>
            </button>
        </div>
        <div class="col-12">
            <button id="playMovie" class="btn3d btn btn-magick form-control">
                <span>سکه رایگان</span>
                <i class="fas fa-video"></i>
            </button>
        </div>
    </div>
    <div class="row">
        @foreach($categories as $category)
            <div class="col-6">
                <button class="btn3d btn btn-primary form-control"
                        data-bs-toggle="modal" data-bs-target="#ReadyForPlay">
                    <span>{{$category->name}}</span>
                    <i class="fas fa-play"></i>
                </button>
            </div>
        @endforeach

    </div>

    <div wire:ignore.self class="modal fade" id="ReadyForPlay" tabindex="-1" aria-labelledby="ReadyForPlay" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <a href="{{route('search.user-list')}}"
                               class="btn3d btn btn-magick form-control"
                               >جستجو نام</a>
                        </div>
                        <div class="col-6">
                            <button class="btn3d btn btn-magick form-control" data-bs-dismiss="modal">حریف تصادفی
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

    <script>
        $(document).ready(function () {
            $("#playMovie").click(function () {
                Android.playRewardVideo({{auth()->user()->id}});
            });
        });

        function appendRewrad() {
        @this.Rewardincrement()
        }
    </script>
</div>
