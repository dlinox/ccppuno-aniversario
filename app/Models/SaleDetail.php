<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'amount',
        'date',
        'saleId',
        'ticketId',
    ];

    protected $casts = [
        'quantity' => 'integer',
        'amount' => 'decimal:2',
        'date' => 'datetime',
    ];

    // Relación con el modelo Sale
    public function sale()
    {
        return $this->belongsTo(Sale::class, 'saleId');
    }

    // Relación con el modelo Ticket
    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticketId');
    }
    
}
