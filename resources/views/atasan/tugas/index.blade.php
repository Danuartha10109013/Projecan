@extends('template.atasan.main')

@section('title')
    Daftar Tugas
@endsection

@section('content-atasan')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Tugas - Bootdey.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            padding-top: 20px;
            background: #E6E6FA
        }

        .card {
            box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
        }

        .avatar-md {
            height: 5rem;
            width: 5rem;
        }

        .fs-19 {
            font-size: 19px;
        }

        .primary-link {
            color: #314047;
            -webkit-transition: all .5s ease;
            transition: all .5s ease;
        }

        a {
            color: #02af74;
            text-decoration: none;
        }

        .favorite-icon a {
            display: inline-block;
            width: 30px;
            height: 30px;
            font-size: 18px;
            line-height: 30px;
            text-align: center;
            border: 1px solid #eff0f2;
            border-radius: 6px;
            color: rgba(173, 181, 189, .55);
            -webkit-transition: all .5s ease;
            transition: all .5s ease;
        }

        .candidate-list-box .favorite-icon {
            position: absolute;
            right: 22px;
            top: 22px;
        }

        .fs-14 {
            font-size: 14px;
        }

        .bg-soft-secondary {
            background-color: rgba(116, 120, 141, .15) !important;
            color: #74788d !important;
        }

        .mt-1 {
            margin-top: 0.25rem !important;
        }
    </style>
</head>

<body>
    <section class="section">
        <div class="container">
            <div class="justify-content-center row">
                <div class="col-lg-12">
                    <div class="candidate-list-widgets mb-4">
                        <form action="{{ route('atasan.tugas') }}" method="GET">
                            <div class="g-2 row mt-5">
                                <div class="col-lg-8">
                                    <div class="filler-job-form">
                                        <i class="uil uil-briefcase-alt"></i>
                                        <input id="exampleFormControlInput1" name="search" placeholder="Job, Company name..." type="search" class="form-control filler-job-input-box form-control" value="{{ request()->get('search') }}" />
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="uil uil-filter"></i> Cari Tugas
                                            
                                        </button>
                                        <a href="#" class="btn btn-success">
                                            <i class="uil uil-filter"></i> Tambah Tugas
                                        </a>
                                    </div>
                                </div>
                             
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="align-items-center row">
                        <div class="col-lg-8">
                            <div class="mb-3 mb-lg-0">
                                <h6 class="fs-16 mb-0">Showing {{ $tasks->firstItem() }} – {{ $tasks->lastItem() }} of {{ $tasks->total() }} results</h6>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="candidate-list-widgets">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="selection-widget">
                                            <select class="form-select" name="order_by" onchange="window.location.href = this.value;">
                                                <option value="{{ route('atasan.tugas', ['order_by' => 'default']) }}" {{ request('order_by') == 'default' ? 'selected' : '' }}>Default</option>
                                                <option value="{{ route('atasan.tugas', ['order_by' => 'newest']) }}" {{ request('order_by') == 'newest' ? 'selected' : '' }}>Newest</option>
                                                <option value="{{ route('atasan.tugas', ['order_by' => 'oldest']) }}" {{ request('order_by') == 'oldest' ? 'selected' : '' }}>Oldest</option>
                                                <option value="{{ route('atasan.tugas', ['order_by' => 'random']) }}" {{ request('order_by') == 'random' ? 'selected' : '' }}>Random</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="selection-widget mt-2 mt-lg-0">
                                            <select class="form-select" name="per_page" onchange="window.location.href = this.value;">
                                                <option value="{{ route('atasan.tugas', ['per_page' => 'all']) }}" {{ request('per_page') == 'all' ? 'selected' : '' }}>All</option>
                                                <option value="{{ route('atasan.tugas', ['per_page' => 8]) }}" {{ request('per_page') == 8 ? 'selected' : '' }}>8 per Page</option>
                                                <option value="{{ route('atasan.tugas', ['per_page' => 12]) }}" {{ request('per_page') == 12 ? 'selected' : '' }}>12 per Page</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach ($tasks as $task)
                    <div class="candidate-list">
                        <div class="candidate-list-box card mt-4">
                            <div class="p-4 card-body">
                                <div class="align-items-center row">
                                    <div class="col-auto">
                                        <div class="candidate-list-images">
                                            <a href="#"><img src="{{asset('image/profile.jpg')}}" alt class="avatar-md img-thumbnail rounded-circle" /></a>
                                        </div>
                                    </div>

                                    <div class="col-lg-5">
                                        <div class="candidate-list-content mt-3 mt-lg-0">
                                            <h5 class="fs-19 mb-0">
                                                <a class="primary-link" href="#">{{ $task->nama_tugas }}</a>
                                            </h5>
                                            <p class="text-muted mb-2">{{ $task->id_user }}</p>
                                            <ul class="list-inline mb-0 text-muted">
                                                <li class="list-inline-item"><i class="mdi mdi-map-marker"></i> {{ $task->lampiran }}</li>
                                                @if ($task->status == 1 )
                                                <li class="list-inline-item"><i class="mdi mdi-wallet"></i>Not Complite</li>
                                                @elseif ($task->status == 2)
                                                <li class="list-inline-item"><i class="mdi mdi-wallet"></i>Complite</li>
                                                @else
                                                <li class="list-inline-item"><i class="mdi mdi-wallet"></i>Revisi</li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mt-2 mt-lg-0 d-flex flex-wrap align-items-start gap-1">
                                            <span class="badge bg-soft-primary fs-14 mt-1"><a style="color: green" href="">Konfirmasi</a></span>
                                            <span class="badge bg-soft-warning fs-14 mt-1"><a style="color: yellow" href="">Revisi</a></span>
                                            <span class="badge bg-soft-red fs-14 mt-1"><a style="color: red" href="">Hapus</a></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="favorite-icon">
                                    <a href="#"><i class="mdi mdi-heart fs-18"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="row">
                <div class="mt-4 pt-2 col-lg-12">
                    <nav aria-label="Page navigation example">
                        <div class="pagination job-pagination mb-0 justify-content-center">
                            {{ $tasks->links() }}
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
@endsection
