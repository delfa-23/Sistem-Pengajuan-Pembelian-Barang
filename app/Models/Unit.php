<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unit extends Model
{
    use HasFactory;

    protected $table = 'units';
    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class, 'unit_id', 'id');
    }
}
