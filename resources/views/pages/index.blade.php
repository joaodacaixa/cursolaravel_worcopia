<x-layout>
    <h2 class="text-center text-3xl md-4 font-bold border border-gray-300 p-3">Welcome to Worcopia</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md-6"> 
    @forelse($jobs as $job)
        <x-job-card :job="$job" />
    @empty
        <p>NO JOBS AVAILABLE</p>
    @endforelse       
    </div>

    <a href="{{route('jobs.index')}}" class= "block text-xl text-center">
        <i class="fa fa-arrow-alt-circle-right"> ► ► ► Show all jobs</i>
    </a>


</x-layout>