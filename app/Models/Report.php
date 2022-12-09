<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{

    protected $fillable = ['user_id', 'product_id', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
