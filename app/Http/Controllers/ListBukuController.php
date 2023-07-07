<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\list_buku;
use App\Models\penulis_buku;
use App\Models\kategori_buku;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Extension\CommonMark\Node\Block\ListBlock;
use Yajra\DataTables\Facades\Datatables;
use RealRashid\SweetAlert\Facades\Alert;

class ListBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku_list = list_buku::latest()->get();
        // dd($kategori);
        $user = User::where('id', Auth::user()->id)->first();
        return view('admin.list_buku.index', compact('buku_list', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = kategori_buku::all();
        $penulis = penulis_buku::all();
        return view('admin.list_buku.create', compact('kategori', 'penulis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            // Ini validasi
            'judul_buku' => 'required|min:4',
        ]);

        // Untuk Simpan Data Yang Telah Di Input
        $data = $request->all();
        $data['slug'] = Str::slug($request->judul_buku);

        list_buku::create($data);

        Alert::success('Berhasil', 'Data Berhasil Di Tambahkan !!!');
        return redirect()->route('buku.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buku = list_buku::find($id);
        $kategori = kategori_buku::all();
        $penulis = penulis_buku::all();
        return view('admin.list_buku.edit', compact('buku', 'kategori', 'penulis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $this->validate($request, [
            // Ini validasi
            'judul_buku' => 'required|min:4',
            'deskrisi' => 'required|min:4',
        ]);

        $list_buku = list_buku::findOrFail($id);
        $list_buku->judul_buku = $request->input('judul_buku');
        $list_buku['slug'] = Str::slug($request->judul_buku);
        $list_buku->deskripsi = $request->input('deskripsi');
        $list_buku->tanggal_terbit = $request->input('tanggal_terbit');
        $list_buku->penulis_id = $request->input('penulis_id');
        $list_buku->kategori_id = $request->input('kategori_id');

        $list_buku->update();


        Alert::info('Updated', 'Data Berhasil Di Updated !!!');
        return redirect()->route('buku.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = list_buku::find($id);

        $kategori->delete();

        Alert::error('Terhapus', 'Data Berhasil Di Hapus !!!');
        return redirect()->route('buku.index');
    }
}
