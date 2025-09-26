<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::with('prodi.fakultas')->get();
        return response()->json($mahasiswa,200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate(
            [
                'Nama' => 'required|unique:mahasiswas,Nama',
                'kode' => 'required',
                'prodi_id' => 'required|exists:prodis,id',
            ]
        );

        $mahasiswa = Mahasiswa::create($validate);//simpan data
        if($mahasiswa){
            $data['success'] = true;
            $data['message'] = "Data Mahasiswa berhasil disimpan";
            $data['data'] = $mahasiswa;
            return response()->json($data,201);
        }
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
        $validate = $request->validate(
            [
                'Nama' => 'required|unique:mahasiswas,Nama,'.$id,
                'kode' => 'required',
                'prodi_id' => 'required|exists:prodis,id',
            ]
        );
            $mahasiswa = Mahasiswa::find($id);
            if($mahasiswa){
                $mahasiswa->update($validate);
                $data['success'] = true;
                $data['message'] = "Data Mahasiswa berhasil diperbarui";
                $data['data'] = $mahasiswa;
                return response()->json($data,201);
        } else {
                $data['success'] = false;
                $data['message'] = "Data Mahasiswa gagal diperbarui";
                return response()->json($data,500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if($mahasiswa){
            $mahasiswa->delete();
            $data['success'] = true;
            $data['message'] = "Data Mahasiswa berhasil dihapus";
            return response()->json($data,200);
        } else {
            $data['success'] = false;
            $data['message'] = "Data Mahasiswa gagal dihapus";
            return response()->json($data,500);
        }
    }
}
