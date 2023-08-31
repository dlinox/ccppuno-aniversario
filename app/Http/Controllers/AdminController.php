<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ValidationPayMail;
use App\Models\Client;
use App\Models\ControlTicket;
use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;
use Ramsey\Uuid\Uuid;

class AdminController extends Controller
{

    public function index()
    {
        $sales = Sale::select('id', 'quantity', 'total', 'date', 'clientId', 'status')
            ->where('status', 'PENDIENTE')
            ->with([
                'saleDetails:id,quantity,saleId,amount,date,ticketId',
                'client:id,name,maternalSurname,paternalSurname,documentNumber,phoneNumber,email',
                'vouchers:id,image,code,date,amount,saleId'
            ])
            ->orderBy('id', 'DESC')
            ->get();

        return Inertia::render('Admin/index', ['sales' => $sales]);
    }
    /**PAYMENTS */
    public  function payments()
    {

        $sales = Sale::select('id', 'quantity', 'total', 'date', 'clientId', 'status')
            ->where('status', 'PENDIENTE')
            ->with([
                'saleDetails:id,quantity,saleId,amount,date,ticketId',
                'client:id,name,maternalSurname,paternalSurname,documentNumber,phoneNumber,email',
                'vouchers:id,image,code,date,amount,saleId'
            ])
            ->orderBy('id', 'DESC')
            ->get();

        return Inertia::render('Admin/payments', ['sales' => $sales]);
    }

    /**SETTINGS */
    public  function settings()
    {
        return Inertia::render('Admin/settings');
    }
    public function validatePayment(Request $request)
    {

        try {

            // $this->generatePdfWithQr();

            $sale = Sale::find($request->saleId);
            $sale->status = $request->newStatus;
            $client = Client::find($sale->clientId);

            $ticketsInHabil = SaleDetail::where('saleId', $request->saleId)
                ->where('ticketId', 2)->sum('quantity');

            $ticketsHabil = SaleDetail::where('saleId', $request->saleId)
                ->where('ticketId', 1)->sum('quantity');

            for ($i = 0; $i < $ticketsHabil; $i++) {
                $uuid4 = Uuid::uuid4();

                ControlTicket::create([
                    'token' => $uuid4->toString(),
                    'ip' => request()->ip(),
                    'userAgent' => request()->header('User-Agent'),
                    'userId' => Auth::user()->id,
                    'clientId' => $sale->clientId,
                    'saleId' => $sale->id,
                    'ticketId' => 1,
                ]);
            }

            for ($i = 0; $i < $ticketsInHabil; $i++) {

                $uuid4 = Uuid::uuid4();

                ControlTicket::create([
                    'token' => $uuid4->toString(),
                    'ip' => request()->ip(),
                    'userAgent' => request()->header('User-Agent'),
                    'userId' => Auth::user()->id,
                    'clientId' => $sale->clientId,
                    'saleId' => $sale->id,
                    'ticketId' => 2,
                ]);
            }


            $sale->save();
            $tickets = ControlTicket::select('id', 'token', 'ticketId')->where('saleId', $sale->id)->get();


            Mail::to($client->email)->send(new ValidationPayMail($sale,  $client, $tickets));

            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
    }
}
