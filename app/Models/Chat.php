<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Chat extends Model
{
    use SoftDeletes;
    protected $table = 'chats';
    protected $primaryKey = 'id';
    protected $fillable = ['user1','user2','last_used'];
    protected $hidden = [ 'deleted_at', 'updated_at'];
    protected $appends = ['user','last_message'];


    public function messages()
    {
        return $this->hasMany('App\Models\ChatMessages', 'chat_id')->withTrashed();
    }

    public function getLastMessageAttribute()
    {
        return  $this->messages()->orderByDesc('id')->first();
    }


    public function getUserAttribute()
    {
        if($this->user2 != 0 &&  auth('api')->id() != $this->user2){
          $userUser =User::findOrFail($this->user2);
          return $userUser;
          }elseif(auth('api')->id() != $this->user1 && auth('api')->id() == $this->user2){
                $userUser =User::findOrFail($this->user1);
              return $userUser;
          }else{
          return 0;
        }
    }



}
