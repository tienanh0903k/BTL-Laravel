<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class purchaseorder_details extends Model
{
    use HasFactory;
    protected $table = 'purchaseorder_details';
    protected $fillable = [
        'id',
        'purchase_order_id',
        'product_id',
        'price',
        'quantity',
        'total_money',
    ];
    public $timestamps = false;

    public function purchaseorder() : HasMany {
        return $this->hasMany(purchaseorders::class,'purchase_order_id', 'id');
    }

}
