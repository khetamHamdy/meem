<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Auth;

class ChatMessages extends Model
{
    use SoftDeletes;
    protected $table = 'chat_messages';
    protected $primaryKey = 'id';
    protected $fillable = ['chat_id','sender_id','text','type','ip_address','seen','delete'];
    protected $hidden = ['ip_address', 'deleted_at', 'updated_at'];

    public function chat()
    {
        return $this->belongsTo('App\Models\Chat','chat_id')->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','sender_id')->withTrashed();
    }
  
    public function getTextAttribute($value)
    {
        if($this->type == 1){
            return $value;
        }
        return url('uploads/chats/'.$value);
    }

}
