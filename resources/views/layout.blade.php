<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE+HYuNSd9QfOcFdKNWcH0xN3sZz1T+M0vC2f3rDjz7X6F2A=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
 @vite('resources/css/app.css')
 <link rel = "stylesheet" href="{{asset('css/style.css')}}">
 <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>{{$title ?? 'Worcopia | Find and List Jobs'}}</title>
</head>
<body class="bg-gray-100">
        <x-header />
    @if(request()->is('/'))
        <x-top/>
        <x-hero/>
    @endif
    <main class="container mx-auto p-4 mt-4">
        @if(session('success'))
            <x-alert-link type="success" timeout="4000" message="{{ session('success') }}"/>
        @endif

        @if(session('error'))
            <-alert-link type="error" message="{{ session('error') }}"/>
        @endif
        {{ $slot }}
    <x-bottom/>
    </main>
    <script src="{{asset('js/script.js')}}"></script>
</body>
</html>
