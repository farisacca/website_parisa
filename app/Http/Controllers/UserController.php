<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name', 'asc')->get();

        return view('admin.user.index', compact('users'));
    }

    public function addEdit($id = null)
    {
        $user = null;

        if ($id) {
            $id = Crypt::decrypt($id);
            $user = User::findOrFail($id);
        }

        return view('admin.user.add-edit', compact('user'));
    }

    public function save(Request $request, $id = null)
    {
        $user = null;

        if ($id) {
            $id = Crypt::decrypt($id);
            $user = User::findOrFail($id);
        } else {
            $user = new User();
        }

        $rules = [
            'name' => 'required|string|max:255',

            'email' => 'required|email|max:255|unique:users,email,'
                . ($id ?? 'NULL') . ',id_user',

            'username' => 'required|string|max:255|unique:users,username,'
                . ($id ?? 'NULL') . ',id_user',

            'role' => 'required|in:admin,operator',
        ];

        if (!$id) {
            $rules['password'] = 'required|min:6|confirmed';
        } else {
            $rules['password'] = 'nullable|min:6|confirmed';
        }

        $messages = [
            'name.required' => 'Nama pengguna wajib diisi.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',

            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah digunakan.',

            'role.required' => 'Role wajib dipilih.',
            'role.in' => 'Role hanya boleh Administrator atau Operator.',

            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ];

        $validated = $request->validate($rules, $messages);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->username = $validated['username'];
        $user->role = $validated['role'];

        if (!empty($validated['password'])) {
            $user->password = $validated['password'];
        }

        $user->save();

        return redirect()
            ->route('admin.user.index')
            ->with(
                'success',
                $id
                    ? 'Data pengguna berhasil diperbarui.'
                    : 'Data pengguna berhasil ditambahkan.'
            );
    }

    public function show($id)
    {
        $id = Crypt::decrypt($id);

        $user = User::findOrFail($id);

        return view('admin.user.show', compact('user'));
    }

    public function destroy($id)
    {
        $id = Crypt::decrypt($id);

        $user = User::findOrFail($id);

        if (Auth::user()->id_user == $user->id_user) {

            return redirect()
                ->route('admin.user.index')
                ->with(
                    'error',
                    'Akun yang sedang digunakan tidak dapat dihapus.'
                );
        }

        $user->delete();

        return redirect()
            ->route('admin.user.index')
            ->with(
                'success',
                'Data pengguna berhasil dihapus.'
            );
    }
}
