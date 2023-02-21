<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Leave;
class LeaveType extends Model
{
    use HasFactory , SoftDeletes;

    protected $guarded = [];

    public function leave()
    {
        return $this->hasMany(Leave::class);
    }

    public function leave_counters()
    {
       return $this->hasMany(LeaveCounter::class);
    }

    /**
     * Scope a query to only include users of a given status.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  int  $userId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLeaveTypesAndCounterByUser($query , $userId)
    {
        return $query->whereHas('leave_counters', function ($query) use ($userId){
            return $query->where('user_id', $userId);
          })->get(); 
    }
}
