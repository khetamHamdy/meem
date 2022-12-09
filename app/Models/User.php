<?php

namespace App\Models;


use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, SoftDeletes;

    protected $hidden = [
        'password', 'fcm_token', 'updated_at', 'deleted_at', 'created_at', 'email_verified_at', 'remember_token'];


    protected $fillable = ['name', 'image'];

    //   protected $appends = [''];

    public function getImageAttribute($value)
    {
        if (!is_null($value) && isset($value) && $value != '') {
            return url('uploads/images/users/' . $value);
        } else {
            return url('uploads/images/users/defualtUser.png');
        }
    }


//    public function cuisines(){
//        return $this->hasMany(UserCuisines::class);
//    }
//
//    public function business_hours(){
//        return $this->hasMany(RestaurantBusinesHour::class);
//    }
//
//    public function user_orders(){
//        return $this->hasMany(Order::class,'user_id','id')->withTrashed();
//    }
//
//    public function provider_orders(){
//        return $this->hasMany(Order::class,'provider_id','id')->withTrashed();
//    }


    public function images()
    {
        return $this->hasMany(UserImage::class);
    }

    public function blocks()
    {
        return $this->hasMany(Block::class);
    }
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function notification()
    {
        return $this->hasMany(NotificationMessage::class);
    }


    public function scopeFilter($query)
    {
        if (request()->has('email')) {
            if (request()->get('email') != null)
                $query->where('email', 'like', '%' . request()->get('email') . '%');
        }
        if (request()->has('name')) {
            if (request()->get('name') != null)
                $query->whereTranslationLike('name', '%' . request()->get('name') . '%');
        }
        if (request()->has('user_name')) {
            if (request()->get('user_name') != null)
                $query->where('user_name', 'like', '%' . request()->get('user_name') . '%');
        }

        if (request()->has('mobile')) {
            if (request()->get('mobile') != null)
                $query->where('mobile', 'like', '%' . request()->get('mobile') . '%');
        }
        if (request()->has('status')) {
            if (request()->get('status') != null)
                $query->where('status', request()->get('status'));
        }
        if (request()->has('id')) {
            if (request()->get('id') != null)
                $query->where('id', request()->get('id'));
        }
    }


    public function chatMessages()
    {
        return $this->hasMany(ChatMessage::class );
    }

    public function receivedMessages()
    {
        return $this->belongsToMany(ChatMessage::class, 'chat_recipients')
            ->withPivot([
                'read_at', 'deleted_at',
            ]);
    }
}
