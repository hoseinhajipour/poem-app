<div class="container">
    <div class="row">
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
                        wire:click="SelectCategory({{$category->id}})"
                        data-bs-toggle="modal" data-bs-target="#ReadyForPlay">
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
        @foreach($tournaments as $tournament)
            <div class="col-12">
                <div wire:click="PlayTournament({{$loop->index}})"
                     class="btn3d btn {{$this->checkStatus($loop->index)}} form-control">
                    <div class="row">
                        <div class="col-3 text-center">
                            @if($tournament->first_user_id!= auth()->user()->id)
                                <img src="{{ Voyager::image($tournament->firstUser->avatar) }}" width="64"/>
                            @else
                                <img src="{{ Voyager::image($tournament->secondUser->avatar) }}" width="64"/>
                            @endif
                        </div>
                        <div class="col-6">
                            @if($tournament->first_user_id!= auth()->user()->id)
                                {{$tournament->firstUser->name}}
                            @else
                                {{$tournament->secondUser->name}}
                            @endif
                        </div>
                        <div class="col-3 text-center">
                            {{$tournament->first_user_true_answer }} - {{$tournament->second_user_true_answer}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
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
    @if (session()->has('alert'))
        <script>
            toastr["{{ session('type') }}"]("{{ session('message') }}"), toastr.options = {
                "closeButton": true,
                "progressBar": true,
            };
        </script>
    @endif

    <div wire:ignore.self class="modal fade" data-bs-backdrop="false"
         id="ReadyForPlay" tabindex="-1" aria-labelledby="ReadyForPlay"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div wire:loading align="center">
                        loading...
                    </div>
                    <div wire:loading.remove class="row">
                        <div class="col-6">
                            <button wire:click="GoSearchUserPage()"
                                    class="btn3d btn btn-magick form-control"
                                    data-bs-dismiss="modal"
                            >جستجو نام
                            </button>
                        </div>
                        <div class="col-6">
                            <button
                                wire:click="PlayWithRandomPlayer()"
                                class="btn3d btn btn-magick form-control"
                                data-bs-dismiss="modal">حریف تصادفی
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@section('modal')

@endsection
