<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlTicket extends Model
{
    use HasFactory;

    protected $table = 'control_tickets';

    protected $fillable = [
        'token',
        'usedIn',
        'isUsed',
        'ip',
        'userAgent',
        'userId',
        'clientId',
        'saleId',
        'ticketId'
    ];

    protected $casts = [
        'isUsed' => 'boolean',
    ];



    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'clientId');
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class, 'saleId');
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticketId');
    }
}
