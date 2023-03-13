<?php

namespace App\Http\Controllers;

use App\Services\CustomerService;
use Exception;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $service;

    public function __construct(CustomerService $customerService)
    {
        $this->service = $customerService;
    }

    public function store(Request $request)
    {
        try {
            responseHTTP(201, 'success', $this->service->store($request->all()));
        } catch (Exception $th) {
            responseHTTP(500, $th->getMessage());
        }
    }
}
