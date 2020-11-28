<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

abstract class AuthController extends Controller
{
    /**
     * @return User|\Illuminate\Contracts\Auth\Authenticatable
     */
    public function getUser() {
        return Auth::user();
    }
}
