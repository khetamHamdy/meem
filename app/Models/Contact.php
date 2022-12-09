<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'email','message','mobile'];
    protected $hidden = ['updated_at'];


    public function scopeFilter($query)
    {
        if (request()->has('name') ) {
            if (request()->get('name') != null)
                $query->where('name', 'like', '%' . request()->get('name') . '%');
        }

        if (request()->has('email') ) {
            if (request()->get('email') != null)
                $query->where('email', 'like', '%' . request()->get('email') . '%');
        }

        if (request()->has('phone') ) {
            if (request()->get('phone') != null)
                $query->where('phone', 'like', '%' . request()->get('phone') . '%');
        }


        if (request()->has('message') ) {
            if (request()->get('message') != null)
                $query->where('message', 'like', '%' . request()->get('message') . '%');
        }

        if (request()->has('is_read')) {
            if (request()->get('is_read') != null)
                $query->where('is_read', request()->get('is_read'));
        }


    }
}
