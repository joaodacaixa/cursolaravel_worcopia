
@props ([
 'message1' =>'Looking to hire?',
 'message2'=>'Post your job listing naow and find the perfect candidate.' ])
<section class="container mx-auto my-6">
    <div class="bg-blue-800 text-white rounded p-4 flex items-center
    justify-between flex-col md:flex-row gap-4">
    <div>
        <h2 class="text-xl font-semi-bold">
            {{$message1}}
        </h2>
        <p class="text-gray-200 text-lg mt-2">
           {{$message2}}
        </p>
    </div>
    
    <x-button-link url="/jobs/create" :block="true">Create Job</x-button-link> 

    
    </div>
</section>