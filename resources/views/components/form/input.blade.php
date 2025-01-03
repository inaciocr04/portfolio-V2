@props([
    'name',
    'name_label' => '',
    'type' => 'text',
    'value' => '',
    'class' => 'form-input',
    ])
<label for="{{$name}}" class="flex flex-col w-full text-gray-700 font-bold ">
    {{$name_label}}
    <input type="{{$type}}" name="{{$name}}" value="{{old($name, $value)}}" class="{{$class}} form-input rounded">
    @error($name)
    <span style="display: block; color: red;">{{$message}}</span>
    @enderror
</label>
