@props(['job'])

     <div class="bg-white shadow-md rounded-lg p-5 flex flex-col justify-between h-full">

        <div class="flex items-center gap-4 mb-4">
            @if($job->company_logo)
            <img 
                src="/storage/{{$job->company_logo}}" alt= "{{$job->company_name}}" class="w-14" 
            />
            @endif
            <div>
                <h2 class="text-lg font-semibold">{{ $job->title }}</h2>
                <p class="text-sm text-gray-500">{{ $job->job_type }}</p>
            </div>
        </div>    
        <p class="text-gray-700 text-sm mb-3">{{ $job->description }}</p>
        <ul class="text-sm bg-gray-50 p-4 rounded-lg mb-4 flex-grow">
            <li class="mb-2"><strong>Salary: </strong>{{ $job->salary }} </li>
            <li class="mb-2"><strong>Location: : </strong>{{ $job->city }}, {{ $job->state}}
                
                @if ($job->remote)
                    <span class="text-xs bg-green-500 text-white rounded-full px-2 py-1 ml-2">
                    Remote
                    </span>
                @else
                    <span class="text-xs bg-red-500 text-white rounded-full px-2 py-1 ml-2">
                    Not Remote
                    </span>
                @endif    
                
            </li>
            @if($job->tags)
            <li class="mb-2"><strong>Tags: </strong>{{ucwords( str_replace(',',', ',$job->tags)) }}</li>
            @endif
        </ul>            
        <a  href="{{route('jobs.show', $job->id)}}" class="block w-full text-center px-5 py-2 shadow-sm
                rounded-border text-base font-medium text-indigo-700
                bg-indigo-100 hover:bg-indigo-200">Details
        </a>
    </div>
