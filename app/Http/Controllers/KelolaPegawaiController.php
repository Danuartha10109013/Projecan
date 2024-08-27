<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class KelolaPegawaiController extends Controller
{
    public function index()
    {
        $data = User::where('role', 1)
            ->orWhere('role', 2)
            ->get();

        // dd($data);
        return view('admin.kelola_pegawai.index',compact('data'));
    }
    public function create()
    {
        return view('admin.kelola_pegawai.create');
    }
    public function insert(Request $request)
    {
        // dd($request->all());
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'nidn' => 'required|string|unique:users,nidn',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jabatan' => 'required|string',
            'status' => 'required|in:active,inactive',
            'role' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->nidn = $request->nidn;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->alamat = $request->alamat;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->jabatan = $request->jabatan;
        $user->status = $request->status;
        $user->role = $request->role;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $user->image = $imagePath;
        }

        $user->save();

        return redirect()->route('admin.kelola-pegawai')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pegawai = User::findOrFail($id);
        return view('admin.kelola_pegawai.edit', compact('pegawai'));
    }

    // Mengupdate data pegawai
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nidn' => 'required|string|unique:users,nidn,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|string',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jabatan' => 'required|string',
            'status' => 'required|in:active,inactive',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $pegawai = User::findOrFail($id);
        $pegawai->name = $request->name;
        $pegawai->nidn = $request->nidn;
        $pegawai->email = $request->email;
        $pegawai->phone = $request->phone;
        $pegawai->alamat = $request->alamat;
        $pegawai->tanggal_lahir = $request->tanggal_lahir;
        $pegawai->jabatan = $request->jabatan;

        

        $pegawai->save();

        return redirect()->route('admin.kelola-pegawai')->with('success', 'Pengguna berhasil diperbarui.');
    }

    // Menghapus data pegawai
    public function delete($id)
    {
        $pegawai = User::findOrFail($id);
        if ($pegawai->image) {
            Storage::disk('public')->delete($pegawai->image);
        }
        $pegawai->delete();
        return redirect()->route('admin.kelola-pegawai')->with('success', 'Pengguna berhasil dihapus.');
    }

    public function activate($id){
        $pegawai = User::findOrFail($id);
        $pegawai->status = "active";
        $pegawai->update();
        return redirect()->route('admin.kelola-pegawai')->with('success', 'Pengguna berhasil diaktifkan.');
    }
    public function inactive($id){
        $pegawai = User::findOrFail($id);
        $pegawai->status = "inactive";
        $pegawai->update();
        return redirect()->route('admin.kelola-pegawai')->with('success', 'Pengguna berhasil dinonaktifkan.');
    }
}
