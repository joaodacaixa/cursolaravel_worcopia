<header class="bg-blue-900 text-white p-4" x-data="{open:false}">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-semibold">
                <a href="{{url('/')}}"> Worcopia </a>
            </h1>
            <nav class="hidden md:flex items-center space-x-4">
            
            <x-nav-link url="/" :active="request()->is('/')">Home</x-nav-link>
            <x-nav-link url="/jobs" :active="request()->is('jobs')">All Jobs</x-nav-link>
            @auth
             <x-nav-link url="/bookmarks" :active="request()->is('bookmarks')" :mobile="true">Bookmarks</x-nav-link>
             <x-nav-link url="/dashboard" :active="request()->is('jobs')" :mobile="true">Dashboard</x-nav-link>
             <x-logout-button />
             <div class="flex items-center space-s-3">
                <a href="{{route('dashboard')}}">
                    @if(Auth::user()->avatar)
                        <img src="{{asset('storage/'.Auth::user()->avatar)}}"
                         alt="{{Auth::user()->name}}" class="w-10 h-10 rounded-full">
                    @else
                        <img src="{{asset('storage/avatars/default_avatar_image')}}"
                         alt="{{Auth::user()->name}}" class="w-10 h-10 rounded-full">
                    @endif
                </a>
             </div>
              <x-button-link url="/jobs/create" :block="true">Create Job</x-button-link> 
            
             
             @else
             <x-nav-link url="/login" :active="request()->is('jobs')" :mobile="true">Login</x-nav-link>
             <x-nav-link url="/register" :active="request()->is('jobs')" :mobile="true">Register</x-nav-link>
            @endauth
        </nav>

            <button
             @click="open = !open"
             class="md:hidden text-white text-2xl">
             ☰
            </button>
        </div>

     <!-- Mobile -->
    <nav
        x-show="open"
        x-transition
        x-cloak
        class="md:hidden bg-blue-900 text-white mt-5 px-4
       flex flex-col space-y-4"
    >
        <x-nav-link url="/jobs" :mobile="true" @click="open=false">All Jobs</x-nav-link>

        @auth
            <x-nav-link url="/bookmarks" :active="request()->is('bookmarks')" :mobile="true">Bookmarks</x-nav-link>
            <x-nav-link url="/dashboard" :mobile="true" @click="open=false">Dashboard</x-nav-link>

            <x-logout-button class="block w-full text-left py-2 hover:bg-blue-800" @click="open=false" />

            <x-button-link url="/jobs/create" class="block w-full text-center" @click="open=false">
                Create Job
            </x-button-link>
        @else
            <x-nav-link url="/login" :mobile="true" @click="open=false">Login</x-nav-link>
            <x-nav-link url="/register" :mobile="true" @click="open=false">Register</x-nav-link>
        @endauth
    </nav>
</header>
