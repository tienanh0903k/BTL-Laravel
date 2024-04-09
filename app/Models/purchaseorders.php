<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\supplier;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class purchaseorders extends Model
{
    use HasFactory;
    protected $table = 'purchaseorders';
    protected $fillable = [
        'id',
        'supplier_id',
        'order_date',
        'status',
        'total_money',
    ];

    public $timestamps = false;

    public function supplier() : BelongsTo {
        return $this->belongsTo(supplier::class,'supplier_id', 'id');
    }
}
