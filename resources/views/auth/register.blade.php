<x-layout>
    <div class="bg-white rounded-lg shadow-md w-full md:max-w-xl mx-auto mt-12 p-8 py-12">
        <h2 class="text-4xl text-center font-bold md-4">Register</h2>
        <form method="POST" action="{{route('register.store')}}">
        @csrf
                <x-input-link id="name" name="name"  label="Full name" value=""/>
                <x-input-link id="email" name="email"  label="Email adress" value=""/>
                <x-input-link id="password" name="password" type="password" label="Password" value=""/>
                <x-input-link id="password_confirmation" name="password_confirmation" type="password"  label="Confirm password" value=""/>
        
        <button tupe="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded focus:outline-none" >Register</button>

        <p class="mt text-gray-500">
            Already has an account?
            <a class="text-blue-500" href="{{route('login')}}">Login</a>
        </p>
        </form>
    </div>
</x-layout>