<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Contracts\UserServiceInterface;

class UserController extends Controller
{

    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    // Obtener todos los usuarios
    public function getUsers()
    {
        return $this->userService->getUsers();
    }
}
