@props([
    'name',
    'type' => '',
    'class' => '',
])
<button class="!bg-blue-secondary-color text-white px-3 py-1 rounded text-sm " {{$class}}" type="{{$type}}">{{$name}}</button>
