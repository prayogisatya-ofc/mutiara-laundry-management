@extends('layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light">Data Member /</span> Edit Member</h4>

        <a href="{{ route('member_list') }}" class="btn btn-primary mb-3 d-inline-flex align-items-center"><i class="bx bx-chevron-left me-2 ms-n1"></i>Kembali</a>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible mb-3" role="alert">
                <ul class="ps-3 mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Edit Member</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('member_update', $member->id) }}">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nama Member</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Jhon Doe" name="name" value="{{ $member->name }}" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">No. Telepon</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" placeholder="82269789818" name="telp" value="{{ $member->telp }}" required/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea name="address" cols="30" rows="10" placeholder="Jl. Bangau" class="form-control">{{ $member->address }}</textarea>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="me-2 btn btn-primary d-inline-flex align-items-center"><i class="bx bx-save me-2 ms-n1"></i>Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
