<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImage extends Model
{
    use HasFactory, SoftDeletes;

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $table = 'product_images';

    protected $fillable = ['product_id', 'image'];

//    public function user()
//    {
//        return $this->belongsTo(Subadmin::class, 'user_id', 'id');
//    }

//    public function getImageAttribute($image)
//    {
//        return !is_null($image) ? url('uploads/images/subadmins/' . $image) : url('uploads/images/subadmins/d.jpg');
//    }
}
