@extends('template.admin.main')
@section('title')
    Edit Pengguna
@endsection
@section('content-admin')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit Pegawai</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<section class="section gray-bg" id="edit-user">
    <div class="container">
        <h3 class="dark-color">Edit Pengguna</h3>
        <form action="{{ route('admin.kelola-pegawai-update', $pegawai->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $pegawai->name }}" required>
            </div>
            <div class="form-group">
                <label for="nidn">NIDN:</label>
                <input type="text" class="form-control" id="nidn" name="nidn" value="{{ $pegawai->nidn }}" required>
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan:</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $pegawai->jabatan }}" required>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir:</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $pegawai->tanggal_lahir }}" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $pegawai->alamat }}" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $pegawai->email }}" required>
            </div>
            <div class="form-group">
                <label for="phone">Telepon:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $pegawai->phone }}" required>
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
