<div class="az-header">
    <div class="container">
      <div class="az-header-left">
        <a href="£" class="az-logo"><span></span> Muttaqien University</a>
        <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
      </div><!-- az-header-left -->
      <div class="az-header-menu">
        <div class="az-header-menu-header">
          <a href="index.html" class="az-logo"><span></span> MU</a>
          <a href="" class="close">&times;</a>
        </div><!-- az-header-menu-header -->
        <ul class="nav">
          <li class="nav-item active show">
            <a href="{{route('admin.dashboard')}}" class="nav-link"><i class="typcn typcn-chart-area-outline"></i> Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i class="typcn typcn-user"></i> Pegawai</a>
            <nav class="az-menu-sub">
              <a href="page-signin.html" class="nav-link">Tambah Pegawai</a>
              <a href="page-signup.html" class="nav-link">Kelola Pegawai</a>
            </nav>
          </li>
          <li class="nav-item">
            <a href="chart-chartjs.html" class="nav-link"><i class="typcn typcn-input-checked"></i> Kelola Tugas</a>
          </li>
          <li class="nav-item">
            <a href="form-elements.html" class="nav-link"><i class="typcn typcn-document"></i> Laporan Absensi</a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i class="typcn typcn-book"></i> Components</a>
            <div class="az-menu-sub">
              <div class="container">
                <div>
                  <nav class="nav">
                    <a href="elem-buttons.html" class="nav-link">Buttons</a>
                    <a href="elem-dropdown.html" class="nav-link">Dropdown</a>
                    <a href="elem-icons.html" class="nav-link">Icons</a>
                    <a href="table-basic.html" class="nav-link">Table</a>
                  </nav>
                </div>
              </div><!-- container -->
            </div>
          </li>
        </ul>
      </div><!-- az-header-menu -->
      <div class="az-header-right">
        </div><!-- az-header-notification -->
        <div class="dropdown az-profile-menu">
          <a href="" class="az-img-user"><img src="{{ asset('image/' . Auth::user()->image) }}" alt=""></a>
          <div class="dropdown-menu">
            <div class="az-dropdown-header d-sm-none">
              <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
            </div>
            <div class="az-header-profile">
              <div class="az-img-user">
                <img src="{{ asset('image/' . Auth::user()->image) }}" alt="">
              </div><!-- az-img-user -->
              <h6>{{Auth::user()->name}}</h6>
              <span>
                @if (Auth::user()->role == 0)
                    Admin
                @endif
            </span>
            
            </div><!-- az-header-profile -->

            <a href="{{route('admin.profile')}}" class="dropdown-item"><i class="typcn typcn-user-outline"></i> My Profile</a>
            <a href="{{ route('admin.profile-edit', Auth::user()->id) }}" class="dropdown-item"><i class="typcn typcn-edit"></i> Edit Profile</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
          
          <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
              <i class="typcn typcn-power-outline"></i> Sign Out
          </a>
          
          </div><!-- dropdown-menu -->
        </div>
      </div><!-- az-header-right -->
    </div><!-- container -->
  </div><!-- az-header -->