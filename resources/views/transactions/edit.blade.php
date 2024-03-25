@extends('layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light">Data Transaksi /</span> #{{ $transaction->invoice }}</h4>

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('transaction_list') }}" class="btn btn-primary mb-3 d-inline-flex align-items-center"><i class="bx bx-chevron-left me-2 ms-n1"></i>Kembali</a>
            <a href="{{ route('transaction_print_single', $transaction->id) }}" class="btn btn-primary mb-3 d-inline-flex align-items-center"><i class="bx bx-printer me-2 ms-n1"></i>Cetak</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible mb-3" role="alert">
                {!! session('success') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Informasi Pesanan</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('transaction_update', $transaction->id) }}" method="post">
                            @csrf
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
                                        <i class="bx bx-info-circle text-primary ms-1 cursor-pointer"
                                            data-bs-toggle="popover" 
                                            data-bs-offset="0,14" 
                                            data-bs-placement="bottom" 
                                            data-bs-html="true" 
                                            data-bs-content="
                                                <div class='mb-1'><i class='bx bx-phone text-primary'></i> 0{{ $transaction->member->telp }}</div>
                                                <div><i class='bx bx-map text-primary'></i> {{ $transaction->member->address }}</div>" 
                                            title="" 
                                            data-bs-original-title="{{ $transaction->member->name }}">
                                        </i>
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
                                    <p><span class="badge bg-label-{{ $status['color'] }}">{{ $status['text'] }}</span></p>
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
                                    <p><span class="badge bg-label-{{ $payment['color'] }}">{{ $payment['text'] }}</span></p>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-6">Total Bayar</label>
                                <div class="col-6 text-end">
                                    <p class="mb-0">Rp {{ number_format($transaction->getTotal(), 0, ',', '.') }}</p>
                                </div>
                            </div>
                            <div class="divider">
                                <div class="divider-text">Status & Pembayaran</div>
                            </div>
                            <select name="status" class="form-select mb-3">
                                <option {{ $transaction->status == 'process' ? 'selected' : '' }} value="process">Proses</option>
                                <option {{ $transaction->status == 'done' ? 'selected' : '' }} value="done">Selesai</option>
                                <option {{ $transaction->status == 'taken' ? 'selected' : '' }} value="taken">Diambil</option>
                            </select>
                            <select name="payment" class="form-select mb-3">
                                <option {{ $transaction->payment == 'unpaid' ? 'selected' : '' }} value="unpaid">Belum Dibayar</option>
                                <option {{ $transaction->payment == 'paid' ? 'selected' : '' }} value="paid">Dibayar</option>
                            </select>
                            <button type="submit" class="btn btn-primary d-flex align-items-center justify-content-center w-100"><i class="bx bx-revision me-2 ms-n1"></i>Perbarui</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Daftar Paket</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table w-100">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>Nama Paket</th>
                                        <th class="text-center">QTY</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($transaction->detail_transactions as $detail)
                                        <tr>
                                            <td class="text-center">{{ $loop->index + 1 }}</td>
                                            <td>{{ $detail->package->name }}</td>
                                            <td class="text-center">{{ $detail->qty }}</td>
                                            <td>Rp {{ number_format($detail->qty * $detail->package->price, 0, ',', '.') }}</td>
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
                                        <td class="fw-bold border-bottom-0">Rp {{ number_format($transaction->getTotal(), 0, ',', '.') }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
