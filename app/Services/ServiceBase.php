<?php

namespace App\Services;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

abstract class ServiceBase
{
    private $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {

    }

    public function get(int $id): array
    {
        return $this->model->findOrFail($id);
    }

    public function store(array $dados): array
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
}