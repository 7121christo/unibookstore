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
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
        ]);

        Penerbit::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin')->with('success', 'Penerbit berhasil diperbarui!');
    }


    public function update(Request $request, $id){
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
        ]);

        $penerbit = Penerbit::findOrFail($id);
        $penerbit->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin')->with('success', 'Penerbit berhasil dihapus!');
    }


    public function destroy($id){
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->delete();

        return redirect()->back()->with('success', 'Penerbit berhasil dihapus!');
    }

}