<?php

namespace App\Http\Controllers;

use App\Http\Requests\FinancialRequest;
use App\Services\FinancialService;
use App\Services\ServiceBase;
use Illuminate\Http\Request;

class FinancialController extends Controller
{
    public function __construct(private FinancialService $service ){}

    public function store(FinancialRequest $request)
    {
        return responseHTTP(200, 'success', $this->service->store($request->all()));
    }
}
