<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name'];

    public function getNameAttribute($value)
    {
        return asset('uploads/profile_picture/'. $value);
    }
}
