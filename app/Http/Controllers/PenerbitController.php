<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerbit;

class PenerbitController extends Controller
{
    //
    public function index(){
        $penerbits = Penerbit::all();
        return view('admin', compact('penerbits'));
    }


    public function store(Request $request){
        $request->validate([
            'id_penerbit' => 'required|unique:penerbits,id_penerbit',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'kota' => 'required|string|max:255',
            'telepon' => 'required|string|max:255',
        ]);

        Penerbit::create([
            'id_penerbit' => $request->input('id_penerbit'),
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'kota' => $request->input('kota'),
            'telepon' => $request->input('telepon'),
        ]);

        return redirect()->route('admin')->with('success', 'Penerbit berhasil diperbarui!');
    }


    public function update(Request $request, $id){
        $request->validate([
            'id_penerbit' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'kota' => 'required|string|max:255',
            'telepon' => 'required|string|max:255',
        ]);

        $penerbit = Penerbit::findOrFail($id);
        $penerbit->update([
            'id_penerbit' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'kota' => 'required|string|max:255',
            'telepon' => 'required|string|max:255',
        ]);

        return redirect()->route('admin')->with('success', 'Penerbit berhasil dihapus!');
    }


    public function destroy($id){
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->delete();

        return redirect()->back()->with('success', 'Penerbit berhasil dihapus!');
    }

}