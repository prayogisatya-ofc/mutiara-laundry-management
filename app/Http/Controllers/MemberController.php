<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    public function index(Request $request) {
        $search = $request->input('search');

        $data = Member::query();

        if ($search) {
            $data->where('name', 'like', '%'.$search.'%');
        }

        $data = $data->latest()->paginate(10);

        return view('members.list', [
            'title' => 'Data Member',
            'data' => $data,
            'search' => $search
        ]);
    }

    public function create() {
        return view('members.add', [
            'title' => 'Tambah Member',
        ]);
    }

    public function store(Request $request)
    {
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

        Member::create([
            'name' => $request->name,
            'telp' => $request->telp,
            'address' => $request->address
        ]);

        if ($request->action === 'save_and_add') {
            return redirect()->route('member_create')->with('success', 'Member <b>'.$request->name.'</b> berhasil ditambahkan.');
        }

        return redirect()->route('member_list')->with('success', 'Member <b>'.$request->name.'</b> berhasil ditambahkan.');
    }

    public function edit(Member $member)
    {
        return view('members.edit', [
            'title' => 'Edit Member',
            'member' => $member
        ]);
    }

    public function update(Request $request, Member $member)
    {
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

        $member->update([
            'name' => $request->name,
            'telp' => $request->telp,
            'address' => $request->address,
        ]);

        return redirect()->route('member_list')->with('success', 'Member <b>'.$request->name.'</b> berhasil diupdate.');
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->back()->with('success', 'Member <b>'.$member->name.'</b> berhasil dihapus.');
    }
}
