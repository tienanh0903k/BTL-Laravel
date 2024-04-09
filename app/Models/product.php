<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'id',
        'category_id',
        'title',
        'price',
        'discount',
        'thumbnail',
        'description',
        'updated_at',
        'quantity',
        'created_at'
    ];
}
