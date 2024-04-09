<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'user_id',
        'fullname',
        'email',
        'phone',
        'address',
        'note',
        'order_date',
        'status',
        'total_money'
    ];

    public function Orders()
    {
        return $this->hasMany(order_detail::class, 'id');
    }
}
