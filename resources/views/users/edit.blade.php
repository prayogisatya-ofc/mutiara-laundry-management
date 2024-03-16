@extends('layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data Admin /</span> Edit Admin</h4>

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
                        <h5 class="mb-0">Edit Admin</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user_update', $user->id) }}">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nama User</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Jhon Doe" name="name" value="{{ $user->name }}" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ $user->username }}" readonly/>
                                    <small class="form-text">Username tidak bisa diganti.</small>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" placeholder="********" name="password" />
                                    <small class="form-text">Kosongkan jika tidak ingin mengubah password.</small>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="me-2 btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
