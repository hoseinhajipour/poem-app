<div
    x-data="{ show: false }"
    x-show="show"
    x-init="() => { setTimeout(() => show = true, {{$delay}});  }"

    @if($transition)
        x-transition:enter="transform ease-out duration-300"
        x-transition:enter-start="opacity-0 transform {{$startClass}}"
        x-transition:enter-end="opacity-100 transform {{$endClass}}"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform {{$endClass}}"
        x-transition:leave-end="opacity-0 transform {{$startClass}}"
    @endif
>
    {{$slot}}
</div>
