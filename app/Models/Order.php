<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'date',
        'status',
        'receiver_name',
        'receiver_phone',
        'receiver_address',
        'admin_id',
        'customer_id',
        'method_id'
    ];
    protected $table = 'orders';

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function method()
    {
        return $this->belongsTo(Method::class);
    }

}
