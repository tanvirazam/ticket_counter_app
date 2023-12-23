<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sele extends Model
{
    use HasFactory;
    protected $fillable = ['trip_id', 'user_id', 'set_number', 'date'];

    function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }
}