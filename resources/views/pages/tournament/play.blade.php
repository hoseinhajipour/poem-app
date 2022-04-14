<div class="container">
    <div class="row">
        <div class="col-12">

            <div class="btn3d btn btn-white form-control">
                {{$current_question->description}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <button onclick="SendAnswer(1)"
                    @if($current_question->true_answer ==1)
                    data-true="true"
                    @endif
                    class="btn3d btn btn-default form-control SendAnswer01 SelectAnswer">
                {{$current_question->answer01}}
            </button>
        </div>
        <div class="col-6">
            <button onclick="SendAnswer(2)"
                    @if($current_question->true_answer ==2)
                    data-true="true"
                    @endif
                    class="btn3d btn btn-default form-control SendAnswer02 SelectAnswer">
                {{$current_question->answer02}}
            </button>
        </div>
        <div class="col-6">
            <button onclick="SendAnswer(3)"
                    @if($current_question->true_answer ==3)
                    data-true="true"
                    @endif
                    class="btn3d btn btn-default form-control SendAnswer03 SelectAnswer">
                {{$current_question->answer03}}
            </button>
        </div>
        <div class="col-6">
            <button onclick="SendAnswer(4)"
                    @if($current_question->true_answer ==4)
                    data-true="true"
                    @endif
                    class="btn3d btn btn-default form-control SendAnswer04 SelectAnswer">
                {{$current_question->answer04}}
            </button>
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
                                    class="btn3d btn btn-magick form-control"
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
</div>

<script>
    function SendAnswer(id){

        $(".SelectAnswer").each(function (child) {
            $(this).prop("disabled", true);
        });
        if ($(".SendAnswer0"+id).attr("data-true")) {
            $(".SendAnswer0"+id).removeClass('btn-default');
            $(".SendAnswer0"+id).addClass('btn-success');
        } else {
            $(".SendAnswer0"+id).removeClass('btn-default');
            $(".SendAnswer0"+id).addClass('btn-danger');
        }
        setTimeout(function () {
        @this.SelectAnswer(id)
        }, 1000);
    }

    $(document).ready(function () {

    });


    function ResetAllButton() {
        $(".SelectAnswer").each(function (child) {
            if ($(this).hasClass('btn-success')) {
                $(this).removeClass('btn-success');
                $(this).addClass('btn-default');
            }
            if ($(this).hasClass('btn-danger')) {
                $(this).removeClass('btn-danger');
                $(this).addClass('btn-default');
            }
            $(this).prop("disabled", false);
        });
    }

    window.addEventListener('ShowNextQuest', event => {
        $('#NextQuest').modal('show');
        ResetAllButton();
    })
</script>
