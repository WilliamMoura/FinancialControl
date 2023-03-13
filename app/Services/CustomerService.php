<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class CustomerService extends ServiceBase
{
    private $userService;
    public function __construct(Customer $customer, UserService $userService)
    {
        parent::__construct($customer);
        $this->userService = $userService;
    }

    public function store(array $dados)
    {        
        DB::beginTransaction();
        try {
            $userId = $this->userService->store($dados);
            $customer =  Customer::create([
                "name" => $dados['name'],
                "birthdate" => $dados['birthdate'],
                "email" => $dados['email'],
                "user_id" => $userId,
            ]);
            DB::commit();
            return $customer;
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
        
    }
}