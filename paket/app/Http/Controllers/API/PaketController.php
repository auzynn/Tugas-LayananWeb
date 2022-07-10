<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paket;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pakets = paket::all();
        return response()->json($pakets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required',
            'harga_paket' => 'required',
            'ket_paket' => 'required',
        ]); 

        $paket = new paket;
        $paket -> nama_paket= $request->nama_paket;
        $paket -> harga_paket= $request->harga_paket;
        $paket -> ket_paket= $request->ket_paket;
        $paket -> save();

        return response()->json([
            'message' => 'Data Paket ditambahkan!',
            'data_paket' => $paket
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paket = paket::find($id);
        return response()->json([
            'message' => 'Data Paket berhasil diambil!',
            'data_paket' => $paket
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paket = paket::find($id);
        return response()->json([
            'message' => 'Data Paket berhasil diambil!',
            'data_paket' => $paket
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $paket = paket::find($id);

        $request->validate([
            'nama_paket' => 'required',
            'harga_paket' => 'required',
            'ket_paket' => 'required'
        ]);

        $paket ->update([
            'nama_paket' => $request->nama_paket,
            'harga_paket' => $request->harga_paket,
            'ket_paket' => $request->ket_paket
        ]);

        return response()->json([
            'message' => 'Data Paket berhasil diupdate!',
            'data_paket' => $paket
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $paket = paket::find($id);
        $paket->delete();

        return response()->json([
            'message' => 'Data Paket berhasil dihapus!',
            'data_paket' => $paket
        ], 200);
    }
}