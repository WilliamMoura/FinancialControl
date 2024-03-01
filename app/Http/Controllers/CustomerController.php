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
            return responseHTTP(201, 'success', $this->service->store($request->all()));
        } catch (Exception $th) {
            return responseHTTP(500, $th->getMessage());
        }
    }

    public function index(Request $request)
    {
        return responseHTTP(200, 'success', $this->service->index());
    }

    public function show(Request $request, int $id)
    {
        return responseHTTP(200, 'success', $this->service->get($id));
    }
}
