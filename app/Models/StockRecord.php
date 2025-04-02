<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockRecord extends Model
{
    protected $fillable = ['product_id', 'change', 'previous_stock', 'new_stock', 'reason'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
