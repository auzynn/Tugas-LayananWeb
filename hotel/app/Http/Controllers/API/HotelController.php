<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::all();
        return response()->json($hotels);
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
            'hotel' => 'required',
            'harga' => 'required',
            'ket_hotel' => 'required',
        ]); 

        $hotel = new Hotel;
        $hotel -> hotel= $request->hotel;
        $hotel -> harga= $request->harga;
        $hotel -> ket_hotel= $request->ket_hotel;
        $hotel -> save();

        return response()->json([
            'message' => 'Data Hotel ditambahkan!',
            'data_hotel' => $hotel
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
        $hotel = Hotel::find($id);
        return response()->json([
            'message' => 'Data Hotel berhasil diambil!',
            'data_hotel' => $hotel
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
        $hotel = Hotel::find($id);
        return response()->json([
            'message' => 'Data Hotel berhasil diambil!',
            'data_hotel' => $hotel
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
        $hotel = Hotel::find($id);

        $request->validate([
            'hotel' => 'required',
            'harga' => 'required',
            'ket_hotel' => 'required'
        ]);

        $hotel ->update([
            'hotel' => $request->hotel,
            'harga' => $request->harga,
            'ket_hotel' => $request->ket_hotel
        ]);

        return response()->json([
            'message' => 'Data Hotel berhasil diupdate!',
            'data_hotel' => $hotel
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
        $hotel = Hotel::find($id);
        $hotel->delete();

        return response()->json([
            'message' => 'Data Hotel berhasil dihapus!',
            'data_hotel' => $hotel
        ], 200);
    }
}