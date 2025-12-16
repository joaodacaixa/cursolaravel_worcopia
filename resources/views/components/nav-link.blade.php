@props([
    'url' => '/',
    'active' => false,
    'icon'=>null,
    'mobile'=>null
    ])

@if ($mobile)
    <a href="{{$url}}" class= "block px-4 py-2 hover:bg-blue-700">{{ $slot }}</a>
    @if($icon)
        <i class= "fa fa-{{$icon}} mr-1"></i>
    @endif    
@else
<a href="{{$url}}" class= "text-white hover:underline py-2
{{$active ? 'text-yellow-500 font-bold' : '' }}">
    @if($icon)
      <i class= "fa fa-{{$icon}} mr-1"></i>
    @endif    
    {{$slot}}<!-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger -->
</a>
@endif