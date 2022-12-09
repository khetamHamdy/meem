<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class ChatMessage extends Model
{
    use HasFactory, SoftDeletes, Notifiable;


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function recipients()
    {
        return $this->belongsToMany(User::class, 'chat_recipients')
            ->withPivot([
                'read_at', 'deleted_at',
            ]);
    }
}
