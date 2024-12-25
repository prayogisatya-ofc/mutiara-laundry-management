@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <div class="d-flex align-items-end row">
            <div class="col-sm-7">
                <div class="card-body">
                    <h5 class="card-title text-primary">Selamat datang {{ Auth::user()->name }}! 🫡</h5>
                    <p class="mb-4">
                        Permudah manajemen laundrymu dengan platform ini. Cek pesanan pelanggan dan pengahsilanmu sekarang.
                    </p>
                    <a href="{{ route('cashier_list') }}" target="_blank" class="btn btn-sm btn-outline-primary">Kasir</a>
                </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
                <div class="card-body pb-0 px-0 px-md-4">
                    <img src="/assets/img/illustrations/man-with-laptop-light.png"
                        height="140" alt="View Badge User"
                        data-app-dark-img="illustrations/man-with-laptop-dark.png"
                        data-app-light-img="illustrations/man-with-laptop-light.png" />
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div
                        class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <i class="bx bx-dollar-circle bx-sm bg-label-success p-2 rounded"></i>
                        </div>
                    </div>
                    <span class="d-block mb-1">Penghasilan</span>
                    <h3 class="card-title mb-2">Rp {{ number_format($profit, 0, ',', '.') }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div
                        class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <i class="bx bx-cart-alt bx-sm bg-label-primary p-2 rounded"></i>
                        </div>
                    </div>
                    <span class="d-block mb-1">Pesanan Selesai</span>
                    <h3 class="card-title mb-2">{{ $transaction_done }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div
                        class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <i class="bx bx-cart-alt bx-sm bg-label-danger p-2 rounded"></i>
                        </div>
                    </div>
                    <span class="d-block mb-1">Pesanan Proses</span>
                    <h3 class="card-title text-nowrap mb-2">{{ $transactions_process }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div
                        class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <i class="bx bx-cart-alt bx-sm bg-label-warning p-2 rounded"></i>
                        </div>
                    </div>
                    <span class="d-block mb-1">Pesanan Hari ini</span>
                    <h3 class="card-title mb-2">{{ $transactions_today }}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Pesanan Hari ini</h5>
            <a href="{{ route('transaction_list') }}" class="btn btn-primary d-flex align-items-center">
                Semua
                <i class="bx bx-chevron-right ms-2 me-n1"></i>
            </a>
        </div>
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
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Belum ada pesanan hari ini</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection