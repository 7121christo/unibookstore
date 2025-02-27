<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Penerbit;

class BukuController extends Controller
{
    //
    public function index(){
        $bukus = Buku::with('penerbit')->get();
        $penerbits = Penerbit::all();
        return view('admin', compact('bukus', 'penerbits'));
    }

    public function data(){
        $bukus = Buku::with('penerbit')->get();
        return view('index', compact('bukus'));
    }

    public function store(Request $request){
        $request->validate([
            'id_buku' => 'required|unique:bukus,id_buku',
            'kategori' => 'required',
            'nama_buku' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'id_penerbit' => 'required|exists:penerbits,id',
        ]);

        Buku::create($request->all());

        return redirect()->route('admin')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function update(Request $request, $id){
        $request->validate([
            'kategori' => 'required',
            'nama_buku' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'id_penerbit' => 'required|exists:penerbits,id',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($request->all());

        return redirect()->route('admin')->with('success', 'Buku berhasil diperbarui!');
    }

    public function destroy($id){
        Buku::destroy($id);
        return redirect()->route('admin')->with('success', 'Buku berhasil dihapus!');
    }

    public function search(Request $request){
        $query = Buku::with('penerbit');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('nama_buku', 'like', "%$search%")
                ->orWhere('kategori', 'like', "%$search%");
        }

        $bukus = $query->get();
        return view('index', compact('bukus'));
    }

    public function pengadaan(){
        $bukus = Buku::orderBy('stok', 'asc')->take(1)->get();
        return view('pengadaan', compact('bukus'));
    }
}