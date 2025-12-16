
<x-layout>

<div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:mas-x-3xl" >
    <h2 class="text-4xl text-center font-bold mb-4">
        Edit Job Listing
    </h2>
    <form method="POST" action="{{route('jobs.update', $job->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h2 class="text-2xl font-bold mb-6 
        text-center text-gray-500" >Job Info</h2>

        <x-input-link id="title" name="title"  label="Job Title" :value="old('title',$job->title)"/>
       
        <x-text-link id="description" name="description" label="Job Description" :value="old('description',$job->description)"/>    

        <x-input-link id="salary" name="salary" label="Job Salary" type="number" :value="old('salary',$job->salary)" />

        <x-text-link id="requirements" name="requirements" label="Job Requirement" :value="old('requirements',$job->requirements)"/>

        <x-text-link id="benefits" name="benefits" label="Job Benefits" :value="old('benefits',$job->benefits)"/>

        <x-input-link id="tags" name="tags" label="Tags (comma-separated)" :value="old('tags',$job->tags)"/>

        <x-select-link id="job_type" name="job_type" 
        label="Job Type" :value="old('job_type',$job->job_type)"
        :options="['Full-time'=>'Full-time',
                'Full-time'=>'Full-time', 
                'Contract'=>'Contract',
                'Temporary'=>'Temporary',
                'On-Call'=>'On-Call',
                'Internship'=>'Internship',
                'Volunteer'=>'Volunteer']"
        />

        <x-select-link id="remote" name="remote" label="Remote" :value="old('remote',$job->remote)"
        :options="['1'=>'Remote',
                    '0'=> 'Not Remote']" />

        <x-input-link id="adress" name="adress"  label="Adress" type="text" :value="old('adress',$job->adress)"/>

        <x-input-link id="city" name="city"  label="City" type="text" :value="old('city',$job->city)"/>

        <x-input-link id="state" name="state" label="State" type="text" :value="old('state',$job->state)"/>

        <x-input-link id="zipcode" name="zipcode" label="Zip Code" type="number" :value="old('zipcode',$job->tags)"/>

        <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
            Company Info
        </h2>

        <x-input-link id="company_name" name="company_name" label="Company Name" type="text" :value="old('company_name',$job->company_name)"/>
        
        <x-text-link id="company_description" name="company_description" label="Company Description" :value="old('company_description',$job->company_description)"/>

        <x-input-link id="company_website" name="company_website" label="Company Site" type="url" :value="old('company_website',$job->company_website)"/>
        
        <x-input-link id="contact_phone" name="contact_phone" label="Contact Phone" type="text" :value="old('contact_phone',$job->contact_phone)"/>

        <x-input-link  id="contact_email" name="contact_email" label="contact_email" type='text' :value="old('contact_email',$job->contact_email)"/>
       
        <x-image-link id="company_logo" name="company_logo" label="Company Logo" />

        <button
        type="submit" class="w-full bg-green-500 
        hover:bg-green-600 text-white px-4 py-2 rouded
        focus:outline-none" >Save</button>


    </form>
</div>

</x-layout>