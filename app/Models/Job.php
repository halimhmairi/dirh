<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory,HasSlug;
    protected $table = "dirh_jobs";
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */ 
    protected $guarded = [];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

     /**
     * Get the condidates that owns the user.
     *
     */
    public function candidates()
    {
       return $this->hasMany(Candidate::class);
    }
}
