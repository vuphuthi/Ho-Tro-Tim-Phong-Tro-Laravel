<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    use HasFactory;
    const STATUS_SUCCESS = 2;

    protected $guarded = [''];
    protected $table = 'payment_history';

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
