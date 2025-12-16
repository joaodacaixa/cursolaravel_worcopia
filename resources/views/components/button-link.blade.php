@props([
 'url' => '/',
 'bgClass' => 'bg-yellow-500',
 'hoverClass' => 'hover:bg-yellow-600',
 'textClass' => 'text-black',
 'icon'=>null,
 'block'=>false
 ])

<a href="{{$url}}" class= "{{$bgClass}} {{$hoverClass}} {{$textClass}}
px-4 py-2 rounded transition duration-300 {{$block ? 'block' : ''}}" >
 {{$slot}}
</a>
