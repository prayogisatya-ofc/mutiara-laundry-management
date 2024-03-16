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

    <div class="card mb-4">
        <div class="card-header">
            <div class="row justify-content-between align-items-end">
                <div class="col-lg-4 mb-3 mb-lg-0">
                    <form action="{{ route('package_list') }}" method="get">
                        <label class="form-label">Cari</label>
                        <input type="search" class="form-control" placeholder="Apa yang anda cari?" name="search" value="{{ $search }}">
                    </form>
                </div>
                <div class="col-lg-8">
                    <a href="{{ route('package_create') }}" class="btn btn-primary d-flex align-items-center float-start float-lg-end">
                        <i class="bx bx-plus me-2"></i>
                        <span>Tambah Paket</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive mb-3">
                <table class="table table-bordered w-100">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>No. Invoice</th>
                            <th>Nama Member</th>
                            <th>Dibuat Pada</th>
                            <th>Status Laundry</th>
                            <th>Status Pembayaran</th>
                            <th>Total Bayar</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $d)
                            <tr>
                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                <td>{{ $d->member->name }}</td>
                                <td>{{ $d->created_at }}</td>
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
                                <td>
                                    <span class="badge badge-{{ $status['color'] }}">{{ $status['text'] }}</span>
                                </td>
                                @php($payment = [
                                    'unpaid' => [
                                        'color' => 'warning', 
                                        'text' => 'Belum Dibayar'
                                    ],
                                    'paid' => [
                                        'color' => 'success',
                                        'text' => 'DIbayar'
                                    ]
                                ][$d->payment])
                                <td>
                                    <span class="badge badge-{{ $payment['color'] }}">{{ $payment['text'] }}</span>
                                </td>
                                <td>Rp {{ number_format($d->getTotal, 0, ',', '.') }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('transaction_detail', $d->id) }}" class="btn btn-sm btn-primary me-2"><i class="bx bx-show"></i></a>
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
                {{ $data->appends(['search' => $search])->links() }}
            </div>
        </div>
    </div>
</div>
@endsection