<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockReport extends Model
{
    protected $fillable = ['product_id', 'previous_stock', 'updated_stock', 'change'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

