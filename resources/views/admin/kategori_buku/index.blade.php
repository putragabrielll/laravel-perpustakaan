@extends('layouts.default')

@section('content')
<div class="container-fluid py-4">
    <div class="col-lg-12 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
                <h6 class="text-capitalize">Daftar Kategori</h6>
                <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm ml-auto">
                    <i class="fas fa-plus"></i>&nbsp;
                    Tambah Kategori
                </a>
            </div>
            <div class="card-body p-3">
                <div class="chart">
                    <div class="card-body">
                        @if(Session::has('success'))
                        <div class="alert alert-primary">
                            {{ Session('success') }}
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Kategori</th>
                                        <th>Slug</th>
                                        <th>Deskripsi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1 ?>
                                    @forelse ($kategori as $row)
                                    <tr>
                                        <!-- <td>{{ $row->id }}</td> -->
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $row->nama_kategori }}</td>
                                        <td>{{ $row->slug }}</td>
                                        <td>{{ $row->deskripsi }}</td>
                                        <td>
                                            @if (auth()->user()->level=="admin")
                                            <a href="" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{ $row->id}}"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('kategori.destroy', $row->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ?');">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            @elseif (auth()->user()->level=="user")
                                            <a href="{{ route('kategori.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('kategori.destroy', $row->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button disabled="disabled" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ?');">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            @endif

                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Data Masih Kosong !!!</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@foreach ($kategori as $data)
<!-- Modal -->
<div class="modal fade" id="staticBackdrop-{{ $data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('kategori.update', $data->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="kategori">Nama Kategori</label>
                        <input type="text" name="nama_kategori" value="{{ $data->nama_kategori }}" class="form-control" id="text" placeholder="Enter Kategori">
                        <small id="emailHelp2" class="form-text text-muted">Mohon untuk di isi</small>
                    </div>
                    <div class="form-group">
                        <label for="body">Deskripsi</label>
                        <textarea name="deskripsi" value="{{ $data->deskripsi }}" id="editor1" class="form-control"> </textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">SAVE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection