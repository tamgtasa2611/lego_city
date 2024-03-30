<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Age extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];
    protected $table = 'ages';
    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
