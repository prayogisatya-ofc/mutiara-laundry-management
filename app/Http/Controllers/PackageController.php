<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use Illuminate\Http\Request;

class PackageController extends Controller
{

    public function index(Request $request) {
        $search = $request->input('search');

        $data = Package::query();

        if ($search) {
            $data->where('name', 'like', '%'.$search.'%');
        }

        $data = $data->latest()->paginate(10);

        return view('packages.list', [
            'title' => 'Data Paket',
            'data' => $data,
            'search' => $search
        ]);
    }

    public function create() {
        return view('packages.add', [
            'title' => 'Tambah Paket',
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric|min:1000'
        ], [
            'name.required' => 'Nama harus diisi.',
            'name.max' => 'Nama tidak boleh leboh dari 255 karakter.',
            'price.required' => 'Harga harus diisi.',
            'price.min' => 'Harga minimal 1000.',
            'price.numeric' => 'Harga harus angka.'
        ]);

        Package::create([
            'name' => $request->name,
            'price' => $request->price
        ]);

        if ($request->action === 'save_and_add') {
            return redirect()->route('package_create')->with('success', 'Paket <b>'.$request->name.'</b> berhasil ditambahkan.');
        }

        return redirect()->route('package_list')->with('success', 'Paket <b>'.$request->name.'</b> berhasil ditambahkan.');
    }

    public function edit(Package $package) {
        return view('packages.edit', [
            'title' => 'Edit Paket',
            'package' => $package
        ]);
    }

    public function update(Request $request, Package $package) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric|min:1000'
        ], [
            'name.required' => 'Nama harus diisi.',
            'name.max' => 'Nama tidak boleh leboh dari 255 karakter.',
            'price.required' => 'Harga harus diisi.',
            'price.min' => 'Harga minimal 1000.',
            'price.numeric' => 'Harga harus angka.'
        ]);

        $package->update([
            'name' => $request->name,
            'price' => $request->price
        ]);

        return redirect()->route('package_list')->with('success', 'Paket <b>'.$request->name.'</b> berhasil diupdate.');
    }

    public function destroy(Package $package) {
        $package->delete();
        return redirect()->back()->with('success', 'Paket <b>'.$package->name.'</b> berhasil dihapus.');
    }
}
