<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{

    public function index()
    {
        $sales = Sale::select('id', 'quantity', 'total', 'date', 'clientId', 'status')
            ->where('status', 'PENDIENTE')
            ->with(['saleDetails:id,quantity,saleId,amount,date,ticketId', 
                    'client:id,name,maternalSurname,paternalSurname,documentNumber,phoneNumber,email',
                    'vouchers:id,image,code,date,amount,saleId'])
            ->orderBy('id', 'DESC')
            ->get();

        return Inertia::render('Admin/index', ['sales' => $sales]);
    }
    /**PAYMENTS */
    public  function payments()
    {

        $sales = Sale::select('id', 'quantity', 'total', 'date', 'clientId', 'status')
            ->where('status', 'PENDIENTE')
            ->with(['saleDetails:id,quantity,saleId,amount,date,ticketId', 
                    'client:id,name,maternalSurname,paternalSurname,documentNumber,phoneNumber,email',
                    'vouchers:id,image,code,date,amount,saleId'])
            ->orderBy('id', 'DESC')
            ->get();

        return Inertia::render('Admin/payments', ['sales' => $sales]);
    }

    /**SETTINGS */
    public  function settings()
    {
        return Inertia::render('Admin/settings');
    }
    public function validatePayment(Request $request){

        try {
            $sale = Sale::find($request->saleId);
            $sale->status = $request->newStatus;
            $sale->save();       
            return redirect()->back()->with(['success' => 'Credenciales inválidas']);
            
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Ocurrio un error inesperado, vuelva a intentar en unos minutos');
            
        }

    }

}
