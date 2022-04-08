<div class="container">
    <div class="row">
        <div class="col-6 text-center">
            <div align="center">
                <img src="{{ Voyager::image(auth()->user()->avatar) }}" width="64"/>
            </div>
            <b>{{auth()->user()->name}}</b>
        </div>
        <div class="col-6 text-center">
            <div align="center">
                <img src="{{ Voyager::image($matchUser->avatar) }}" width="64"/>
            </div>
            <b>{{$matchUser->name}}</b>
        </div>
    </div>


    <div class="text-center alert alert-success" wire:poll>
        <b style="font-size: 85px">{{$this->countDownForPlay()}}</b>
    </div>
</div>

