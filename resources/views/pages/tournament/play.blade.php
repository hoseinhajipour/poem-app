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
            <button wire:click="SelectAnswer(1)"
                class="btn3d btn btn-default form-control">
                {{$current_question->answer01}}
            </button>
        </div>
        <div class="col-6">
            <button wire:click="SelectAnswer(2)"
                class="btn3d btn btn-default form-control">
                {{$current_question->answer02}}
            </button>
        </div>
        <div class="col-6">
            <button wire:click="SelectAnswer(3)"
                class="btn3d btn btn-default form-control">
                {{$current_question->answer03}}
            </button>
        </div>
        <div class="col-6">
            <button wire:click="SelectAnswer(4)"
                class="btn3d btn btn-default form-control">
                {{$current_question->answer04}}
            </button>
        </div>
    </div>
</div>

