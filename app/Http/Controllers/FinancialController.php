<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinancialController extends Controller
{
    public function __construct(){}

    public function store(Request $request)
    {
        dd($request->all());
    }
}
