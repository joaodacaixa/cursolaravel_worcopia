@props(['id', 'label'=>null,'type'=>'text', 'name', 'value'=>'', 'required'=>false])

<div class="mb-4">
    @if($label)
    <label>{{$label}}</label>
    @endif
    <input class="w-full px-4 py-2 border rounded
            focus:outline-none @error($name)border-red-500 @enderror" 
            type="{{$type}}" name="{{$name}}" 
            value="{{old($name, $value)}}" {{$required ? 'required' : ''}} />
    @error($name)
    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
    @enderror       
</div>




