<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChatRecipient extends Pivot
{
    use HasFactory, SoftDeletes;

    protected $table = 'chat_recipients';

    public $timestamps = false;

    protected $casts = [
        'read_at' => 'datetime',
    ];

    public function chatMessage()
    {
        return $this->belongsTo(ChatMessage::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
