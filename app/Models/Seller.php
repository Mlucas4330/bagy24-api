<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email'
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function commissions(){
        return $this->hasManyThrough(SaleCommission::class, Sale::class);
    }
}
