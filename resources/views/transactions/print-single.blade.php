<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mutiara Laundry - Pesanan </title>
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
    <div class="mb-4">
        <h2 class="fw-bold mb-1">Mutiara Laundry</h2>
        <p>Kompleks Ruko Eldorado, Jl. Untung Suropati, Labuhan Dalam, Kedaton, Kota Bandar Lampung, Lampung.</p>
    </div>
    <table class="table table-bordered mb-3">
        <tr>
            <td>
                <div class="d-flex flex-column">
                    <p class="text-muted mb-1">Tagihan Kepada</p>
                    <b>{{ $data->member->name }}</b>
                    <b>{{ $data->member->address }}</b>
                    <b>Telp : +62{{ $data->member->telp }}</b>
                </div>
            </td>
            <td class="align-top">
                <p class="text-muted mb-1">Tgl. Pengambilan</p>
                <b>{{ $data->date_taken_formated }}</b>
            </td>
            <td class="align-top">
                <p class="text-muted mb-1">Nomor Invoice</p>
                <b>{{ $data->invoice }}</b>
            </td>
            <td class="align-top">
                <p class="text-muted mb-1">Tgl. Dibuat</p>
                <b>{{ $data->created_at->format('d/m/Y') }}</b>
            </td>
        </tr>
    </table>

    <table class="table table-bordered mb-5">
        <thead>
            <tr>
                <th class="text-center">No.</th>
                <th>Nama Paket</th>
                <th>Harga Paket</th>
                <th class="text-center">QTY</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data->detail_transactions as $detail)
                <tr>
                    <td class="text-center">{{ $loop->index + 1 }}</td>
                    <td>{{ $detail->package->name }}</td>
                    <td>Rp {{ number_format($detail->package->price, 0, ',', '.') }}</td>
                    <td class="text-center">{{ $detail->qty }}</td>
                    <td>Rp {{ number_format($detail->package->price * $detail->qty, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4" class="text-end">Total</th>
                <th>Rp {{ number_format($data->getTotal(), 0, ',', '.') }}</th>
            </tr>
        </tfoot>
    </table>

    <div class="float-end text-center">
        <p style="margin-bottom: 5rem">Dengan Hormat,</p>
        <u>Mutiara Laundry</u>
        <p class="mb-0">Pemilik Usaha</p>
    </div>

    
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