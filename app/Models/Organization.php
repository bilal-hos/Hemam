<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    /** @use HasFactory<\Database\Factories\AdminFactory> */
    use HasFactory;

    protected $guraded = ['id', 'created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function opportunities()
    {
        return $this->hasMany(Opportunity::class);
    }

    public function certifications()
    {
        return $this->hasMany(Certification::class);
    }

    public function feed_backs()
    {
        return $this->hasMany(FeedBack::class);
    }
}
