<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mutiara Laundry - Cetak Daftar Pesanan</title>
    <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <style>
        * {
            color: black !important
        }
        .line {
            border-top: solid 1px #000 !important;
        }
    </style>
</head>
<body>
    <center>
        <h2 class="fw-bold mb-1">REKAP DAFTAR PESANAN</h2>
        <h4 class="mb-1">Mutiara Laundry</h4>
        <p>Kompleks Ruko Eldorado, Jl. Untung Suropati, Labuhan Dalam, Kedaton, Kota Bandar Lampung, Lampung.</p>
    </center>
    <div class="line"></div>
    @if ($start && $end)
        <table class="mt-4">
            <tr>
                <td>Dari Tanggal</td>
                <td class="ps-2">: {{ $start }}</td>
            </tr>
            <tr>
                <td>Sampai Tanggal</td>
                <td class="ps-2">: {{ $end }}</td>
            </tr>
        </table>
    @endif
    <table class="table table-bordered w-100 mt-4">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>No. Invoice</th>
                <th>Nama Member</th>
                <th class="text-center">Dibuat Pada</th>
                <th class="text-center">Status</th>
                <th class="text-center">Pembayaran</th>
                <th>Total Bayar</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $d)
                <tr>
                    <td class="text-center">{{ $loop->index + 1 }}</td>
                    <td>#{{ $d->invoice }}</td>
                    <td>{{ $d->member->name }}</td>
                    <td class="text-center">{{ $d->created_at->format('d/m/Y') }}</td>
                    @php($status = [
                        'process' => ['text' => 'Proses'],
                        'done' => ['text' => 'Selesai'],
                        'taken' => ['text' => 'Diambil']
                    ][$d->status])
                    <td class="text-center">
                        {{ $status['text'] }}
                    </td>
                    @php($payment = [
                        'unpaid' => ['text' => 'Belum Dibayar'],
                        'paid' => ['text' => 'Dibayar']
                    ][$d->payment])
                    <td class="text-center">
                        {{ $payment['text'] }}
                    </td>
                    <td>Rp {{ number_format($d->getTotal(), 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Tidak ada data yang dapat ditampilkan.</td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <th colspan="6" class="text-end">Jumlah</th>
                <th>Rp {{ number_format($total, 0, ',', '.') }}</th>
            </tr>
        </tfoot>
    </table>

    
    <script src="/assets/vendor/js/bootstrap.js"></script>
    <script>
        window.onload = function() {
            window.print()
            window.onafterprint = function() {
                history.back()
            };
        };
    </script>
</body>
</html>