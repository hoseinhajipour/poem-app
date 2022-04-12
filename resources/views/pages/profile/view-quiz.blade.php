<div class="container">
    <div class="btn btn3d btn-default form-control">
        @isset($quiz->image)
            <img src="{{ Voyager::image($quiz->image) }}" width="100%"/>
        @endisset
        @isset($quiz->video)
            <video controls autoplay>
                <source src="/storage/{{json_decode($quiz->video)[0]->download_link}}" type="video/mp4">
            </video>
        @endisset

        @isset($quiz->music)
            <audio controls autoplay>
                <source src="/storage/{{json_decode($quiz->music)[0]->download_link}}" type="audio/mpeg">
            </audio>
        @endisset
        <p>{{$quiz->description}}</p>
    </div>

    <hr/>
    <div class="row">
        <div class="col-6">
            <label
                class="btn3d btn form-control {{$quiz->true_answer == 1 ? 'btn-success' : 'btn-default'}}">
                <div>{{$quiz->answer01}}</div>
            </label>
        </div>
        <div class="col-6">
            <div class="btn3d btn form-control {{$quiz->true_answer == 2 ? 'btn-success' : 'btn-default'}}">
                <div>{{$quiz->answer02}}</div>
            </div>
        </div>
        @if($quiz->type !="true/false")
            <div class="col-6">
                <div class="btn3d btn form-control {{$quiz->true_answer == 3 ? 'btn-success' : 'btn-default'}}">
                    <div>{{$quiz->answer03}}</div>
                </div>
            </div>
            <div class="col-6">
                <div class="btn3d btn form-control {{$quiz->true_answer == 4 ? 'btn-success' : 'btn-default'}}">
                    <div>{{$quiz->answer04}}</div>
                </div>
            </div>
        @endif
    </div>

    @if(auth()->user()->role_id ==1)
        <button wire:click="ApproveReject()"
                class="btn btn3 btn-primary form-control">
            {{$quiz->status}}
        </button>
    @endif
</div>
