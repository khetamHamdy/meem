<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fqa extends Model
{
    use HasFactory, SoftDeletes, Translatable;

    public $table='fqa';
    protected $hidden = [ 'updated_at', 'deleted_at'];
    protected $translatedAttributes = ['order', 'title', 'description'];

    public function scopeFilter($query)
    {
        if (request()->has('status')) {
            if (request()->get('status') != null)
                $query->where('status', request()->get('status'));
        }

        if (request()->has('title')) {
            if (request()->get('title') != null)
                $query->where(function ($q) {
                    $q->whereTranslationLike('title', '%' . request()->get('title') . '%');
                });
        }

        if (request()->has('description')) {
            if (request()->get('description') != null)
                $query->where(function ($q) {
                    $q->whereTranslationLike('description', '%' . request()->get('description') . '%');
                });
        }

        if (request()->has('order')) {
            if (request()->get('order') != null)
                $query->where(function ($q) {
                    $q->whereTranslationLike('order', '%' . request()->get('order') . '%');
                });
        }
    }


}
