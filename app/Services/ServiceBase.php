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
        return $this->model->all();
    }

    public function get(int $id): array
    {
        return $this->model->findOrFail($id);
    }

    public function store(array $dados): Model
    {
        DB::beginTransaction();
        try {
            $created = $this->model->create($dados);
            dd($created);
            DB::commit();
            return $created;
        } catch (Exception $th) {
            dd($th->getMessage());
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
