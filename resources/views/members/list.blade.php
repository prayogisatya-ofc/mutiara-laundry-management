@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data Member /</span> Semua Member</h4>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible mb-3" role="alert">
            {!! session('success') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card mb-3">
        <div class="card-header">
            <div class="row justify-content-between align-items-end">
                <div class="col-lg-4 mb-3 mb-lg-0">
                    <form action="{{ route('member_list') }}" method="get">
                        <label class="form-label">Cari</label>
                        <input type="search" class="form-control" placeholder="Apa yang anda cari?" name="search" value="{{ $search }}">
                    </form>
                </div>
                <div class="col-lg-8">
                    <a href="{{ route('member_create') }}" class="btn btn-primary d-flex align-items-center float-start float-lg-end">
                        <i class="bx bx-plus me-2 ms-n1"></i>
                        <span>Tambah Member</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive mb-3">
                <table class="table w-100">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama Member</th>
                            <th>No. Telepon</th>
                            <th>Alamat</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $d)
                            <tr>
                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->telp }}</td>
                                <td>{{ $d->address }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('member_edit', $d->id) }}" class="btn btn-sm btn-primary me-2"><i class="bx bx-edit-alt"></i></a>
                                        <form action="{{ route('member_destroy', $d->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus member {{ $d->name }} ini?')"><i class="bx bx-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data yang dapat ditampilkan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div>
                {{ $data->appends(['search' => $search])->links() }}
            </div>
        </div>
    </div>
</div>
@endsection