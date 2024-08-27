@extends('template.pegawai.main')
@section('title-pegawai')
    Detail Tugas
@endsection
@section('content-pegawai')
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .task-detail {
            margin-bottom: 30px;
        }
        .task-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .task-meta {
            margin-bottom: 15px;
            color: #666;
            font-size: 14px;
        }
        .task-content {
            font-size: 16px;
            line-height: 1.6;
        }
        .task-content p {
            margin-bottom: 10px;
        }
        .btn-back {
            margin-top: 20px;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class=" mt-4 task-detail">
                    <h1 class="task-title">{{ $task->nama_tugas }}</h1>
                    <div class="task-meta">
                        <p><strong>Status:</strong> 
                            @if ($task->status == 1)
                                <span class="text-warning">Not Complete</span>
                            @elseif ($task->status == 2)
                                <span class="text-success">Complete</span>
                            @endif
                        </p>
                        <p><strong>Konfirmasi:</strong> {{ $task->confirmation ?? 'Belum dikonfirmasi' }}</p>
                    </div>
            
                    <div class="task-content">
                        <p><strong>Catatan:</strong> {{ $task->catatan ?? 'Tidak ada catatan' }}</p>
                        <p><strong>Lampiran:</strong> 
                            @if($task->lampiran)
                                <a href="{{ asset('storage/lampiran/' . $task->lampiran) }}" target="_blank">Lihat Lampiran</a>
                            @else
                                Tidak ada lampiran
                            @endif
                        </p>
                    </div>
                    
                    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-back">Kembali ke Daftar Tugas</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mt-4">
                    <h2>Kumpulkan Tugas</h2>
                    <form action="{{ route('pegawai.tasks-kumpulkan',$task->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Ini menambahkan metode PUT secara efektif -->
            
                        <input type="hidden" name="id_tugas" value="{{ $task->id }}">
            
                        <div class="mb-3">
                            <label for="catatan" class="form-label">Catatan</label>
                            <textarea class="form-control" id="catatan" name="catatan" rows="4">{{ old('catatan') }}</textarea>
                        </div>
            
                        <div class="mb-3">
                            <label for="bukti" class="form-label">Bukti</label>
                            <input type="file" class="form-control" id="bukti" name="bukti">
                        </div>
            
                        <button type="submit" class="btn btn-primary mb-3">Kumpulkan Tugas</button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>

    

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>

@endsection
