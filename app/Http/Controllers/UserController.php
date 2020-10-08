<?php

namespace App\Http\Controllers;

use App\Service\GetUserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function get(Request $request, GetUserService $getUserService)
    {
        $word = $request->input('word');

        $users = $getUserService($word);

        return view('user.get')->with([
            'word'  => $word,
            'users' => $users,
        ]);
    }
}
