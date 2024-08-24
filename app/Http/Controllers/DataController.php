<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class DataController extends Controller
{
    public function dashboard()
    {
        return view('dashboard', ['title' => 'dashboard']);
    }

    public function getAllMahasiswa()
    {
        $data = User::where('role', '!=', 'Admin')->get();
        return view('admin.getAllMahasiswa', [
            'title' => 'getAllMahasiswa',
            'data' => $data
        ]);
    }

    public function getMahasiswa(User $user)
    {
        return view('admin.getMahasiswa', ['title' => 'getAllMahasiswa', ['user' => $user]]);
    }

    public function createMahasiswa()
    {
        return view('admin.createMahasiswa', ['title' => 'getAllMahasiswa']);
    }

    public function storeMahasiswa(Request $request)
    {
        if (Gate::allows('admin')) {
            $user = new User();
            $pendaftaran = new Pendaftaran();

            $data = $request->all();
            $rules = [
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                'nama' => 'required',
            ];
            $messages = [
                'required' => ':attribute tidak boleh kosong.',
                'unique' => ':attribute sudah tersedia.',
                'email' => ':attribute tidak valid.',
            ];
            $validated = Validator::make($data, $rules, $messages)->validate();
            $validated['role'] = 'Mahasiswa';

            $storeUser = $user->create($validated);
            $pendaftaran->create(['user_id' => $storeUser->id]);

            return redirect()->route('dashboard')->with('success', 'Data berhasil ditambahkan.');
        }
        abort(404);
    }

    public function editMahasiswa(User $user)
    {
        return view('admin.editMahasiswa', ['title' => 'getAllMahasiswa']);
    }

    public function updateMahasiswa(Request $request, User $user)
    {

    }

    public function deleteMahasiswa(User $user)
    {

    }

    public function getAllPendaftaran()
    {
        return view('admin.getAllPendaftaran', ['title' => 'getAllPendaftaran']);
    }
}
