<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    use HasFactory; 
    use SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'resume',
        'note',
        'dirh_job_id',
        'user_id'
    ];

    /**
     * Get the user that owns the condidate.
     *
     */
    public function user()
    {
       return $this->belongsTo(User::class);
    }

    /**
     * Get the job that owns the condidate.
     *
     */
    public function job()
    {
       return $this->belongsTo(Job::class);
    }
}
