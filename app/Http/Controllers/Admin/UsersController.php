<?php


namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Contracts\View\View;


class UsersController
{
    public function index(): View
    {
        $users = User::all();
        return \view('admin.users.index', [
            'users' => $users,
        ]);
    }
}
