<x-layout>
    <div class="bg-blue-900 h-24 px-4 mb-4 flex justify-cente items-center rounded">
        <x-search />
    </div>

    @if(request()->has('keywords') || request()->has('location'))
        <a href="{{route('jobs.index')}}" class="bg-gray-700 hover:bg-gray-800 text-whit px-4 py-2 rounded mb-4">Reset Search</a>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md-6"> 
        @forelse($jobs as $job)
            <x-job-card :job="$job" />
        @empty
            <p>NO JOBS AVAILABLE</p>
         @endforelse       
    </div>

    <!--pagination links-->
    {{ $jobs->links() }}
</x-layout>
