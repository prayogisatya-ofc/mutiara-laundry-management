<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class CashierController extends Controller
{
    public function index() {
        return view('cashier', [
            'title' => 'Kasir',
        ]);
    }

    public function get_packages() {
        $packages = Package::all();
        return response()->json($packages);
    }
}
