<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\User;


class BookmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //get test user

        $testUser=User::where('email','teste@gmail.com')->firstOrFail();

        //get all jobs Ids
        
        $jobsIds=Job::pluck('id')->toArray();

        // randomnly select jobs to bookmark

        $randomJobIds= array_rand($jobsIds,2);

        //atrach the selected jobs and bookmark for test user

        foreach($randomJobIds as $jobId){
            $testUser->bookmarkedJobs()->attach($jobsIds[$jobId]);
        }
    }
}
