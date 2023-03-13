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
    public function __construct(Customer $customer, UserService $userService)
    {
        parent::__construct($customer);
        $this->userService = $userService;
    }

    public function store(array $dados): Model
    {
        DB::beginTransaction();
        try {
            $userId = $this->userService->store($dados);
            $customer =  Customer::create([
                "name" => $dados['name'],
                "birthdate" => $dados['birthdate'],
                "email" => $dados['email'],
                "user_id" => $userId->id,
            ]);
            DB::commit();
            return $customer;
        } catch (Exception $th) {
            DB::rollBack();
            throw new Exception($th->getMessage(), 400);
        }

    }
}
