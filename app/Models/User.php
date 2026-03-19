<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // protected $fillable = [
    //     'username',
    //     'email',
    //     'password',
    //     'full_name',
    //     'date_of_birth',
    //     'phone_number',
    //     'address',
    //     'zip_code',
    //     'city',
    //     'country',
    //     'avatar',
    //     'bio',
    //     'email_notifications',
    //     'sms_notifications',
    //     'marketing_emails'
    // ];

    protected $fillable = [
    'name',
    'email',
    'password',
    'isAdmin',
    'phone',
    'address',
];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'email_notifications' => 'boolean',
        'sms_notifications' => 'boolean',
        'marketing_emails' => 'boolean',
        'email_verified_at' => 'datetime',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}