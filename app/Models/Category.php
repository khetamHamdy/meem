<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes, Translatable;

    protected $translatedAttributes = ['name'];


    protected $hidden = ['translations', 'created_at', 'updated_at', 'deleted_at',  'user_id','parent_id', 'status' ,'pivot'];

//    public function user(){
//        return $this->belongsTo(Subadmin::class,'user_id','id')->withTrashed();
//    }

//    public function meals(){
//       return $this->hasMany(Meal::class,'category_id','id');
//    }
//    public function products()
//    {
//        return $this->hasMany(Product::class);
//    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_categories');
    }

//    public function product_category()
//    {
//        return $this->hasMany(ProductCategory::class, 'category_id', 'id');
//    }

    public function getImageAttribute($value)
    {
        if (!is_null($value) && isset($value) && $value != '') {
            return url('uploads/images/categories/' . $value);
        } else {
            return url('uploads/images/d.jpeg');
        }
    }

    public function scopeFilter($query)
    {
        if (request()->has('status')) {
            if (request()->get('status') != null)
                $query->where('status', request()->get('status'));
        }

        if (request()->has('user_id')) {
            if (request()->get('user_id') != null)
                $query->where('user_id', request()->get('user_id'));
        }


        if (request()->has('name')) {
            if (request()->get('name') != null)
                $query->where(function ($q) {
                    $q->whereTranslationLike('name', '%' . request()->get('name') . '%');
                });
        }
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id')->withDefault([
            'name' => 'No Parent'
        ]);
    }

}
