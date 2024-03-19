<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "email",
        "phone",
        "subject",
        "message",
        "ip",
        "user_agent",
        "consent",
        "status"
    ];

    public function scopeUnread($query)
    {
        return $query->whereStatus(StatusEnum::Unread);
    }

    public function getStatusViewAttribute()
    {
        $status = StatusEnum::getStatus($this->status);
        return $status->badge();
    }
}
