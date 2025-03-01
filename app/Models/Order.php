<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'product_id',
        'quantity',
        'total',
        'status'
    ];

    // An order belongs to a single customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // An order can have multiple products
    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot(['quantity', 'price'])
            ->withTimestamps();
    }
}
