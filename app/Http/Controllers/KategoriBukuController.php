<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori_buku;
use Illuminate\Console\View\Components\Alert as ComponentsAlert;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\Datatables;
use RealRashid\SweetAlert\Facades\Alert;


class KategoriBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = kategori_buku::all();
        // dd($kategori);
        return view('admin.kategori_buku.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori_buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            // Ini validasi, nama kategori=name, form di kategori create
            'nama_kategori' => 'required|min:4',
        ]);
            
        // Untuk Simpan Data Yang Telah Di Input
        $kategori = kategori_buku::create([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori),
            'deskripsi' => $request->deskripsi,
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Tambahkan !!!');
        return redirect()->route('kategori.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_kategori);

        $kategori = kategori_buku::findOrFail($id);
        $kategori->update($data);

        Alert::info('Updated', 'Data Berhasil Di Updated !!!');
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = kategori_buku::find($id);

        $kategori->delete();

        Alert::error('Terhapus', 'Data Berhasil Di Hapus !!!');
        return redirect()->route('kategori.index');
    }
}
