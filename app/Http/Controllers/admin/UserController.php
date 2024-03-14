<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    //
    public function index(): View
    {
        $users = User::all();
        return view('admin.user.index', [
            'users' => $users,

        ]);
    }

    public function edit(User $user): View
    {
        return view('admin.user.edit', [
            'user' => $user
        ]);
    }

    public function update(User $user, Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|min:3|max:255|string',
            'email' => 'required|email',
        ]);
        $user->update($data);
        return redirect()->route('admin.user.index');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return back();
    }

    public function contact(User $user): View
    {
        return view('admin.user.contact', [
            'user' => $user,
        ]);
    }
}
