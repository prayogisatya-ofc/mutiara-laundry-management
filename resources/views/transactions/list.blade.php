@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data Transaksi /</span> Semua Transaksi</h4>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible mb-3" role="alert">
            {!! session('success') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card mb-3">
        <div class="card-header">
            <div class="row justify-content-between align-items-end">
                <div class="col-lg-9">
                    <form action="{{ route('transaction_list') }}" method="get" class="row justify-content-between align-items-end">
                        <div class="col-lg-3 mb-3 mb-lg-0">
                            <label class="form-label">No. Invoice</label>
                            <input type="search" class="form-control" name="search" value="{{ $search }}" placeholder="Cari...">
                        </div>
                        <div class="col-lg-3 mb-3 mb-lg-0">
                            <label class="form-label">Dari</label>
                            <input type="date" class="form-control" name="start" value="{{ $start }}">
                        </div>
                        <div class="col-lg-3 mb-3 mb-lg-0">
                            <label class="form-label">Sampai</label>
                            <input type="date" class="form-control" name="end" value="{{ $end }}">
                        </div>
                        <div class="col-lg-3 mb-3 mb-lg-0">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3">
                    <button type="submit" class="btn btn-primary d-flex align-items-center float-start float-lg-end" onclick="location.href = '/transactions/print?start={{ $start }}&end={{ $end }}'">
                        <i class="bx bx-printer me-2 ms-n1"></i>
                        <span>Cetak</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive mb-3">
                <table class="table w-100">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>No. Invoice</th>
                            <th>Nama Member</th>
                            <th class="text-center">Dibuat Pada</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Pembayaran</th>
                            <th>Total Bayar</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $d)
                            <tr>
                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                <td>#{{ $d->invoice }}</td>
                                <td>{{ $d->member->name }}</td>
                                <td class="text-center">{{ $d->created_at->format('d-m-Y') }}</td>
                                @php($status = [
                                    'process' => [
                                        'color' => 'warning', 
                                        'text' => 'Proses'
                                    ],
                                    'done' => [
                                        'color' => 'success',
                                        'text' => 'Selesai'
                                    ],
                                    'taken' => [
                                        'color' => 'primary',
                                        'text' => 'Diambil'
                                    ]
                                ][$d->status])
                                <td class="text-center">
                                    <span class="badge bg-label-{{ $status['color'] }}">{{ $status['text'] }}</span>
                                </td>
                                @php($payment = [
                                    'unpaid' => [
                                        'color' => 'danger', 
                                        'text' => 'Belum Dibayar'
                                    ],
                                    'paid' => [
                                        'color' => 'success',
                                        'text' => 'Dibayar'
                                    ]
                                ][$d->payment])
                                <td class="text-center">
                                    <span class="badge bg-label-{{ $payment['color'] }}">{{ $payment['text'] }}</span>
                                </td>
                                <td>Rp {{ number_format($d->getTotal(), 0, ',', '.') }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('transaction_edit', $d->id) }}" class="btn btn-sm btn-primary me-2"><i class="bx bx-show"></i></a>
                                        <form action="{{ route('transaction_destroy', $d->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')"><i class="bx bx-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Tidak ada data yang dapat ditampilkan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div>
                {{ $data->appends(['start' => $start, 'end' => $end, 'search' => $search])->links() }}
            </div>
        </div>
    </div>
</div>
@endsection