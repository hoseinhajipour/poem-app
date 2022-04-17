<div class="container">
    <x-Transition transition="above" delay="1">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-6">
                    <button class="btn3d btn btn-primary form-control text-center"
                            wire:click="SelectCategory({{$category->id}})"
                            data-bs-toggle="modal" data-bs-target="#ReadyForPlay">
                        <img src="{{ Voyager::image($category->icon) }}" class="center" width="64"/>
                        <p>{{$category->name}}</p>

                    </button>
                </div>
            @endforeach
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
                                {{$tournament->first_user_true_answer }} - {{$tournament->second_user_true_answer}}
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

    <div wire:ignore.self class="modal fade" data-bs-backdrop="false"
         id="ReadyForPlay" tabindex="-1" aria-labelledby="ReadyForPlay"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div wire:loading align="center" class="text-center">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    <div wire:loading.remove class="row">
                        @if(auth()->user()->wallet>100)
                            <div class="col-12">
                                <div class="alert alert-info text-center">
                                    <span>برای شرکت در بازی 100 سکه از اعتبار شما کم می شود</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <button wire:click="GoSearchUserPage()"
                                        data-turbolinks="false"
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
                        @else
                            <div class="col-12">
                                <button
                                    class="btn3d btn btn-danger form-control"
                                    data-bs-dismiss="modal"
                                >موجودی سکه کافی نیست
                                </button>
                            </div>
                        @endif
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

