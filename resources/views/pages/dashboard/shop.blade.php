<div class="container">
    <div class="row" dir="rtl">
        @foreach($Packages as $Package)
            <div class="col-4">
                <button wire:click="Buy({{$Package->id}})"
                        wire:loading.attr="disabled"
                        class="btn3d btn btn-magick form-control">
                    <b class="package_title">{{$Package->title}}</b>
                    <br/>
                    <i class="fas fa-coins package_icon"></i>
                    <br/>
                    <div class="package_price">{{number_format($Package->price, 0) }} <span> تومان </span></div>
                </button>
            </div>
        @endforeach
    </div>
</div>
