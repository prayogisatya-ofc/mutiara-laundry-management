@extends('layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light">Data Paket /</span> Edit Paket</h4>

        <a href="{{ route('package_list') }}" class="btn btn-primary mb-3 d-inline-flex align-items-center"><i class="bx bx-chevron-left me-2 ms-n1"></i>Kembali</a>

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
                        <h5 class="mb-0">Edit Paket</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('package_update', $package->id) }}">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nama Paket</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Cuci Setrika" value="{{ $package->name }}" name="name" required />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" >Harga Paket (/kg)</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" placeholder="4000" value="{{ $package->price }}" name="price" required/>
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
