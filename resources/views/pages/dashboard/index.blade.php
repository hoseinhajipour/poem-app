<div class="container" style="padding-bottom: 100px">
    <x-Transition transition="above" delay="1">
        <div class="row">
            <div class="col-12">
                <button  wire:click="NewPlayGame()"
                        class="btn3d btn btn-success form-control">
                    <span class="float-start free_coin_text">بازی جدید</span>
                    <i class="fas fa-play float-end free_coin_icon"></i>
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <button id="playMovie" class="btn3d btn btn-magick form-control">
                    <span class="float-start free_coin_text">سکه رایگان</span>
                    <i class="fas fa-video float-end free_coin_icon"></i>
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-12 text-center">
                <div>
                    <i class="fas fa-chevron-down MoveUpDownAnimate"></i>
                    <b>بازی اخیر</b>
                    <i class="fas fa-chevron-down MoveUpDownAnimate"></i>
                </div>
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
                                <span>{{$tournament->first_user_win?$tournament->first_user_win:0 }}</span>
                                <span> - </span>
                                <span>{{$tournament->second_user_win?$tournament->second_user_win:0}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </x-Transition>

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


</div>

