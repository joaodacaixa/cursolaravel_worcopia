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

        <button @click.stop="open=!open"
            id="hamburger"
            class="text-white md:hidden flex items-center">
                =
           </button>
        </div>

        <!-- Mobile -->
        <nav x-show="open" @click.outside="open=false" id ="mobile-menu"
        class="md:hidden bg-blue-900 text-white mt-5 pb-4 space-y-2">

        <x-nav-link url="/jobs" :active="request()->is('jobs')" :mobile="true">All Jobs</x-nav-link>
        @auth
        <x-nav-link url="/jobs/saved" :active="request()->is('jobs')" :mobile="true">Saved Jobs</x-nav-link>
         <x-nav-link url="/dashboard" :active="request()->is('jobs')" :mobile="true">Dashboard</x-nav-link>
        <x-logout-button />
         <x-button-link url="/jobs/create" :block="true">Create Job</x-button-link> 
        @else
        <x-nav-link url="/login" :active="request()->is('jobs')" :mobile="true">Login</x-nav-link>
        <x-nav-link url="/register" :active="request()->is('jobs')" :mobile="true">Register</x-nav-link>
        @endauth
        <!--    <a href = "{{url('/dashboard')}}" 
                class= "block text-white hover:underline py-2">
                <i class="fa-solid fa-gauge"></i>

                Dashboard 
                </a>

                <a href = "{{url('jobs/create')}}" 
                class= "block px-4 py-2 
                bg-yellow-500 hover:bg-yellow-600 text-black">
                Create Job 
                </a>
        -->
                

                <!--
                <a href="{{url('/jobs/create')}}" class="block px-4 py-2 bg-yellow-500
                hover:bg-yellow-600 text-black">Crate Job
                </a>
                -->
        </nav>
</header>
