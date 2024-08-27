@extends('template.admin.main')
@section('title')
    Tambah Pegawai
@endsection
@section('content-admin')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tambah Pegawai</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<section class="section gray-bg" id="add-user">
    <div class="container">
        <h3 class="dark-color">Tambah Pengguna</h3>
        <form action="{{ route('admin.kelola-pegawai-insert') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nidn">NIDN:</label>
                <input type="text" class="form-control" id="nidn" name="nidn" value="{{ old('nidn') }}" required>
                @error('nidn')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan:</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ old('jabatan') }}" required>
                @error('jabatan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir:</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                @error('tanggal_lahir')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}" required>
                @error('alamat')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone">Telepon:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Kata Sandi:</label>
                <input type="password" class="form-control" id="password" name="password" required>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Kata Sandi:</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="role">Role:</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="0" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="2" {{ old('role') == 'Atasan' ? 'selected' : '' }}>Atasan</option>
                    <option value="1" {{ old('role') == 'Pegawai' ? 'selected' : '' }}>Pegawai</option>
                </select>
                @error('role')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</section>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
