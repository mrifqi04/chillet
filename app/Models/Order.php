<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'address',
        'city',
        'province',
        'postal',
        'telephone',
        'payment_method',
        'information',
        'status',
        'total',
        'payment'
    ];

    public function User()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function OrderItem()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }
}
