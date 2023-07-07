@extends('layouts.default')

@section('content')
<div class="container-fluid py-4">
    <div class="col-lg-12 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
                <h6 class="text-capitalize">Daftar Kategori</h6>
                <a href="{{ route('buku.create') }}" class="btn btn-primary btn-sm ml-auto">
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
                                        <th>Judul Buku</th>
                                        <th>Slug</th>
                                        <th>Deskripsi</th>
                                        <th>Tgl. Terbit</th>
                                        <th>Kategori</th>
                                        <th>Penulis</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1 ?>
                                    @forelse ($buku_list as $row)
                                    <tr>
                                        <!-- <td>{{ $row->id }}</td> -->
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $row->judul_buku }}</td>
                                        <td>{{ $row->slug }}</td>
                                        <td>{{ $row->deskripsi }}</td>
                                        <td>{{ $row->tanggal_terbit }}</td>
                                        <td>{{ $row->kategori_bukus->nama_kategori }}</td>
                                        <td>{{ $row->penulis_bukus->nama_penulis }}</td>
                                        <td>
                                            @if (auth()->user()->level=="admin")
                                            <a href="{{ route('buku.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('buku.destroy', $row->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ?');">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            @elseif (auth()->user()->level=="user")
                                            <a href="{{ route('buku.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
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
@endsection