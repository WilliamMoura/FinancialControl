<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserService extends ServiceBase
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function store(array $dados): Model
    {
        $user = User::create([
            'name' => $dados['name'],
            'email' => $dados['email'],
            'password' => Hash::make($dados['password'])
        ]);
        return $user;
    }
}
