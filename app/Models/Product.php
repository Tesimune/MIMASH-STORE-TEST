<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
      'name', 'cost_price', 'selling_price', 'quantity',
        'discount', 'description', 'uuid', 'image','user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
