@extends('layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data Admin /</span> Tambah Admin</h4>

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

        @if (session('success'))
            <div class="alert alert-success alert-dismissible mb-3" role="alert">
                {!! session('success') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Tambah Admin</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user_store') }}">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nama Admin</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Jhon Doe" name="name" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="jhondoe" name="username" required/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" placeholder="********" name="password" required/>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10 d-flex">
                                    <button type="submit" name="action" value="save" class="me-2 btn btn-primary">Simpan</button>
                                    <button type="submit" name="action" value="save_and_add" class="btn btn-outline-primary">Simpan dan Tambah Lagi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
