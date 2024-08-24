<?php

namespace App\Http\Controllers;

use App\Models\KabupatenKota;
use App\Models\Provinsi;
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

    //admin
    public function getAllMahasiswa()
    {
        if (Gate::allows('admin')) {
            $data = User::where('role', '!=', 'Admin')->get();

            return view('admin.getAllMahasiswa', [
                'title' => 'getAllMahasiswa',
                'data' => $data
            ]);
        }
        abort(404);
    }

    public function getMahasiswa(User $user)
    {
        if (Gate::allows('admin')) {
            return view('admin.getMahasiswa', ['title' => 'getAllMahasiswa', 'data' => $user]);
        }
        abort(404);
    }

    public function createMahasiswa()
    {
        if (Gate::allows('admin')) {
            return view('admin.createMahasiswa', ['title' => 'getAllMahasiswa']);
        }
        abort(404);
    }

    public function storeMahasiswa(Request $request)
    {
        if (Gate::allows('admin')) {
            $user = new User();

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
            $validated['status'] = 'Belum mengajukan';

            $user->create($validated);

            return redirect()->route('getAllMahasiswa')->with('success', 'Data berhasil ditambahkan.');
        }
        abort(404);
    }

    public function editMahasiswa(User $user)
    {
        if (Gate::allows('admin')) {
            return view('admin.editMahasiswa', ['title' => 'getAllMahasiswa', 'data' => $user]);
        }
        abort(404);
    }

    public function updateMahasiswa(Request $request, User $user)
    {
        if (Gate::allows('admin')) {
            $data = $request->all();
            $rules = [
                'email' => 'required',
                'password' => 'nullable',
                'nama' => 'required',
            ];
            $messages = [
                'required' => ':attribute tidak boleh kosong.',
                'unique' => ':attribute sudah tersedia.',
                'email' => ':attribute tidak valid.',
            ];
            $validated = Validator::make($data, $rules, $messages)->validate();

            //cek apakah melakukan perubahan pada password
            if ($validated['password'] == null) {
                $user->update([
                    'email' => $validated['email'],
                    'nama' => $validated['nama']
                ]);
            } else {
                $user->update($validated);
            }

            return redirect()->route('getAllMahasiswa')->with('success', 'Data berhasil diubah.');
        }
        abort(404);
    }

    public function deleteMahasiswa(User $user)
    {
        if (Gate::allows('admin')) {
            $user->delete();

            return redirect()->route('getAllMahasiswa')->with('success', 'Data berhasil dihapus.');
        }
        abort(404);
    }

    public function getAllPendaftaran()
    {
        if (Gate::allows('mahasiswa')) {
            return view('admin.getAllPendaftaran', ['title' => 'getAllPendaftaran']);
        }
        abort(404);
    }

    //mahasiswa
    public function pendaftaranMahasiswa()
    {
        if (Gate::allows('mahasiswa')) {
            $provinsi = Provinsi::get();
            $kot_kab = KabupatenKota::get();

            return view('mahasiswa.pendaftaran', [
                'title' => 'pendaftaranMahasiswa',
                'provinsi' => $provinsi,
                'kot_kab' => $kot_kab
            ]);
        }
        abort(404);
    }

    public function ajukanPendaftaran(Request $request, User $user)
    {
        if (Gate::allows('mahasiswa')) {
            $data = $request->all();
            $rules = [
                'email' => 'required|email',
                'nama' => 'required',
                'alamat_ktp' => 'required',
                'alamat_sekarang' => 'required',
                'kecamatan' => 'required',
                'kota' => 'required',
                'provinsi' => 'required',
                'no_telp' => 'required',
                'no_hp' => 'required',
                'kewarganegaraan' => 'required',
                'negara' => 'required',
                'tanggal_lahir' => 'required',
                'tempat_lahir' => 'required',
                'kota_lahir' => 'required',
                'provinsi_lahir' => 'required',
                'negara_lahir' => 'required',
                'jenis_kelamin' => 'required',
                'status_menikah' => 'required',
                'agama' => 'required',
            ];
            $messages = [
                'required' => ':attribute tidak boleh kosong.',
                'email' => ':attribute tidak valid.',
            ];
            $validated = Validator::make($data, $rules, $messages)->validate();

            $cariProvinsi = Provinsi::where('id', '=', $validated['provinsi'])->first();
            $cariKota = KabupatenKota::where('id', '=', $validated['kota'])->first();
            $cariProvinsiLahir = Provinsi::where('id', '=', $validated['provinsi_lahir'])->first();
            $cariKotaLahir = KabupatenKota::where('id', '=', $validated['provinsi_lahir'])->first();

            $validated['provinsi'] = $cariProvinsi->nama;
            $validated['kota'] = $cariKota->nama;
            $validated['provinsi_lahir'] = $cariProvinsiLahir->nama;
            $validated['kota_lahir'] = $cariKotaLahir->nama;
            $validated['status'] = 'Sudah mengajukan';

            $user->update($validated);

            return redirect()->route('dashboard')->with('success', 'Berhasil melakukan pendaftaran');
        }
        abort(404);
    }
}
