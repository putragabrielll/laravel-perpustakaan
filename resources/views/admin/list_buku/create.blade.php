@extends('layouts.default')

@section('content')
<div class="container-fluid py-4">
    <div class="col-lg-12 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
                <h6 class="text-capitalize">Tambah Kategori</h6>
                <a href="{{ route('buku.index') }}" class="btn btn-warning btn-sm ml-auto">
                    <i class="fas fa-undo"></i>&nbsp;
                    Kembali
                </a>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('buku.store') }}">
                @csrf
                    <div class="form-group">
                        <label for="kategori">Judul Buku</label>
                        <input type="text" name="judul_buku" class="form-control" id="text" placeholder="Enter Judul Buku">
                        <small id="emailHelp2" class="form-text text-muted">Mohon untuk di isi</small>
                    </div>
                    <div class="form-group">
                        <label for="body">Deskripsi</label>
                        <textarea name="deskripsi" id="editor1" class="form-control"> </textarea>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_terbit">Tanggal Terbit</label>
                        <input type="date" name="tanggal_terbit" class="form-control" id="text" placeholder="Enter Judul Buku">
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select name="kategori_id" class="form-control">
                        @foreach ($kategori as $row)
                            <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>    
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="penulis">Penulis</label>
                        <select name="penulis_id" class="form-control">
                        @foreach ($penulis as $row)
                            <option value="{{ $row->id }}">{{ $row->nama_penulis }}</option>    
                        @endforeach
                        </select>
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