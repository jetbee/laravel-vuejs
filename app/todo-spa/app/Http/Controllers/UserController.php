<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Utils\HtmlEscapeEx;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return $request->user();
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return $user;
    }

}
