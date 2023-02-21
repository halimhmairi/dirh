<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveCounter extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function getLeaveTypeByUserAndLeaveType($user,$leaveType)
    {
     return  User::find($user->id)->leaveCounter()->where(['leave_type_id'=>$leaveType['leave_type_id']])->first();
    }

    public function leaveType()
    {
      return $this->belongsTo(leaveType::class);
    }
    
}
