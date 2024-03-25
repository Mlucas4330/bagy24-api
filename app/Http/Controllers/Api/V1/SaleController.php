<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaleRequest;
use App\Http\Resources\V1\SaleResource;
use App\Http\Responses\Response;
use App\Models\Sale;
use App\Models\SaleCommission;

class SaleController extends Controller
{
    public function index()
    {
        return SaleResource::collection(Sale::all());
    }

    public function store(SaleRequest $request)
    {
        $validated = $request->validated();

        $sale = Sale::create($validated);

        return Response::success('Venda criada com sucesso!', 201, $validated);
    }
}
