@extends('template.pegawai.main')
@section('title-pegawai')
    Tugas
@endsection
@section('content-pegawai')
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .task-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .task-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }
        .task-card-header {
            background-color: #f8f9fa;
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }
        .task-card-body {
            padding: 15px;
        }
        .status-pending {
            color: #ffc107;
        }
        .status-in-progress {
            color: #17a2b8;
        }
        .status-completed {
            color: #28a745;
        }
        .task-actions {
            margin-top: 10px;
        }
        .container {
            padding-left: 15px;
            padding-right: 15px;
        }
    </style>

    <div class="container mt-4">
        
        <h3 class="mb-4">Daftar Tugas {{$ket}}</h3>

        @if($tasks->isEmpty())
            <div class="alert alert-warning" role="alert">
                Tidak ada tugas yang tersedia.
            </div>
        @else
            <div class="row">
                @foreach($tasks as $task)
                    <div class="col-md-4">
                        <div class="card task-card">
                            <div class="card-header task-card-header">
                                <h5 class="card-title">{{ $task->nama_tugas }}</h5>
                                @if ($task->status == 1)
                                <span class="text-warning">Not Complete</span>
                                @elseif ($task->status == 2)
                                <span class="text-warning">Complete</span>
                                @else
                                <span class="text-danger">Revisi</span>
                                @endif
                            </div>
                            <div class="card-body task-card-body">
                                <p><strong>Catatan:</strong> {{ $task->catatan ?? 'Tidak ada catatan' }}</p>
                                <p><strong>Lampiran:</strong> {{ $task->lampiran ?? 'Tidak ada lampiran' }}</p>
                                <p><strong>Konfirmasi:</strong> {{ $task->confirmation ?? 'Belum dikonfirmasi' }}</p>
                                <div class="task-actions">
                                    @if($ket == "Selesai (Belum Dikonfirmasi)")
                                    <a href="{{route('pegawai.tasks-detail',$task->id)}}" class="btn btn-warning btn-sm">Notify Your Admin</a>
                                    @else
                                    <a href="{{route('pegawai.tasks-detail',$task->id)}}" class="btn btn-primary btn-sm">Kerjakan Tugas</a>
                                    @endif
                                    <!-- Tambahkan tombol lainnya jika diperlukan -->
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        @if ($ket1 == "")
        @else
        <h3 class="mb-4">Daftar Tugas {{$ket1}}</h3>

        @if($tasks->isEmpty())
            <div class="alert alert-warning" role="alert">
                Tidak ada tugas yang tersedia.
            </div>
        @else
            <div class="row">
                @foreach($tasksconfirmed as $task)
                    <div class="col-md-4">
                        <div class="card task-card">
                            <div class="card-header task-card-header">
                                <h5 class="card-title">{{ $task->nama_tugas }}</h5>
                                @if ($task->status == 1)
                                <span class="text-warning">Not Complete</span>
                                @elseif ($task->status == 2)
                                <span class="text-success">Complete</span>
                                @else
                                <span class="text-danger">Revisi</span>
                                @endif
                            </div>
                            <div class="card-body task-card-body">
                                <p><strong>Catatan:</strong> {{ $task->catatan ?? 'Tidak ada catatan' }}</p>
                                <p><strong>Lampiran:</strong> {{ $task->lampiran ?? 'Tidak ada lampiran' }}</p>
                                <p><strong>Konfirmasi:</strong> {{ $task->confirmation ?? 'Belum dikonfirmasi' }}</p>
                                <div class="task-actions">
                                    {{-- <a href="#" class="btn btn-primary btn-sm">Lihat Detail</a> --}}
                                    <!-- Tambahkan tombol lainnya jika diperlukan -->
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        @endif
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>

@endsection
