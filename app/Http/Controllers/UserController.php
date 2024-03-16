<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');

        $data = User::query();

        if ($search) {
            $data->where('name', 'like', '%'.$search.'%');
        }

        $data = $data->latest()->paginate(10);

        return view('users.list', [
            'title' => 'Data Admin',
            'data' => $data,
            'search' => $search
        ]);
    }

    public function create() {
        return view('users.add', [
            'title' => 'Tambah Admin',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:5|max:255|lowercase|unique:users,username|alpha_dash',
            'password' => 'required|min:8|max:255'
        ], [
            'name.required' => 'Nama admin harus diisi.',
            'name.max' => 'Nama admin tidak boleh lebih dari 255 karakter.',
            'username.required' => 'Username harus diisi.',
            'username.min' => 'Username minimal 5 karakter.',
            'username.max' => 'Username maksimal 255 karakter.',
            'username.lowercase' => 'Username harus huruf kecil.',
            'username.unique' => 'Username harus unik.',
            'username.alpha_dash' => 'Username hanya boleh pakai "-" atau "_", tidak boleh pakai spasi.',
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.max' => 'Password minimal 255 karakter.'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ]);

        if ($request->action === 'save_and_add') {
            return redirect()->route('user_create')->with('success', 'Admin <b>'.$request->name.'</b> berhasil ditambahkan.');
        }

        return redirect()->route('user_list')->with('success', 'Admin <b>'.$request->name.'</b> berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'title' => 'Edit Admin',
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ], [
            'name.required' => 'Nama admin harus diisi.',
            'name.max' => 'Nama admin tidak boleh lebih dari 255 karakter.',
        ]);

        $user->name = $request->name;
        
        if ($request->password != ''){
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('user_list')->with('success', 'Admin <b>'.$request->name.'</b> berhasil diupdate.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'Admin <b>'.$user->name.'</b> berhasil dihapus.');
    }
}
