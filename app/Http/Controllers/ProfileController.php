<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index_admin(){
        return view('admin.profile.index');
    }
    public function index_pegawai(){
        return view('pegawai.profile.index');
    }

    public function edit_admin(){
        return view('admin.profile.edit');
    }
    public function update_admin(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            // 'nidn' => 'required|string|max:255',
            // 'jabatan' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:15',
            // 'status' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Mendapatkan user yang sedang login
        $user = Auth::user();

        // Jika ada file gambar yang diunggah
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($user->image && Storage::exists('image/' . $user->image)) {
                Storage::delete('image/' . $user->image);
            }

            // Simpan gambar baru
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('image'), $fileName);

            // Simpan nama file gambar ke database
            $user->image = $fileName;
        }

        // Update data user
        $user->name = $request->name;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->alamat = $request->alamat;
        $user->phone = $request->phone;

        // Simpan perubahan
        $user->update();

        // Redirect ke halaman dashboard dengan pesan sukses
        return redirect()->route('admin.dashboard')->with('success', 'Profile updated successfully.');
    }

    public function edit_pegawai(){
        return view('pegawai.profile.edit');
    }
    public function update_pegawai(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            // 'nidn' => 'required|string|max:255',
            // 'jabatan' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:15',
            // 'status' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Mendapatkan user yang sedang login
        $user = Auth::user();

        // Jika ada file gambar yang diunggah
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($user->image && Storage::exists('image/' . $user->image)) {
                Storage::delete('image/' . $user->image);
            }

            // Simpan gambar baru
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('image'), $fileName);

            // Simpan nama file gambar ke database
            $user->image = $fileName;
        }

        // Update data user
        $user->name = $request->name;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->alamat = $request->alamat;
        $user->phone = $request->phone;

        // Simpan perubahan
        $user->update();

        // Redirect ke halaman dashboard dengan pesan sukses
        return redirect()->route('pegawai.dashboard')->with('success', 'Profile updated successfully.');
    }
}
