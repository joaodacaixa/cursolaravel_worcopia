<x-layout>
    <section class="flex flex-col md:flex-row gap-4">
    <!--profile-->
        <div class="bg-white p-8 rounded-lg shadow-md w-full">
            <h3 class="text-3xl text-center font-bold mb-4">Profile</h3>
            
            @if($user->avatar)
                <div class="mt-2 flex justify-center">
                    <img src="{{asset('storage/'.$user->avatar)}}" alt="" 
                    class="w-32 h-32 object-cover rounded-full">
                </div>
            @endif

            
            <form method="POST" action="{{route('profile.update')}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <x-input-link id="name" name="name" label="Name" value="{{$user->name}}"/>
                <x-input-link id="email" name="email" label="Email" type="email" value="{{$user->email}}"/>
                
                <x-image-link id="avatar" name="avatar" label="Upload Avatar"/>

                
                <button type="submit" 
                class="w-full bg-green-500 hover: bg-green-600 text-white px-4 
                py-2 border rounded focus:outline-none">Save</button>
            </form>
    </div>
    <!-- Jobs-->
    <div class="bg-white p-8 rounded-lg shadow-md w-full">
        <h3 class="text-3xl text-center font-bold mb-4">
            Profile Info
        </h3>
        @forelse($jobs as $job)
        <div class="flex justify-between items-center
            border-b-2 border-gray-200 py-2">
            <h3 class="text-xl font-semibold">{{ $job->title }}           </h3>
            <p class="text-gray-700">{{ $job->job_type }}</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{route('jobs.edit', $job->id)}}"  class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm">Edit</a>
            <form method="POST" action="{{route('jobs.destroy',$job->id)}}?from=dashboard"
                    onsubmit="return confirm('Are you sure you want to DELETE this record?') ">
                    @csrf
                    @method('DELETE')    
                    <button
                        type="submit"
                        class="px-4 py-2 bg-red-500 hover:bg-red-600
                        text-white rounded text-sm">Delete</button>
                    </form>
        </div>
        <div class="mt-4 bg-gray-100">
            <h4 class="text-lg font-semibold md-2">Applicants</h4>
            @forelse ($job->applicants as $applicant)
            <div class="py-2">
                <p class="text-gray-800">
                    <strong>Name: </strong>{{ $applicant->full_name }}
                </p>
                <p class="text-gray-800">
                    <strong>Phone: </strong>{{ $applicant->contact_phone }}
                </p>
                <p class="text-gray-800">
                    <strong>Email: </strong>{{ $applicant->contact_email }}
                </p>
                <p class="text-gray-800">
                    <strong>Menssage: </strong>{{ $applicant->message }}
                </p>
                <p class="text-gray-800">
                    <strong>Location: </strong>{{ $applicant->location }}
                </p>
                <p class="text-gray-800 my-1">
                    <a href="{{asset('storage/'.$applicant->resume_path)}}" class="text-blue-500"
                    download>Download Resume</a>
                </p>

                <form method="POST" action="{{route('applicant.destroy',$applicant->id)}}" onsubmit="return confirm('Are you sure you want to delete this record?')">
                @csrf
                @method('DELETE')
                <button class="text-red-500 hover:text-red-700 text-sm"> Delete </button>
                </form>
            </div>
                
            @empty
                <p class="text-gray-700">No Applications for this job</p>
            @endforelse
        </div>

        @empty
        <p class="text-gray-700">You have no job listings.</p>
        @endforelse
    </div>
</section>

</x-layout>