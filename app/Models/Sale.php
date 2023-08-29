<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'total',
        'date',
        'status',
        'clientId',
    ];


    protected $casts = [
        'quantity' => 'integer',
        'total' => 'decimal:2',
        'clientId' => 'integer',
    ];

    // Definir la relación con el modelo Client
    public function client()
    {
        return $this->belongsTo(Client::class, 'clientId');
    }

    public function saleDetails()
    { 
        return $this->hasMany(SaleDetail::class, 'saleId');
    }

    public function vouchers()
    {
      
        return $this->hasMany(Voucher::class, 'saleId');
    }
}
