<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Calendar;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
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
    public function calendar()
    {
       return $this->hasMany(Calendar::class);
    }

     /**
     * Get the Leave Counter that owns the user.
     *
     */
    public function leaveCounter()
    {
       return $this->hasMany(LeaveCounter::class);
    }
}
