@extends('layouts.default')

@section('content')
<div class="container-fluid py-4">
    <div class="col-lg-12 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
                <h6 class="text-capitalize">Tambah Penulis</h6>
                <a href="{{ route('penulis.index') }}" class="btn btn-warning btn-sm ml-auto">
                    <i class="fas fa-undo"></i>&nbsp;
                    Kembali
                </a>
            </div>
            <div class="card-body">
                    <form method="post" action="{{ route('penulis.store') }}">
                    @csrf
                        <div class="form-group">
                            <label for="kategori">Nama Penulis</label>
                            <input type="text" name="nama_penulis" class="form-control" id="text" placeholder="Enter Kategori">
                            <small id="emailHelp2" class="form-text text-muted">Mohon untuk di isi</small>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-sm" type="submit"> SAVE </button>
                        </div>
                    </form>
				</div>
        </div>
    </div>
</div>
@endsection