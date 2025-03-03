<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    /** @use HasFactory<\Database\Factories\AdminFactory> */
    use HasFactory;

    protected $guraded = ['id', 'created_at', 'updated_at'];
    protected $fillable = ['user_id'];
    protected $hidden = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function opportunities()
    {
        return $this->belongsToMany(Opportunity::class, 'applications')
            ->withTimestamps();
    }
}
