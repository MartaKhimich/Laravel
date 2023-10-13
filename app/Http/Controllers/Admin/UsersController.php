<?php


namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;


class UsersController
{
    public function index(): View
    {
        $users = User::query()->where('id', '!=', Auth::id())->get();
        return \view('admin.users.index', [
            'users' => $users,
        ]);
    }

    public function toggleAdmin(User $user)
    {

        if ($user->id != Auth::id()) {
            $user->is_admin = !$user->is_admin;
            $user->save();

            return redirect()->route('admin.users.index')->with('success', 'Права изменены');
        } else {
            return redirect()->route('admin.users.index')->with('error', 'Нельзя снять админа с себя.');
        }
    }
}
