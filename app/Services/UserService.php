<?php
namespace App\Services;

use App\Contracts\UserServiceInterface;
use App\Models\User;
use App\Http\Responses\ApiResponse;

class UserService implements UserServiceInterface
{
    public function getUsers()
    {
        $users = User::all();
        return ApiResponse::formatSuccess(200, null, $users);
    }
}
