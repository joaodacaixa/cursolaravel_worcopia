<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Load jobListing fromd the file
        $jobListing=include database_path('seeders/data/job_listing.php');

        //get test user id

        $testUserId=User::where('email','teste@gmail.com')->value('id');

        //get all other user ids from user model

        $userIds=User::where('email','!=','test@gmail.com')->pluck('id')->toArray();
        
        foreach ($jobListing as $index => &$listing){
            if($index < 2) {
                //assign the first 2 listingns to the test user
                $listing['user_id']=$testUserId;
            } else {
            //assign user id to listing
            $listing['user_id']= $userIds[array_rand($userIds)];

            
            
            }
            //add timestamp
            $listing['created_at']=now();
            $listing['updated_at']=now();
        }

        //insert job listing

        DB::table('job_listing')->insert($jobListing);
        echo 'Job(s) from file created sucessfully';

    }
}
