<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{

    public function index()
    {

        return Inertia::render('Admin/index');
    }
    /**PAYMENTS */
    public  function payments()
    {
        return Inertia::render('Admin/payments');
    }

    /**SETTINGS */
    public  function settings()
    {
        return Inertia::render('Admin/settings');
    }
}
