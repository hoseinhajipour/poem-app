<div class="container">
    <div class="row">
        <div class="col-12">

            <div class="alert alert-info text-center">{{$current_question_index+1}} /{{ count($questions) }}</div>
            <div class="btn btn-white form-control" align="center">
                @isset($current_question->image)
                    <img src="{{ Voyager::image($current_question->image) }}" width="100%"/>
                @endisset
                @if(isset(json_decode($current_question->video)[0]))
                    <video controls autoplay>
                        <source src="/storage/{{json_decode($current_question->video)[0]->download_link}}"
                                type="video/mp4">
                    </video>
                @endisset

                @if(isset(json_decode($current_question->music)[0]))
                    <audio controls autoplay>
                        <source src="/storage/{{json_decode($current_question->music)[0]->download_link}}"
                                type="audio/mpeg">
                    </audio>
                @endisset
                <p>{{$current_question->description}}</p>
            </div>

            <div class="progress">
                <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                    <div
                        class="timer_progress bg-blue-600 text-xs font-medium text-blue-100
                        h-2.5
                         text-center p-0.5 leading-none rounded-full"
                        style="width: 100%"></div>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <button onclick="SendAnswer(1)"
                    @if($current_question->true_answer ==1)
                    data-true="1"
                    @endif
                    class="btn3d btn btn-default form-control SendAnswer01 SelectAnswer @if($hide_answer01) d-none @endif">
                <div class="chance_precent w-full bg-gray-200 rounded-full dark:bg-gray-700
                @if($showPrecents==false) d-none @endif
                    ">
                    <div
                        class="chance_progrecss bg-blue-600 text-xs font-medium text-blue-100
                        h-2.5
                         text-center p-0.5 leading-none rounded-full"
                        style="width: {{$precents[0]}}%"></div>
                </div>

                {{$current_question->answer01}}


            </button>
        </div>
        <div class="col-6">
            <button onclick="SendAnswer(2)"
                    @if($current_question->true_answer ==2)
                    data-true="2"
                    @endif
                    class="btn3d btn btn-default form-control SendAnswer02 SelectAnswer @if($hide_answer02) d-none @endif">
                <div
                    class="chance_precent w-full bg-gray-200 rounded-full dark:bg-gray-700 @if($showPrecents==false) d-none @endif">
                    <div
                        class="chance_progrecss bg-blue-600 text-xs font-medium text-blue-100
                        h-2.5
                         text-center p-0.5 leading-none rounded-full"
                        style="width: {{$precents[1]}}%"></div>
                </div>
                {{$current_question->answer02}}
            </button>
        </div>
        <div class="col-6">
            <button
                onclick="SendAnswer(3)"
                @if($current_question->true_answer ==3)
                data-true="3"
                @endif
                class="btn3d btn btn-default form-control SendAnswer03 SelectAnswer @if($hide_answer03) d-none @endif">
                <div
                    class="chance_precent w-full bg-gray-200 rounded-full dark:bg-gray-700 @if($showPrecents==false) d-none @endif">
                    <div
                        class="chance_progrecss bg-blue-600 text-xs font-medium text-blue-100
                        h-2.5
                         text-center p-0.5 leading-none rounded-full"
                        style="width: {{$precents[2]}}%"></div>
                </div>
                {{$current_question->answer03}}
            </button>
        </div>
        <div class="col-6">
            <button
                onclick="SendAnswer(4)"
                @if($current_question->true_answer ==4)
                data-true="4"
                @endif
                class="btn3d btn btn-default form-control SendAnswer04 SelectAnswer @if($hide_answer04) d-none @endif">
                <div
                    class="chance_precent w-full bg-gray-200 rounded-full dark:bg-gray-700 @if($showPrecents==false) d-none @endif">
                    <div
                        class="chance_progrecss bg-blue-600 text-xs font-medium text-blue-100
                        h-2.5
                         text-center p-0.5 leading-none rounded-full"
                        style="width: {{$precents[3]}}%"></div>
                </div>
                {{$current_question->answer04}}
            </button>
        </div>
    </div>

    <div class="footer_helper fixed-bottom">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <button wire:click="ChancePercent_btn()"
                            @if(auth()->user()->wallet<60)
                            disabled
                            @endif
                            @if($ChancePercent)
                            disabled
                            @endif
                            class="btn ChancePercent btn3d btn-success form-control">
                        <i class="fas fa-percent"></i>
                        <div>
                            <i class="fas fa-coins"></i>
                            <span>60</span>
                        </div>
                    </button>
                </div>
                <div class="col-4">
                    <button wire:click="RemoveTwoAnswer_btn()"
                            @if(auth()->user()->wallet<40)
                            disabled
                            @endif
                            @if($RemoveTwoAnswer)
                            disabled
                            @endif
                            class="RemoveTwoAnswer btn btn3d btn-success form-control">
                        <i class="fas fa-bomb"></i>
                        <div>
                            <i class="fas fa-coins"></i>
                            <span>40</span>
                        </div>
                    </button>
                </div>
                <div class="col-4">
                    <button wire:click="EnableTwoChance_btn()"
                            @if(auth()->user()->wallet<60)
                            disabled
                            @endif
                            @if($EnableTwoChanceClick)
                            disabled
                            @endif
                            class="EnableTwoChanceClick btn btn3d btn-success form-control">
                        <i>2x</i>
                        <div>
                            <i class="fas fa-coins"></i>
                            <span>40</span>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" data-bs-backdrop="static"
         id="NextQuest" tabindex="-1" aria-labelledby="NextQuest"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <button wire:click="ContinueGame()"
                                    class="btn3d btn btn-magick form-control ContinueGame"
                                    data-bs-dismiss="modal"
                            >ادامه بازی
                            </button>
                        </div>
                        <div class="col-12">
                            <button
                                class="btn3d btn btn-warning form-control"
                                data-bs-dismiss="modal">گزارش سوال
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button wire:click="DislikeQuest()"
                                    class="btn3d btn btn-danger form-control"
                            >
                                <i class="fas fa-thumbs-down"></i>
                            </button>
                        </div>
                        <div class="col-6">
                            <button
                                wire:click="LikeQuest()"
                                class="btn3d btn btn-success form-control">
                                <i class="fas fa-thumbs-up"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        var TwochanceClick = {{$TwochanceClick}};

        function SendAnswer(id) {
            if (TwochanceClick === 0) {
                $(".SelectAnswer").each(function (child) {
                    $(this).prop("disabled", true);
                });
                if ($(".SendAnswer0" + id).attr("data-true")) {
                    $(".SendAnswer0" + id).removeClass('btn-default');
                    $(".SendAnswer0" + id).addClass('btn-success');
                } else {
                    $(".SendAnswer0" + id).removeClass('btn-default');
                    $(".SendAnswer0" + id).addClass('btn-danger');
                }

                $(".timer_progress").stop();
                setTimeout(function () {
                @this.SelectAnswer(id)
                }, 1000);
            } else {
                if ($(".SendAnswer0" + id).attr("data-true")) {
                    $(".SendAnswer0" + id).removeClass('btn-default');
                    $(".SendAnswer0" + id).addClass('btn-success');

                    $(".SelectAnswer").each(function (child) {
                        $(this).prop("disabled", true);
                    });

                    $(".timer_progress").stop();
                    setTimeout(function () {
                    @this.SelectAnswer(id)
                    }, 1000);
                } else {
                    $(".SendAnswer0" + id).removeClass('btn-default');
                    $(".SendAnswer0" + id).addClass('btn-danger');
                }
                TwochanceClick--;
            }

        }

        function StartTimer() {
            $(".timer_progress").css("width", "100%");
            setTimeout(function () {
                $(".timer_progress").animate({
                    width: "0%"
                }, 20000, "linear", function () {
                    $('#NextQuest').modal('show');
                });
            }, 1000);
        }

        $(document).ready(function () {
            StartTimer();
            $(".ContinueGame").click(function () {
                StartTimer();
            });
        });

        function ResetAllButton() {
            $(".SelectAnswer").each(function (child) {
                $(this).find(".chance_precent").addClass("d-none");
                if ($(this).hasClass('btn-success')) {
                    $(this).removeClass('btn-success');
                    $(this).addClass('btn-default');
                }
                if ($(this).hasClass('btn-danger')) {
                    $(this).removeClass('btn-danger');
                    $(this).addClass('btn-default');
                }
                if ($(this).hasClass('d-none')) {
                    $(this).removeClass('d-none');
                }
                $(this).prop("disabled", false);
            });
            TwochanceClick = 0;
        }

        window.addEventListener('ShowNextQuest', event => {
            $('#NextQuest').modal('show');
            ResetAllButton();
        })
    </script>
</div>


