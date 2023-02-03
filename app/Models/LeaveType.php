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
}
