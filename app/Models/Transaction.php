<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use App\User;

class Transaction extends Model
{
    use Sortable;
    protected $fillable = [
        'to_wallet_id',
        'from_wallet_id',
        'type',
        'values',
        'desc'
    ];
    public $sortable = ['type', 'created_at'];

    public function fromWallet()
    {
        return $this->belongsTo(Wallet::class, 'from_wallet_id');
    }

    public function toWallet()
    {
        return $this->belongsTo(Wallet::class, 'to_wallet_id');
    }
    public function search($request)
    {
        dd($request);
    }
}
