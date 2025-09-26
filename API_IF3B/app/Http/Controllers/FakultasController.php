<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Response;
use Illuminate\Http\Request;


class FakultasController extends Controller
{
    public function index()
    {
        $fakultas = Fakultas::all(); // select * from Fakultas
        return response() -> json($fakultas ,200);
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
                'nama' => 'required|unique:fakultas',
                'kode' => 'required'

            ]
        );

        $fakultas = Fakultas::create($validate); //simpan data
        if($fakultas){
            $data['success'] = true;
            $data['message'] = "Data fakultas berhasil disimpan";
            $data['data'] = $fakultas;
            return response()->json($data, 201);
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
        //Cari data fakultas
        $fakultas = Fakultas::find($id);
        if($fakultas){
            $validate = $request->validate(
                [
                    'nama' => 'required',
                    'kode' => 'required'

                ]
        );
        //update data fakultas
        Fakultas::where('id' , $id)->update($validate);
        //Mengambil data fakulatas yang sudah diperbarui
        $fakultas = Fakultas::find($id);
        if ($fakultas) {
            $data['success'] = true;
            $data['message'] = "Data fakultas berhasil diperbarui";
            $data['data'] = $fakultas;
            return response()->json($data, 201);
        } else {
            $data['success'] = false;
            $data['message'] = "Data fakultas gagal diperbarui";
            return response()->json($data, 500);
        }
    }
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fakultas = Fakultas::where('id', $id);
        if($fakultas) {
            $fakultas->delete();
            $data['success'] = true;
            $data['message'] = "Data fakultas berhasil dihapus";
            return response()->json($data, Response::HTTP_OK);
        }else {
            $data['success'] = true;
            $data['message'] = "Data fakultas tidak ditemukan";
            return response()->json($data, Response::HTTP_NOT_FOUND);
        }
    }
}