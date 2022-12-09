<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{

    use HasFactory, SoftDeletes, Notifiable;

    public $fillable = ['price', 'title', 'description', 'image', 'user_id', 'count_views', 'type', 'status', 'chat_Count'];

    protected $hidden = ['updated_at', 'deleted_at'];
//    protected $appends = ['id_to_show'];

//    public function meals()
//    {
//        return $this->hasMany(OrderMeal::class, 'order_id', 'id')->withTrashed();
//    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withTrashed();
    }

//    public function category()
//    {
//        return $this->belongsTo(Category::class, 'category_id', 'id')->withTrashed();
//    }


//    public function getIdToShowAttribute()
//    {
//        return '#YM' . $this->id;
//    }


    public function getStatusTextAttribute()
    {
        if ($this->status == '1') {
            return __('cp.confirmed');
        } else if ($this->status == '2') {
            return __('cp.under_preparing');
        } else if ($this->status == '3') {
            return __('cp.ready_for_pickup');
        } else if ($this->status == '4') {
            return __('cp.completed');
        } else if ($this->status == '5') {
            return __('cp.canceled');
        } else {
            return __('cp.error');
        }
    }

    public function getStatusBadgeAttribute()
    {
        if ($this->status == '1') {
            return 'primary';
        } else if ($this->status == '2') {
            return 'info';
        } else if ($this->status == '3') {
            return 'success';
        } else if ($this->status == '4') {
            return 'warning';
        } else if ($this->status == '5') {
            return 'danger';
        } else {
            return 'success';
        }
    }

    public function scopeFilter($query)
    {

        if (request()->has('category_ids')) {
            if (request()->get('category_ids') != null) {
                $category_ids = collect(explode(',', request()->get('category_ids')))
                    ->toArray();
                return Product::whereHas('categories', function ($query) use ($category_ids) {
                    $query->whereIn('categories.id', $category_ids);
                });
            }
        }

        if (request()->has('status')) {
            if (request()->get('status') != null)
                $query->where('status', request()->get('status'));
        }
        if (request()->has('id')) {
            if (request()->get('id') != null)
                $query->where('id', request()->get('id'));
        }

        if (request()->has('price')) {
            if (request()->get('price') != null)
                $query->where(function ($q) {
                    $q->where('price', 'like', '%' . request()->get('price') . '%');
                });
        }

        if (request()->has('title')) {
            if (request()->get('title') != null)
                $query->where(function ($q) {
                    $q->where('title', 'like', '%' . request()->get('title') . '%');
                });
        }

        if (request()->has('description')) {
            if (request()->get('description') != null)
                $query->where(function ($q) {
                    $q->where('description', 'like', '%' . request()->get('description') . '%');
                });
        }

        if (request()->has('type')) {
            if (request()->get('type') != null)
                $query->where('type', request()->get('type'));
        }

    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    public function productComments()
    {
        return $this->hasMany(Comment::class, 'product_id', 'id');
    }

    public function productReports()
    {
        return $this->hasMany(Report::class, 'product_id', 'id');
    }

    public function changePrice()
    {
        return $this->hasMany(ChangePrice::class);
    }
}
