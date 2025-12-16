<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Applicant extends Model
{
    use HasFactory;

    protected $table='applicants';

    protected $fillable =[
        'full_name',
        'contact_phone',
        'contact_email',
        'message',
        'location',
        'resume_path',
        'job_id',
        'user_id',
       
    ];

    public function job():BelongsTo{
            return $this->belongsTo(Job::class);
    }

     public function user():BelongsTo{
            return $this->belongsTo(User::class);
    }

}