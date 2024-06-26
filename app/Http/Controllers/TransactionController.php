<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TransactionController extends Controller
{

    public function index(Request $request) {
        $start = $request->input('start');
        $end = $request->input('end');
        $search = $request->input('search');

        $data = Transaction::query();

        if ($start && $end) {
            $startDate = Carbon::parse($start)->startOfDay();
            $endDate = Carbon::parse($end)->endOfDay();

            $data->whereBetween('created_at', [$startDate, $endDate]);
        }

        if ($search) {
            $data->where('invoice', '=', $search);
        }

        $data = $data->latest()->paginate(10);

        return view('transactions.list', [
            'title' => 'Daftar Pesanan',
            'data' => $data,
            'start' => $start,
            'end' => $end,
            'search' => $search,
        ]);
    }

    public function edit(Transaction $transaction) {
        $transaction->date_taken_formated = Carbon::parse($transaction->date_taken)->format('d/m/Y');

        return view('transactions.edit', [
            'title' => '#'.$transaction->invoice,
            'transaction' => $transaction
        ]);
    }

    public function update(Request $request, Transaction $transaction) {
        $status = $request->status;
        $payment = $request->payment;

        $transaction->update([
            'status' => $status,
            'payment' => $payment
        ]);

        return redirect()->back()->with('success', 'Informasi pesanan berhasil diperbarui.');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->back()->with('success', 'Transkasi berhasil dihapus.');
    }

    public function print_list(Request $request) {
        $start = $request->input('start');
        $end = $request->input('end');

        $data = Transaction::query();

        if ($start && $end) {
            $data->whereBetween('created_at', [$start, $end]);
        }

        $data = $data->latest()->paginate(10);

        $total = 0;
        foreach ($data as $d) {
            $total += $d->getTotal();
        }

        return view('transactions.print-list', [
            'data' => $data,
            'start' => Carbon::parse($start)->format('d/m/Y'),
            'end' => Carbon::parse($end)->format('d/m/Y'),
            'total' => $total
        ]);
    }

    public function print_single(Transaction $transaction) {
        $transaction->date_taken_formated = Carbon::parse($transaction->date_taken)->format('d/m/Y');
        
        return view('transactions.print-single', [
            'data' => $transaction
        ]);
    }
}
