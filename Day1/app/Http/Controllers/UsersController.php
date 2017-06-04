<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index() {
        $users = [
            '0' => [
                'first_name' => 'Jiwei',
                'last_name' => 'Ma',
                'location' => 'AU'
            ],
            '1' => [
                'first_name' => 'Kric',
                'last_name' => 'Zhang',
                'location' => 'AU'
            ]
        ];

        return view('index', compact('users'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        User::create($request->all());
        return 'Succeed!!';
    }
}
