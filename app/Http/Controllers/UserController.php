<?php

namespace App\Http\Controllers;

use App\BinaryTree;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function test()
    {
        $tree = BinaryTree::build(User::all()->map(fn($user) => $user->toArray()));
        return view('welcome', [
            'users' => $tree->toArray(),
            'totalLeft' => $tree->totalLeft(),
            'totalRight' => $tree->totalRight()
        ]);
    }
}
