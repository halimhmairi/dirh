<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
class Calendar extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'start_date',
        'end_date',
        'event_type',
        'user_id',
    ];

    public function user()
    {
       return $this->belongsTo(User::class);
    }
}
