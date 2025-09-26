<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index()
    {
        $prodi = Prodi::with('fakultas')-> get(); // select * from Prodi
        return response() -> json($prodi ,200);
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

        'nama'        => 'required|unique:prodis',
        'kode'        => 'required',
        'fakultas_id' => 'required|exists:fakultas,id',
        ]
    );

        $prodi = Prodi::create($validate);

        if ($prodi) {
        return response()->json([
            'success' => true,
            'message' => "Data Prodi berhasil disimpan",
            'data'    => $prodi
        ], 201);
        } else {
        return response()->json([
            'success' => false,
            'message' => "Data Prodi gagal disimpan"
        ], 500);
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
                'nama'        => 'required|unique:prodis,nama,'.$id,
                'kode'        => 'required',
                'fakultas_id' => 'required|exists:fakultas,id',
            ]
        );
            $prodi = Prodi::find($id);
            if($prodi){
                $prodi->update($validate);
                $data['success'] = true;
                $data['message'] = "Data prodi berhasil diperbarui";
                $data['data'] = $prodi;
                return response()->json($data,201);
        } else {
                $data['success'] = false;
                $data['message'] = "Data prodi gagal diperbarui";
                return response()->json($data,500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $prodi = prodi::where('id', $id);
        if($prodi) {
            $prodi->delete();
            $data['success'] = true;
            $data['message'] = "Data prodi berhasil dihapus";
            return response()->json($data, Response::HTTP_OK);
        }else {
            $data['success'] = true;
            $data['message'] = "Data prodi tidak ditemukan";
            return response()->json($data, Response::HTTP_NOT_FOUND);
        }
    }
}