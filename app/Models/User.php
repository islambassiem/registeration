<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'studentName',
        'email',
        'mobile',
        'nationalID',
        'type',
    ];

    public function attachments(): HasMany
    {
        return $this->hasMany(Attachment::class);
    }
}
