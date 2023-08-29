<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'code',
        'date',
        'amount',
        'saleId',
    ];

    protected $casts = [
        'date' => 'date',
        'amount' => 'decimal:2',
    ];

    // Relación con el modelo Sale
    public function sale()
    {
        return $this->belongsTo(Sale::class, 'saleId');
    }
}
