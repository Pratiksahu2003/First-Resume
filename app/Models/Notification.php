<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['title', 'body', 'read', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getIsReadAttribute()
    {
        return $this->read;
    }

    public function getIsUnreadAttribute()
    {
        return !$this->read;
    }

    public function markAsRead()
    {
        $this->update(['read' => 1]);
    }

    public function markAsUnread()
    {
        $this->update(['read' => 0]);
    }
}
