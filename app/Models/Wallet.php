<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
        'user_id', 'money', 'name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
