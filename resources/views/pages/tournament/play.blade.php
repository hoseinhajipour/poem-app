<div class="container">
    <div class="row">
        <div class="col-12">

            <div class="btn3d btn btn-white form-control">
                {{$questions[$current_question_index]->quiz->description}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <button class="btn3d btn btn-default form-control">
                {{$questions[$current_question_index]->quiz->answer01}}
            </button>
        </div>
        <div class="col-6">
            <button class="btn3d btn btn-default form-control">
                {{$questions[$current_question_index]->quiz->answer02}}
            </button>
        </div>
        <div class="col-6">
            <button class="btn3d btn btn-default form-control">
                {{$questions[$current_question_index]->quiz->answer03}}
            </button>
        </div>
        <div class="col-6">
            <button class="btn3d btn btn-default form-control">
                {{$questions[$current_question_index]->quiz->answer04}}
            </button>
        </div>
    </div>
</div>
