<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $guraded = ['id', 'created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = ['address', 'city', 'user_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
