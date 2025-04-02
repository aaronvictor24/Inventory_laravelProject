<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Define which fields can be mass-assigned
    protected $fillable = [
        'name',
        'quantity',
        'low_stock_threshold',
    ];

    // Method to check if product is low in stock
    public function isLowStock()
    {
        return $this->quantity <= $this->low_stock_threshold;
    }

    public function stockReports()
    {
        return $this->hasMany(StockReport::class);
    }

}
