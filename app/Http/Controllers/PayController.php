<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PayController extends Controller
{
    public function index()
    {

        $tickets = Ticket::all();
        return Inertia::render('index', ['tickets' => $tickets]);
    }
}
