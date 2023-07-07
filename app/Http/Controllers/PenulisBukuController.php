<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penulis_buku;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\Datatables;
use RealRashid\SweetAlert\Facades\Alert;

class PenulisBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penulis = penulis_buku::all();
        // dd($kategori);
        return view('admin.penulis.index', compact('penulis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.penulis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            // Ini validasi, nama kategori=name, form di kategori create
            'nama_penulis' => 'required|min:4',
        ]);
            
        // Untuk Simpan Data Yang Telah Di Input
        $kategori = penulis_buku::create([
            'nama_penulis' => $request->nama_penulis,
            'slug' => Str::slug($request->nama_penulis),
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Tambahkan !!!');
        return redirect()->route('penulis.index');
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
        $data['slug'] = Str::slug($request->nama_penulis);

        $kategori = penulis_buku::findOrFail($id);
        $kategori->update($data);

        Alert::info('Updated', 'Data Berhasil Di Updated !!!');
        return redirect()->route('penulis.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
