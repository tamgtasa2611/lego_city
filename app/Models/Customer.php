<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use HasFactory;
    use Authenticatable;

    //disable created_at updated_at
    public $timestamps = false;

    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'phone_number', 'address'];
    protected $table = 'customers';

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
