@extends('template.atasan.main')
@section('title')
    Profile Atasan
@endsection
@section('content-atasan')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


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
}
img {
    vertical-align: middle;
    border-style: none;
}
/* About Me 
---------------------*/
.about-text h3 {
  font-size: 45px;
  font-weight: 700;
  margin: 0 0 6px;
}
@media (max-width: 767px) {
  .about-text h3 {
    font-size: 35px;
  }
}
.about-text h6 {
  font-weight: 600;
  margin-bottom: 15px;
}
@media (max-width: 767px) {
  .about-text h6 {
    font-size: 18px;
  }
}
.about-text p {
  font-size: 18px;
  max-width: 450px;
}
.about-text p mark {
  font-weight: 600;
  color: #20247b;
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
.about-list label:after {
  content: "";
  position: absolute;
  top: 0;
  bottom: 0;
  right: 11px;
  width: 1px;
  height: 12px;
  background: #20247b;
  -moz-transform: rotate(15deg);
  -o-transform: rotate(15deg);
  -ms-transform: rotate(15deg);
  -webkit-transform: rotate(15deg);
  transform: rotate(15deg);
  margin: auto;
  opacity: 0.5;
}
.about-list p {
  margin: 0;
  font-size: 15px;
}

@media (max-width: 991px) {
  .about-avatar {
    margin-top: 30px;
  }
}

.about-section .counter {
  padding: 22px 20px;
  background: #ffffff;
  border-radius: 10px;
  box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
}
.about-section .counter .count-data {
  margin-top: 10px;
  margin-bottom: 10px;
}
.about-section .counter .count {
  font-weight: 700;
  color: #20247b;
  margin: 0 0 5px;
}
.about-section .counter p {
  font-weight: 600;
  margin: 0;
}
mark {
    background-image: linear-gradient(rgba(252, 83, 86, 0.6), rgba(252, 83, 86, 0.6));
    background-size: 100% 3px;
    background-repeat: no-repeat;
    background-position: 0 bottom;
    background-color: transparent;
    padding: 0;
    color: currentColor;
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
<h6 class="theme-color lead">NIDN : {{Auth::user()->nidn}}</h6>
<p><mark>Jabatan</mark> {{Auth::user()->jabatan}}</p>
<div class="row about-list">
<div class="col-md-6">
  <div class="media">
    <label>Birthday</label>
    <p>{{ \Carbon\Carbon::parse(Auth::user()->tanggal_lahir)->format('d M Y') }}</p>
</div>
<div class="media">
    <label>Age</label>
    <p>{{ \Carbon\Carbon::parse(Auth::user()->tanggal_lahir)->age }} Yr</p>
</div>

<div class="media">
<label>Address</label>
<p>{{Auth::user()->alamat}}</p>
</div>
</div>
<div class="col-md-6">
<div class="media">
<label>E-mail</label>
<p>{{Auth::user()->email}}</p>
</div>
<div class="media">
<label>Phone</label>
<p>820-885-3321</p>
</div>
<div class="media">
<label>Status</label>
<p>{{Auth::user()->status}}</p>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="about-avatar">
<img width="100%" src="{{ asset('image/' . Auth::user()->image) }}" alt="{{Auth::user()->image}}">
</div>
</div>
</div>
<div class="counter">
<div class="row">
<div class="col-6 col-lg-3">
<div class="count-data text-center">
<h6 class="count h2" data-to="500" data-speed="500">500</h6>
<p class="m-0px font-w-600">Total Presensi Tanpa Keterangan</p>
</div>
</div>
<div class="col-6 col-lg-3">
<div class="count-data text-center">
<h6 class="count h2" data-to="150" data-speed="150">150</h6>
<p class="m-0px font-w-600">Total Presensi Hadir</p>
</div>
</div>
<div class="col-6 col-lg-3">
<div class="count-data text-center">
<h6 class="count h2" data-to="850" data-speed="850">850</h6>
<p class="m-0px font-w-600">Total Presensi Izin</p>
</div>
</div>
<div class="col-6 col-lg-3">
<div class="count-data text-center">
<h6 class="count h2" data-to="190" data-speed="190">190</h6>
<p class="m-0px font-w-600">Total Presensi Sakit</p>
</div>
</div>
</div>
</div>
</div>
<div class="text-center mt-4">
<div class="btn btn-primary"><a style="color:white" href="{{route('atasan.dashboard')}}">Kembali</a></div>
<div class="btn btn-warning"><a style="color:white" href="{{route('atasan.profile-edit')}}">Edit</a></div>
</div>
</section>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>
@endsection