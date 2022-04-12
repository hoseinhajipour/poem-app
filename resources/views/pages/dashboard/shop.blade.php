<div class="container">
    <div class="row" dir="rtl">
        @foreach($Packages as $Package)
            <div class="col-4">
                <button wire:click="Buy({{$Package->id}})"
                        class="btn3d btn btn-default form-control">
                    <b>{{$Package->title}}</b>
                    <br/>
                    <i class="fas fa-coins text-black" style="font-size: 60px"></i>
                    <br/>
                    <div>{{number_format($Package->price, 0) }} <span> تومان </span></div>
                </button>
            </div>
        @endforeach
    </div>
</div>
