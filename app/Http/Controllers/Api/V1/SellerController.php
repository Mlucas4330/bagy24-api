<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SellerRequest;
use App\Http\Resources\V1\SellerSalesResource;
use App\Models\Seller;
use App\Http\Resources\V1\SellerResource;
use App\Http\Responses\Response;
use App\Mail\SellerMail;
use Illuminate\Support\Facades\Mail;

class SellerController extends Controller
{
    public function index()
    {
        return SellerResource::collection(Seller::all());
    }

    public function show(string $id)
    {
        return new SellerResource(Seller::findOrfail($id));
    }

    public function sellerSales(string $id)
    {
        return new SellerSalesResource(Seller::findOrfail($id));
    }

    public function resendEmail(string $id)
    {
        $seller = Seller::findOrfail($id);

        $total_sales = $seller->sales->count();
        $total_commission = $seller->commissions->sum('value');

        Mail::to($seller->email)->send(new SellerMail($total_sales, $total_commission));

        return Response::success('Email reenviado com sucesso!', 200);
    }

    public function store(SellerRequest $request)
    {
        $validated = $request->validated();

        Seller::create($validated);

        return Response::success('Vendedor criado com sucesso!', 201, $validated);
    }

    public function update(SellerRequest $request, string $id)
    {
        $validated = $request->validated();

        $seller = Seller::findOrFail($id);

        $seller->fill($request->validated());

        $seller->save();

        return Response::success('Vendedor atualizado com sucesso!', 200, $validated);
    }

    public function destroy(string $id)
    {
        Seller::destroy($id);

        return Response::success('Vendedor foi exclúido com sucesso!', 200);
    }
}
