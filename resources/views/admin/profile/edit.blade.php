@extends('template.admin.main')
@section('title')
    Edit Profile
@endsection
@section('content-admin')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Edit Profile - Bootdey.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    body{
        color: #6F8BA4;
        margin-top:0px;
    }
    .section {
        padding: 100px 0;
        position: relative;
    }
    .gray-bg {
        background-color: #f5f5f5;
    }
    img {
        max-width: 100%;
        vertical-align: middle;
        border-style: none;
    }
    .about-text h3 {
        font-size: 45px;
        font-weight: 700;
        margin: 0 0 6px;
    }
    .about-text h6 {
        font-weight: 600;
        margin-bottom: 15px;
    }
    .about-text p {
        font-size: 18px;
        max-width: 450px;
    }
    .about-list {
        padding-top: 10px;
    }
    .about-list .media {
        padding: 5px 0;
    }
    .about-list label {
        color: #20247b;
        font-weight: 600;
        width: 88px;
        margin: 0;
        position: relative;
    }
    .about-section .counter {
        padding: 22px 20px;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
    }
    .theme-color {
        color: #fc5356;
    }
    .dark-color {
        color: #20247b;
    }
</style>
</head>
<body>
<section class="section about-section gray-bg" id="about">
    <div class="container">
        <div class="row align-items-center flex-row-reverse">
            <div class="col-lg-6">
                <div class="about-text go-to">
                    <h3 class="dark-color">{{Auth::user()->name}}</h3>
                    <form action="{{ route('admin.profile-update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{Auth::user()->name}}">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Birthday</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{Auth::user()->tanggal_lahir}}">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Address</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{Auth::user()->alamat}}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{Auth::user()->phone}}">
                        </div>
                        <div class="form-group">
                            <label for="image">Upload New Image</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-avatar">
                    <img width="100%" src="{{ asset('image/' . Auth::user()->image) }}" alt="{{Auth::user()->image}}">
                </div>
            </div>
        </div>
    </div>
</section>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
