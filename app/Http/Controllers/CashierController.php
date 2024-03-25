<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaction;
use App\Models\Member;
use App\Models\Package;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CashierController extends Controller
{
    public function index() {
        return view('cashier', [
            'title' => 'Kasir',
        ]);
    }

    public function get_packages(Request $request) {
        $search = $request->input('search');

        $packages = Package::query();

        if ($search) {
            $packages->where('name', 'like', '%'.$search.'%');
        }

        $packages = $packages->get();

        return response()->json($packages);
    }

    public function get_members(Request $request) {
        $search = $request->input('search');

        $members = Member::query();

        if ($search) {
            $members->where('name', 'like', '%'.$search.'%');
        }

        $members = $members->get();

        return response()->json($members);
    }

    public function add_member(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'telp' => 'required|numeric|min_digits:10',
        ], [
            'name.required' => 'Nama member harus diisi.',
            'name.max' => 'Nama member tidak boleh lebih dari 255 karakter.',
            'telp.required' => 'No. Telepon harus diisi.',
            'telp.min_digits' => 'No. Telepon minimal 10 digit.',
            'price.numeric' => 'No. Telepon harus angka.'
        ]);

        $member = Member::create([
            'name' => $request->name,
            'telp' => $request->telp,
            'address' => $request->address
        ]);

        if ($member) {
            return response()->json(['success' => true, 'data' => $member], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal menyimpan member!'], 500);
        }
    }

    public function checkout(Request $request) {
        DB::beginTransaction();

        $invoice = $request->input('invoice');
        $member = $request->input('member');
        $payment = $request->input('payment');
        $packages = $request->input('packages');

        try {
            $transaction = Transaction::create([
                'invoice' => $invoice,
                'member_id' => $member['id'],
                'status' => 'process',
                'payment' => $payment,
                'date_taken' => Carbon::now()->addDays(3)
            ]);

            foreach ($packages as $package) {
                DetailTransaction::create([
                    'transaction_id' => $transaction->id,
                    'package_id' => $package['id'],
                    'qty' => $package['qty']
                ]); 
            }

            DB::commit();

            return response()->json(['success' => true, 'message' => 'Pesanan berhasil dicheckout dengan nomor invoice <b>#'.$invoice.'</b>'], 200);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['success' => false, 'error' => 'Pesanan gagal dicheckout!'], 500);
        }
    }
}
