@extends('frontend.layouts.app')

@section('title', 'Cek Laundry')
    
@section('content')
<section class="section" style="margin-top: 5rem">
    <div class="container section-title pb-4" data-aos="fade-up">
        <h2>Cek Laundry</h2>
        <p>Selalu pantau progres cucian kamu setiap harinya di sini.</p>
    </div>
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <form action="" method="get">
                            <div class="input-group">
                                <input type="search" value="{{ request('invoice') }}" class="form-control rounded-pill px-3 me-2" placeholder="Nomor Invoice" name="invoice">
                                <button type="submit" class="btn btn-primary rounded-pill">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if (request('invoice') && $transaction)
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4 border-0 shadow-sm rounded-4">
                    <div class="card-header px-4 pt-4 bg-white border-0 d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 fw-bold">Informasi Pesanan</h4>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <label class="col-6">No. Invoice</label>
                            <div class="col-6 text-end">
                                <p>#{{ $transaction->invoice }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-6">Nama Member</label>
                            <div class="col-6">
                                <p class="d-flex align-items-center justify-content-end">
                                    {{ $transaction->member->name }}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-6">Dibuat pada</label>
                            <div class="col-6 text-end">
                                <p>{{ $transaction->created_at->format('d/m/Y') }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-6">Akan diambil</label>
                            <div class="col-6 text-end">
                                <p>{{ $transaction->date_taken_formated }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-6">Status</label>
                            <div class="col-6 text-end">
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
                                ][$transaction->status])
                                <p><span class="badge bg-{{ $status['color'] }}">{{ $status['text'] }}</span></p>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-6">Pembayaran</label>
                            <div class="col-6 text-end">
                                @php($payment = [
                                    'unpaid' => [
                                        'color' => 'danger', 
                                        'text' => 'Belum Dibayar'
                                    ],
                                    'paid' => [
                                        'color' => 'success',
                                        'text' => 'Dibayar'
                                    ]
                                ][$transaction->payment])
                                <p><span class="badge bg-{{ $payment['color'] }}">{{ $payment['text'] }}</span></p>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-6">Total Bayar</label>
                            <div class="col-6 text-end">
                                <p class="mb-0">Rp {{ number_format($transaction->getTotal(), 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card border-0 rounded-4 shadow-sm mb-4">
                    <div class="card-header bg-white px-4 pt-4 border-0 d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 fw-bold">Daftar Paket</h4>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive text-nowrap table-bordered">
                            <table class="table w-100">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>Nama Paket</th>
                                        <th class="text-center">QTY</th>
                                        <th class="text-end">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($transaction->detail_transactions as $detail)
                                        <tr>
                                            <td class="text-center">{{ $loop->index + 1 }}</td>
                                            <td>{{ $detail->package->name }}</td>
                                            <td class="text-center">{{ $detail->qty }}</td>
                                            <td class="text-end">Rp {{ number_format($detail->qty * $detail->package->price, 0, ',', '.') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Tidak ada paket ditambahkan</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" class="text-end fw-bold border-bottom-0">Total Bayar</td>
                                        <td class="fw-bold border-bottom-0 text-end">Rp {{ number_format($transaction->getTotal(), 0, ',', '.') }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <img src="{{ asset('frontend/img/empty.svg') }}" alt="" class="img-fluid">
                <p class="mb-0 text-center">Transaksi tidak ditemukan atau kode invoice belum di masukkan.</p>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection