<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function index(Request $request) {
        $invoice = $request->input('invoice');

        $transaction = null;

        if ($invoice) {
            $transaction = Transaction::where('invoice', $invoice)->first();
            $transaction->date_taken_formated = Carbon::parse($transaction->date_taken)->format('d/m/Y');
        }

        return view('track', [
            'title' => 'Tracking',
            'transaction' => $transaction
        ]);
    }
}
