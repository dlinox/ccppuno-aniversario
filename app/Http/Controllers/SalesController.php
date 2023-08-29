<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaleRequest;
use App\Models\Client;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class SalesController extends Controller
{
    public function store(SaleRequest $request)
    {

        try {
            DB::transaction(function () use ($request) {

                $validatedData = $request->validated();

                $personData = $validatedData['person'];

                $client = Client::create($personData);

                $ticketsData = $validatedData['tickets'];

                $qualityHabil = (int) $ticketsData['qualityHabil'];
                $qualityInHabil = (int) $ticketsData['qualityInHabil'];

                $priceHabil = 20.00;
                $priceInHabil = 50.00;

                $saleData = [
                    'quantity' => $qualityHabil + $qualityInHabil,
                    'total' => ($priceHabil * $qualityHabil) + ($priceInHabil * $qualityInHabil),
                    'date' => new \DateTime(),
                    'status' => 'PENDIENTE',
                    'clientId' =>  $client->id,
                ];

                $sale = Sale::create($saleData);

                if ($qualityHabil > 0) {
                    SaleDetail::create([
                        'quantity' => $qualityHabil,
                        'amount' => $priceHabil * $qualityHabil,
                        'date' => new \DateTime(),
                        'saleId' => $sale->id,
                        'ticketId' => 1,
                    ]);
                }
                if ($qualityInHabil > 0) {
                    SaleDetail::create([
                        'quantity' => $qualityInHabil,
                        'amount' => $priceInHabil * $qualityInHabil,
                        'date' => new \DateTime(),
                        'saleId' => $sale->id,
                        'ticketId' => 2,
                    ]);
                }


                $payData = $validatedData['pay'];

                $pathImgae = null;

                if ($request->hasFile('pay.image')) {
                    $pathImgae = $request->file('pay.image')->store('private_images', 'local');
                }

                Voucher::create([
                    'image' => $pathImgae,
                    'code' => $payData['code'],
                    'date' => $payData['date'],
                    'amount' => $payData['amount'],
                    'saleId' => $sale->id,
                ]);

                return redirect()->back()->with(['success' => 'PagoRegistrado con exito']);
            });
        } catch (\Throwable $th) {

            return redirect()->back()->withErrors('Ocurrió un error inesperado, vuelva a intentarlo en unos minutos.');
        }
    }

    public function success(Request $request)
    {
        return Inertia::render('success', [
            'email' => $request->email,
        ]);
    }
}
