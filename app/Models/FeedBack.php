<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedBack extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at'];

    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
