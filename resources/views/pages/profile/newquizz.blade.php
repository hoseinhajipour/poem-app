<div class="container" dir="rtl">
    <form wire:submit.prevent="submit">

        <select wire:model.defer="category" class="form-select">
            <option value="" selected>انتخاب دسته بندی</option>
            @foreach($categories as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
        </select>
        @error('category') <span class="error">{{ $message }}</span> @enderror

        <select wire:model="type" class="form-select d-none">
            <option value="4answer" selected>چهار جوابی</option>
            <option value="image">عکس</option>
            <option value="music">موزیک</option>
            <option value="video">ویدئو</option>
            <option value="true/false">صیح/غلط</option>
        </select>

        @if($type == "image")
            <input type="file" accept="image/*" wire:model.defer="image">
        @elseif($type == "music")
            <input type="file" wire:model.defer="music">
        @elseif($type == "video")
            <input type="file" wire:model.defer="video">
        @endif

        <textarea wire:model.defer="description"
                  cols="5"
                  placeholder="سوال خود را اینجا بنویسید"
                  class="form-control">
        </textarea>

        <div class="row">
            <div class="col-6">
                <label
                    wire:click="updateTrueAnswer(1)"
                    class="btn3d btn form-control {{$true_answer == 1 ? 'btn-success' : 'btn-default'}}">
                    <input type="text" wire:model.defer="answer01"
                           placeholder="پاسخ اول"
                           class="form-control">
                </label>
            </div>
            <div class="col-6">
                <div class="btn3d btn form-control {{$true_answer == 2 ? 'btn-success' : 'btn-default'}}"
                     wire:click="updateTrueAnswer(2)">
                    <input type="text" wire:model.defer="answer02"
                           placeholder="پاسخ دوم"
                           class="form-control">
                </div>
            </div>
            @if($type !="true/false")
                <div class="col-6">
                    <div wire:click="updateTrueAnswer(3)"
                         class="btn3d btn form-control {{$true_answer == 3 ? 'btn-success' : 'btn-default'}}">
                        <input type="text" wire:model.defer="answer03"
                               placeholder="پاسخ سوم"
                               class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div wire:click="updateTrueAnswer(4)"
                         class="btn3d btn form-control {{$true_answer == 4 ? 'btn-success' : 'btn-default'}}">
                        <input type="text" wire:model.defer="answer04"
                               placeholder="پاسخ چهارم"
                               class="form-control">
                    </div>
                </div>
            @endif
        </div>




        <button type="submit" class="btn3d btn btn-success form-control fixed-bottom">ارسال سوال</button>
    </form>
</div>
