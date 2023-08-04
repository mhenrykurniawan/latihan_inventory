<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Manajemen User',
            'user' => User::all()
        ];
        return view('user.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Manajemen User',

        ];
        return view('user.tambah', $data);
    }

    public function store(Request $request)
    {
        $file = $request->file('foto');
        $path = $file->store('public/profil');

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'foto' => $path,
        ];

        User::create($data);

        return redirect()->route('user.index')->with('success', 'Data berhasil disimpan!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Manajemen User',
            'user' => User::where('id', $id)->get()
        ];

        return view('user.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->first();

        if ($request->foto == null) {
            $path = $user->foto;
        } else {
            $file = $request->file('foto');
            $path = $file->store('public/profil');

            Storage::delete($user->foto);
        }

        $password = $request->password;
        if ($password == null) {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $user->password,
                'role' => $request->role,
                'foto' => $path,
            ];

            User::where('id', $id)->update($data);
        } else {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'foto' => $path,
            ];

            User::where('id', $id)->update($data);
        }

        return redirect()->route('user.index')->with('success', 'Data berhasil disimpan!');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('user.index')->with('success', 'Data berhasil disimpan!');
    }
}
