@props([
    'name',
    'href' => '',
    'class' => '',
])
<a class="bg-blue-secondary-color text-white px-3 py-1 rounded text-sm hover:bg-blue-fourth-color transition" {{$class}}" href="{{$href}}">{{$name}}</a>
