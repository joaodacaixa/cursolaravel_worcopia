<form method="POST" action="{{route('logout')}}">
    @csrf
    <button type="submit" class="text-white">
        Logout
    </button>
</form>
   
