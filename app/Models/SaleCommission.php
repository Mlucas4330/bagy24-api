<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleCommission extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_id',
        'commission_percentage',
        'value',
        'commission_date'
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
