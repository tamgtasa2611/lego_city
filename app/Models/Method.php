<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Method extends Model
{
    use HasFactory;

    protected $fillable = [
        'method_name'
    ];
    protected $table = 'payment_methods';

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
