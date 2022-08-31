<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table = "dirh_jobs";
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','jobsummary','description','tags','status','publish_at'];

     /**
     * Get the condidates that owns the user.
     *
     */
    public function candidates()
    {
       return $this->hasMany(Candidate::class);
    }
}
