<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Leave;
use Illuminate\Database\Eloquent\Builder;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'status',
        'avatar',
        'password',
        'role_id',
        'department_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the role that owns the user.
     *
     */
    public function role()
    {
       return $this->belongsTo(Role::class);
    }

    /**
     *  Get the department that owns the user.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get the condidates that owns the user.
     *
     */
    public function candidates()
    {
       return $this->hasMany(Candidate::class);
    }

    /**
     * Get the event that owns the user.
     *
     */
    public function Leave()
    {
       return $this->hasMany(Leave::class);
    }

     /**
     * Get the Leave Counter that owns the user.
     *
     */
    public function leaveCounter()
    {
       return $this->hasMany(LeaveCounter::class);
    }

   /**
     * Scope a query to only include users of a given status.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $status
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfStatus($query , $status)
    {
        return $query->where('status',$status);
    }
}
