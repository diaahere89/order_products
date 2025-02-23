<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = ['name', 'price', 'stock'];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product')
            ->whereHas('user', function ($query) {
                $query->where('id', auth()->id());
            })
            ->withPivot('quantity')
            ->withTimestamps();
    }
}
