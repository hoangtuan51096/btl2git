<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
     protected $fillable = [
        'username', 'email', 'password', 'name'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function wallet()
    {
        return $this->hasOne('App\Models\Wallet', 'user_id');
    }
}
