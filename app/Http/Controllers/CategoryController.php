<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CustonRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $service;
    public function __construct(CategoryService $categoryService)
    {
        $this->service = $categoryService;
    }
    public function show(int $id)
    {
        return $this->service->get($id);
    }

    public function store(CategoryRequest $request)
    {
        try {
            return response()->json($this->service->store($request->all()), 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function index(Request $request)
    {
        return responseHTTP(200, 'success',$this->service->all($request));
    }
}
