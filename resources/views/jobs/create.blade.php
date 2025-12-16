
<x-layout>

<div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:mas-x-3xl" >
    <h2 class="text-4xl text-center font-bold mb-4">
        Create Job Listing
    </h2>
    <form method="POST" action="{{route('jobs.store')}}" enctype="multipart/form-data">
        @csrf
        <h2 class="text-2xl font-bold mb-6 
        text-center text-gray-500" >Job Info</h2>

        <x-input-link id="title" name="title"  label="Job Title" value=""/>
       
        <x-text-link id="description" name="description" label="Job Description"/>    

        <x-input-link id="salary" name="salary" label="Job Salary" value="" type="number" />

        <x-text-link id="requirements" name="requirements" label="Job Requirement"/>

        <x-text-link id="benefits" name="benefits" label="Job Benefits"/>

        <x-input-link id="tags" name="tags" label="Tags (comma-separated)" value=""/>

        <x-select-link id="job_type" name="job_type" 
        label="Job Type" value="{{old('job_type')}}"
        :options="['Full-time'=>'Full-time',
                'Full-time'=>'Full-time', 
                'Contract'=>'Contract',
                'Temporary'=>'Temporary',
                'On-Call'=>'On-Call',
                'Internship'=>'Internship',
                'Volunteer'=>'Volunteer']"
        />
        <x-select-link id="remote" name="remote" label="Remote" value="{{old('remote')}}"
        :options="['1'=>'Remote',
                    '0'=> 'Not Remote']" />

        <x-input-link id="adress" name="adress"  label="Adress" type="text" value=''/>

        <x-input-link id="city" name="city"  label="City" type="text" value=''/>

        <x-input-link id="state" name="state" label="State" type="text" value=''/>

        <x-input-link id="zipcode" name="zipcode" label="Zip Code" type="number" value=''/>

        <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
            Company Info
        </h2>

        <x-input-link id="company_name" name="company_name" label="Company Name" type="text" value=''/>
        
        <x-text-link id="company_description" name="company_description" label="Company Description" value=''/>

        <x-input-link id="company_website" name="company_website" label="Company Site" type="url" value=''/>
        
        <x-input-link id="contact_phone" name="contact_phone" label="Contact Phone" type="text" value=''/>

        <x-input-link  id="contact_email" name="contact_email" label="contact_email" type='text' value='' />
       
        <x-image-link id="company_logo" name="company_logo" label="Company Logo"/>

        <button
        type="submit" class="w-full bg-green-500 
        hover:bg-green-600 text-white px-4 py-2 rouded
        focus:outline-none" >Save</button>


    </form>
</div>

</x-layout>