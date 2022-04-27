<div class="container">
    @foreach($categories as $category)
        <button wire:click="newtournament({{$category->id}})"
                class="btn btn-primary form-control">
            <img src="{{ Voyager::image($category->icon) }}"
                 class="center" width="32"/>
            <p>{{$category->name}}</p>
        </button>
    @endforeach

    <button wire:click="UpdateCategory()" class="btn btn-warning form-control">انتخاب موضوع دیگر</button>
</div>
