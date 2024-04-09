<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Authenticatable
{
    use HasFactory;
    protected $table = 'user';
    protected $fillable = [
        'fullname',
        'email',
        'phone_number',
        'address',
        'password',
        'role_id',
        'created_at',
        'updated_at',
        'deleted'
    ];

    public function isAdmin()
    {
        return $this->role_id === 2;
    }
}
