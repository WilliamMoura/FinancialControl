<?php

namespace App\Services;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

abstract class ServiceBase
{
    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(Request $request)
    {
        return $this->model->get();
    }

    public function get(int $id): Model
    {
        return $this->model->findOrFail($id);
    }

    public function store(array $dados): Model
    {
        DB::beginTransaction();
        try {
            $created = $this->model->create($dados);
            DB::commit();
            return $created;
        } catch (Exception $th) {
            DB::rollBack();
            throw new Exception($th->getMessage(), 500);
        }
    }

    public function update(int $id, array $dados)
    {

    }

    public function delete(int $id)
    {

    }

    public function index(): Collection
    {
        $list = $this->model->all();
        return $list;
    }
}
