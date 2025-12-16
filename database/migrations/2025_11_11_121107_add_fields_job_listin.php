<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // clear table             
        // opcoes para os campos ->required(); ->nullable();
        DB::table('job_listing')->truncate();

        Schema::table('job_listing', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id');

            $table-> integer('salary');
            $table-> string('tags')->nullable();
            $table-> enum('job_type', ['Full-time', 'Part_time',
             'Contract', 'Temporary', 'On-Call', 'Internship',
             'Volunteer'])-> default('Full-time');
            $table-> boolean('remote')->defaulçt(false);
            $table-> string('requirements')->nullable();
            $table-> string('benefits')->nullable();
            $table-> string('adress')->nullable();
            $table-> string('city');
            $table-> string('state');
            $table-> string('zipcode')->nullable();
            $table-> string('contact_email');
            $table-> string('contact_phone')->nullable();
            $table-> string('company_name');
            $table-> string('company_description')->nullable();
            $table-> string('company_logo')->nullable();
            $table-> string('company_website')->nullable();
            //add user foreign key constrint
            $table->foreign('user_id')->references('id')->on('users')->
            onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_listing', function (Blueprint $table) {
           
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id']);

            $table->dropColumn([
           'salary',
           'tags',
           'job_type',
           'remote',
           'requirements',
           'benefits',
           'adress',
           'city',
           'state',
           'zipcode',
           'contact_email',
           'contact_phone',
           'company_name',
           'company_description',
           'company_logo',
           'company_website'
            ]);
        });
    }
};
