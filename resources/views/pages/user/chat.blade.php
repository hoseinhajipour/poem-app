<div class="container">
    <div class="row" wire:poll>
        @foreach($messages as $msg)
            <div class="col-12">
                @if($msg->from_id == auth()->user()->id)
                    <div class="alert alert-info float-end">
                        {{$msg->text}}
                    </div>
                @else
                    <div class="alert alert-success float-start">
                        {{$msg->text}}
                    </div>
                @endif
            </div>
        @endforeach
    </div>
    <div class="row fixed-bottom">
        <div class="col-10 ">
            <input type="text" class="form-control" wire:model.defer="newText">
        </div>
        <div class="col-2">
            <button class="btn btn-primary form-control" wire:click="SendNewMessage()">
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </div>


</div>

