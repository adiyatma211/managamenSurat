<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:admin,user',
        ]);

        $defaultPassword = '@User123';

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
            'password' => Hash::make($defaultPassword),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'User berhasil dibuat dengan password default @User123',
            'data' => $user
        ]);
}


    public function edit($id)
    {
        $user = User::find($id);

        return $user
            ? response()->json(['success' => true, 'data' => $user])
            : response()->json(['success' => false, 'message' => 'User tidak ditemukan']);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:admin,user',
        ]);

        $user = User::find($id);

        if ($user) {
            $user->update([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'role' => $validated['role'],
            ]);
            return response()->json(['success' => true, 'message' => 'User berhasil diperbarui']);
        }

        return response()->json(['success' => false, 'message' => 'User tidak ditemukan']);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return response()->json(['success' => true, 'message' => 'User berhasil dihapus']);
        }

        return response()->json(['success' => false, 'message' => 'User tidak ditemukan']);
    }
}
