<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Customer;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CustomerService extends ServiceBase
{
    private $userService;
    public function __construct(Customer $model, UserService $userService)
    {
        parent::__construct($model);
        $this->userService = $userService;
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
            throw new Exception($th->getMessage(), 400);
        }

    }
}
